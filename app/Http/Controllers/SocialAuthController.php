<?php

namespace App\Http\Controllers;

use App\Models\MultiTenant;
use App\Models\Plan;
use App\Models\Role;
use App\Models\SocialAccount;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class SocialAuthController extends Controller
{
    /**
     * @param $provider
     * @return RedirectResponse
     */
    public function redirectToSocial($provider): RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * @param $provider
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleSocialCallback($provider)
    {
        if (Auth::check()) {
            return redirect('/');
        }

        $socialUser = Socialite::driver($provider)->user();

        if (empty($socialUser['email'])) {
            Flash::error(__('messages.placeholder.we_could_not_fb_id'));

            return redirect(route('register'));
        }

        try {
            DB::beginTransaction();

            /** @var User $user */
            $user = User::whereRaw('lower(email) = ?', strtolower($socialUser['email']))->first();

            $existingAccount = null;
            if (! empty($user)) {
                /** @var SocialAccount $existingProfile */
                $existingAccount = SocialAccount::where('provider_id', $socialUser->id)->first();
            } else {
                $username = explode(' ', $socialUser['name']);
                $userData['first_name'] = $username[0];
                $userData['last_name'] = $username[1];
                $userData['email'] = $socialUser['email'];
                $userData['email_verified_at'] = Carbon::now();
                $userData['password'] = bcrypt(Str::random(40));

                $tenant = MultiTenant::create(['tenant_username' => $userData['first_name']]);

                $userData['tenant_id'] = $tenant->id;

                /** @var User $user */
                $user = User::create($userData)->assignRole(Role::ROLE_ADMIN);

                $plan = Plan::whereIsDefault(true)->first();

                $subscription = new Subscription();
                $subscription->plan_id = $plan->id;
                $subscription->starts_at = Carbon::now();
                $subscription->ends_at = Carbon::now()->addDays($plan->trial_days);
                $subscription->plan_amount = $plan->price;
                $subscription->plan_frequency = $plan->frequency;
                $subscription->trial_ends_at = Carbon::now()->addDays($plan->trial_days);
                $subscription->no_of_vcards = $plan->no_of_vcards;
                $subscription->tenant_id = $user['tenant_id'];
                $subscription->status = Subscription::ACTIVE;
                $subscription->saveQuietly();
            }

            if (empty($existingAccount)) {
                $existingAccount = SocialAccount::where('provider_id', $socialUser->id)->first();
                if (empty($existingAccount)) {
                    $socialAccount = new SocialAccount();
                    $socialAccount->tenant_id = $user->tenant_id;
                    $socialAccount->provider = $provider;
                    $socialAccount->provider_id = $socialUser->id;
                    $socialAccount->save();
                }
            }
            DB::commit();
            Auth::login($user);

            return redirect(route('admin.dashboard'));
        } catch (Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
