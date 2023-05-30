<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRegisterRequest;
use App\Models\AffiliateUser;
use App\Models\MultiTenant;
use App\Models\Plan;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laracasts\Flash\Flash;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class RegisteredUserController extends Controller
{
    /**
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  CreateRegisterRequest  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateRegisterRequest $request)
    {
        $referral_code = $request->input('referral-code');
        // $referral_user = '';
        // if ($referral_code) {
        //     $referral_user = User::where('affiliate_code', $referral_code)->first();
        // }
        try {
            DB::beginTransaction();

            $tenant = MultiTenant::create(['tenant_username' => $request->first_name]);
            $userDefaultLanguage = Setting::where('key', 'user_default_language')->first()->value ?? 'en';

            $user = User::create([
                'first_name'     => $request->first_name,
                'last_name'      => $request->last_name,
                'email'          => $request->email,
                'language'       => $userDefaultLanguage,
                'password'       => Hash::make($request->password),
                'tenant_id'      => $tenant->id,
                'affiliate_code' => generateUniqueAffiliateCode(),
                'is_paid'        => 0,
                'referral_code'  => $referral_code,
            ])->assignRole(Role::ROLE_ADMIN);

            $plan = Plan::whereIsDefault(true)->first();

            Subscription::create([
                'plan_id'        => $plan->id,
                'plan_amount'    => $plan->price,
                'plan_frequency' => Plan::MONTHLY,
                'starts_at'      => Carbon::now(),
                'ends_at'        => Carbon::now()->addDays($plan->trial_days),
                'trial_ends_at'  => Carbon::now()->addDays($plan->trial_days),
                'status'         => Subscription::ACTIVE,
                'tenant_id'      => $tenant->id,
                'no_of_vcards'   => $plan->no_of_vcards,
            ]);

            // Affiliate fee set part 
            // if ($referral_user) {
            //     $affiliateUser = new AffiliateUser();
            //     $affiliateUser->affiliated_by = $referral_user->id;
            //     $affiliateUser->user_id = $user->id;
            //     $affiliateUser->amount = getSuperAdminSettingValue('affiliation_amount');
            //     $affiliateUser->save();
            // }

            DB::commit();

            event(new Registered($user));

            Flash::success(__('messages.placeholder.registered_success'));

            return redirect(route('login'));
        } catch (\Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
