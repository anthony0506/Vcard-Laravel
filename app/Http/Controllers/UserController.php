<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateChangePasswordRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Mail\ChangePasswordMail;
use App\Models\AffiliateUser;
use App\Models\EmailVerification;
use App\Models\MultiTenant;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Vcard;
use App\Models\Withdrawal;
use App\Models\WithdrawalTransaction;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class UserController extends AppBaseController
{
    /**
     * @var UserRepository
     */
    public UserRepository $userRepo;

    /**
     * UserController constructor.
     *
     * @param  UserRepository  $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * @param  CreateUserRequest  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $this->userRepo->store($input);

        Flash::success(__('messages.flash.user_create'));

        return redirect(route('users.index'));
    }

    /**
     * @param  Request  $request
     * @param  User  $user
     * @return Application|Factory|View
     */
    public function show(Request $request, User $user)
    {
        if (! empty($user) && $user->getRoleNames()[0] == 'admin') {
            return view('users.show', compact('user'));
        }
        abort(404);
    }

    /**
     * @param  User  $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        $subscription = Subscription::with(['plan'])
            ->whereTenantId($user->tenant_id)
            ->where('status', Subscription::ACTIVE)->latest()->first();

        return view('users.edit', compact('user', 'subscription'));
    }

    /**
     * @param  User  $user
     * @return JsonResponse
     */
    public function emailVerified(User $user): JsonResponse
    {
        DB::table('users')->where('id', $user->id)->update(['email_verified_at' => Carbon::now()]);

        $affiliateUser = AffiliateUser::withoutGlobalScope('verifiedUser')
            ->whereIsVerified(false)
            ->whereUserId($user->id)
            ->first();

        if ($affiliateUser) {
            $affiliateUser->update(['is_verified' => true]);
        }

        return $this->sendSuccess(__('messages.flash.verified_email'));
    }

    /**
     * @param  User  $user
     * @return JsonResponse
     */
    public function updateStatus(User $user): JsonResponse
    {
        $user->update([
            'is_active' => ! $user->is_active,
        ]);

        return $this->sendSuccess(__('messages.flash.user_status'));
    }

    /**
     * @param  UpdateUserRequest  $request
     * @param  User  $user
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->userRepo->update($request->all(), $user);

        Flash::success(__('messages.flash.user_update'));

        return redirect(route('users.index'));
    }

    /**
     * @param  User  $user
     * @return JsonResponse
     */
    public function destroy(User $user)
    {
        if ($user->getRoleNames()[0] == 'admin') {
            $affiliateUsers = AffiliateUser::whereUserId($user->id)->orWhere('affiliated_by', $user->id)->get();
            $withdrawals = Withdrawal::whereUserId($user->id)->get();
            foreach ($withdrawals as $withdrawal) {
                $withdrawalTransactions = WithdrawalTransaction::where('withdrawal_id', $withdrawal->id)->get();
                foreach ($withdrawalTransactions as $transaction) {
                    $transaction->delete();
                }

                $withdrawal->delete();
            }
            foreach ($affiliateUsers as $affiliateUser) {
                $affiliateUser->delete();
            }
            Vcard::where('tenant_id', $user->tenant_id)->delete();
            MultiTenant::where('id', $user->tenant_id)->delete();
            $user->delete();

            return $this->sendSuccess('User deleted successfully.');
        }

        return $this->sendError('Seems, you are not allowed to access this record.');
    }

    /**
     * @param  User  $user
     * @return Application|RedirectResponse|Redirector
     */
    public function impersonate(User $user)
    {
        getLogInUser()->impersonate($user);

        return redirect(route('admin.dashboard'));
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function impersonateLeave()
    {
        getLogInUser()->leaveImpersonation();

        return redirect(route('users.index'));
    }

    /**
     * @return Application|Factory|View
     */
    public function editProfile()
    {
        $user = Auth::user();

        return view('profile.index', compact('user'));
    }

    /**
     * @param  UpdateUserProfileRequest  $request
     * @return Application
     */
    public function updateProfile(UpdateUserProfileRequest $request)
    {
        $this->userRepo->updateProfile($request->all());
        $verifiedUser = EmailVerification::where('user_id', getLogInUserId())->first();

        if ($verifiedUser) {
            Flash::success(__('messages.placeholder.email_verification'));
        } else {
            Flash::success(__('messages.flash.user_profile'));
        }

        return redirect(route('profile.setting'));
    }

    /**
     * @param  UpdateChangePasswordRequest  $request
     * @return JsonResponse
     */
    public function changePassword(UpdateChangePasswordRequest $request)
    {
        $input = $request->all();

        try {
            /** @var User $user */
            $user = Auth::user();
            if (! Hash::check($input['current_password'], $user->password)) {
                return $this->sendError(__('messages.flash.current_invalid'));
            }
            $input['password'] = Hash::make($input['new_password']);
            $user->update($input);

            return $this->sendSuccess(__('messages.flash.password_update'));
        } catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param  UpdateUserPasswordRequest  $request
     * @param  User  $user
     * @return JsonResponse
     */
    public function changeUserPassword(UpdateUserPasswordRequest $request, User $user)
    {
        $input = $request->all();

        try {
            $input['password'] = Hash::make($input['new_password']);
            $this->userRepo->update($input, $user);
            $data = [
                'name' => $user->full_name,
                'toName' => getLogInUser()->full_name,
            ];

            Mail::to($user->email)
                ->send(new ChangePasswordMail('emails.change_password_mail',
                    __('messages.flash.password_update'),
                    $data));

            return $this->sendSuccess(__('messages.flash.password_update'));
        } catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function changeLanguage(Request $request): JsonResponse
    {
        $input = $request->all();

        $user = Auth::user();
        if ($user !== null) {
            $user->update($input);
        }

        return $this->sendSuccess(__('messages.flash.language_update'));
    }

    public function changeMode(): RedirectResponse
    {
        $user = Auth::user();

        if ($user !== null) {
            $user->update([
                'theme_mode' => ! $user->theme_mode,
            ]);
        }

        return redirect()->back();
    }
}
