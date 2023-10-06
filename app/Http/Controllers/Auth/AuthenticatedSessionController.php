<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return Application|Factory|View|\Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  LoginRequest  $request
     * @return RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $user = User::whereEmail($request->email)->first();

        if (! empty($user)) {
            if ($user['email_verified_at'] != null) {
                if ($user['is_active'] == User::IS_ACTIVE) {
                    $request->authenticate();

                    $request->session()->regenerate();

                    return redirect()->intended(getDashboardURL());
                } else {
                    throw ValidationException::withMessages([
                        'email' => __('auth.account_deactivate'),
                    ]);
                }
            } else {
                throw ValidationException::withMessages([
                    'email' => __('auth.email_verify'),
                ]);
            }
        } else {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
