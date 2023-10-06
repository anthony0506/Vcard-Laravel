<?php

namespace App\Repositories;

use App\Mail\VerifyMail;
use App\Models\EmailVerification;
use App\Models\MultiTenant;
use App\Models\Plan;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class UserRepository
 */
class UserRepository extends BaseRepository
{
    public $fieldSearchable = [
        'first_name',
        'last_name',
        'email',
        'contact',
        'dob',
        'gender',
        'is_active',
        'password',
    ];

    /**
     * {@inheritDoc}
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * {@inheritDoc}
     */
    public function model()
    {
        return User::class;
    }

    /**
     * @param $input
     * @return mixed
     */
    public function store($input)
    {
        try {
            DB::beginTransaction();

            $tenant = MultiTenant::create(['tenant_username' => $input['first_name']]);
            $userDefaultLanguage = Setting::where('key', 'user_default_language')->first()->value ?? 'en';

            $input['tenant_id'] = $tenant->id;
            $input['language'] = $userDefaultLanguage;
            $input['password'] = Hash::make($input['password']);
            if (isset($input['role'])) {
                $user = User::create($input)->assignRole(Role::ROLE_SUPER_ADMIN);
                $user->email_verified_at = Carbon::now();
                $user->is_active = true;
                $user->save();
            } else {
                $input['affiliate_code'] = generateUniqueAffiliateCode();
                $user = User::create($input)->assignRole(Role::ROLE_ADMIN);
            }

            if (isset($input['profile']) && ! empty($input['profile'])) {
                $user->addMedia($input['profile'])->toMediaCollection(User::PROFILE, config('app.media_disc'));
            }
            
            if (isset($input['is_admin']) == 'false') {
                $user->sendEmailVerificationNotification();
            }
            if (isset($input['plan_id'])) {
                $plan = Plan::whereId($input['plan_id'])->first();
            } else {
                $plan = Plan::whereIsDefault(true)->first();
            }
            $subscription = new Subscription();
            $subscription->plan_id = $plan->id;
            $subscription->starts_at = Carbon::now();
            $subscription->ends_at = $plan->frequency == Plan::UNLIMITED ? Carbon::now()->addYears(100) : Carbon::now()->addDays($plan->trial_days);
            $subscription->plan_amount = $plan->price;
            $subscription->plan_frequency = $plan->frequency;
            $subscription->trial_ends_at = $plan->frequency == Plan::UNLIMITED ? Carbon::now()->addYears(100) : Carbon::now()->addDays($plan->trial_days);
            $subscription->no_of_vcards = $plan->no_of_vcards;
            $subscription->tenant_id = $input['tenant_id'];
            $subscription->status = Subscription::ACTIVE;
            $subscription->saveQuietly();

            DB::commit();

            return $user;
        } catch (Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param  array  $input
     * @param  User  $user
     * @return Builder|Builder[]|Collection|Model|int
     */
    public function update($input, $user)
    {
        if (isset($input['contact'])) {
            $input['contact'] = str_replace(' ', '', $input['contact']);
        }

        $currentPlan = Subscription::with(['plan'])
            ->whereTenantId($user->tenant_id)
            ->where('status', Subscription::ACTIVE)->latest()->first();

        if (isset($input['plan_id']) && $input['plan_id'] != $currentPlan->plan_id) {
            $subscription = Subscription::whereTenantId($user->tenant_id)->first();
            $plan = Plan::whereId($input['plan_id'])->first();
            $subscription->update([
                'plan_id' => $plan->id,
                'starts_at' => Carbon::now(),
                'ends_at' => $plan->frequency == Plan::UNLIMITED ? Carbon::now()->addYears(100) : Carbon::now()->addDays($plan->trial_days),
                'plan_amount' => $plan->price,
                'plan_frequency' => $plan->frequency,
                'trial_ends_at' => $plan->frequency == Plan::UNLIMITED ? Carbon::now()->addYears(100) : Carbon::now()->addDays($plan->trial_days),
                'no_of_vcards' => $plan->no_of_vcards,
                'status' => Subscription::ACTIVE,
            ]);
        }
        $user->update($input);

        if (isset($input['profile']) && ! empty($input['profile'])) {
            $user->clearMediaCollection(User::PROFILE);
            $user->addMedia($input['profile'])->toMediaCollection(User::PROFILE, config('app.media_disc'));
        }

        return $user;
    }

    /**
     * @param $userInput
     * @return bool
     */
    public function updateProfile($userInput)
    {
        try {
            DB::beginTransaction();

            $user = Auth::user();
            $userInput['contact'] = str_replace(' ', '', $userInput['contact']);

            if ($userInput['email'] != $user->email) {
                $token = Str::random(60);

                EmailVerification::create([
                    'user_id' => $user->id,
                    'email' => $userInput['email'],
                    'token' => $token,
                ]);

                $verifyButton = url(config('app_domain').'/change-email-verification/'.$user->id.'/'.$token);
                $data = [
                    'user_id' => $user->id,
                    'user_name' => $user->full_name,
                    'email' => $user->email,
                    'token' => $token,
                    'verify_button' => $verifyButton,
                ];

                Mail::to($userInput['email'])
                    ->send(new VerifyMail('emails.verify_email', 'Verify Email', $data));
            }

            $userInput['email'] = $user->email;
            $user->update($userInput);

            if (isset($userInput['profile']) && ! empty($userInput['profile'])) {
                $user->clearMediaCollection(User::PROFILE);
                $user->addMedia($userInput['profile'])->toMediaCollection(User::PROFILE, config('app.media_disc'));
            }

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
