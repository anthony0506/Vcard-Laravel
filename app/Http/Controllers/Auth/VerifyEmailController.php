<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AffiliateUser;
use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class VerifyEmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:6,1', )->only('verify', 'resend');
        $this->middleware('setLanguage');
    }

    /**
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function __invoke(Request $request)
    {
        /** @var User $user */
        $user = User::find($request->route('id'));

        if ($user->hasVerifiedEmail()) {
            Flash::success(__('messages.placeholder.your_mail_already_verified'));

            return redirect(route('login'));
        }

        if ($user->markEmailAsVerified()) {
            $affiliateUser = AffiliateUser::withoutGlobalScope('verifiedUser')
                ->whereIsVerified(false)
                ->whereUserId($user->id)
                ->first();

            if ($affiliateUser) {
                $affiliateUser->update(['is_verified' => true]);
            }

            event(new Verified($request->user()));
        }
        Flash::success(__('messages.placeholder.successfully_verified'));

        return redirect(route('login'));
    }

    /**
    @param $token
    @return Redirect|RedirectResponse|Application
     */
    public function verifyEmail($userId, $token)
    {
        $verifiedUser = EmailVerification::where('token', $token)->where('user_id', $userId)->firstOrFail();

        if (isset($verifiedUser)) {
            $user = User::find($userId);
            $user->email = $verifiedUser->email;
            $user->save();

            $affiliateUser = AffiliateUser::withoutGlobalScope('verifiedUser')
                ->whereIsVerified(false)
                ->whereUserId($user->id)
                ->first();

            if ($affiliateUser) {
                $affiliateUser->update(['is_verified' => true]);
            }
            
            $verifiedUser->delete();
            Flash::success(__('Your email has been verified successfully.'));

            return redirect(route('login'));
        }
    }
}
