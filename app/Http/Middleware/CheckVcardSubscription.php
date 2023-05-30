<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Models\Vcard;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Route;
//use Route;

class CheckVcardSubscription
{
    /**
     * @param  Request  $request
     * @param  Closure  $next
     * @return Application|RedirectResponse|Redirector|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $request = $next($request);

        $urlAlias = Route::current()->parameters['alias'];
        $vcard = Vcard::whereUrlAlias($urlAlias)->firstOrFail();
        /** @var User $user */
        $user = User::whereTenantId($vcard->tenant_id)->with('subscription')->first();

        if ($user->subscription->ends_at > Carbon::now()->format('Y-m-d H:i:s')) {
            return $request;
        }

        return abort(404);
    }
}
