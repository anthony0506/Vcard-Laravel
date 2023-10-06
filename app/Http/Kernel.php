<?php

namespace App\Http;

use App\Http\Middleware\CheckVcardAnalytics;
use App\Http\Middleware\checkVcardEdit;
use App\Http\Middleware\CheckVcardEnquiry;
use App\Http\Middleware\SetLanguage;
use App\Http\Middleware\XSS;
use App\Http\Middleware\PricingCustomMiddleware;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class,
        //        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \Spatie\CookieConsent\CookieConsentMiddleware::class,

    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
        'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
        'valid.user' => \App\Http\Middleware\CheckUserIsValid::class,
        'subscription' => \App\Http\Middleware\CheckSubscription::class,
        'vcardSubscription' => \App\Http\Middleware\CheckVcardSubscription::class,
        'multi_tenant' => \App\Http\Middleware\MultiTenantMiddleware::class,
        'xss' => XSS::class,
        'language' => \App\Http\Middleware\languageChangeMiddleware::class,
        'analytics' => \App\Http\Middleware\Analytics::class,
        'setLanguage' => SetLanguage::class,
        'checkVcardEdit' => checkVcardEdit::class,
        'checkVcardAnalyst' => CheckVcardAnalytics::class,
        'checkVcardEnquiry' => CheckVcardEnquiry::class,
        'pricingCustomMiddleware' => PricingCustomMiddleware::class,

    ];
}
