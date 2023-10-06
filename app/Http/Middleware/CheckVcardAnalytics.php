<?php

namespace App\Http\Middleware;

use App\Models\Vcard;
use Closure;
use Illuminate\Http\Request;

class CheckVcardAnalytics
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $vcards = Vcard::with(['tenant.user', 'template'])->where('tenant_id',
            getLogInTenantId())->pluck('id')->toArray();
        if (in_array($request->vcard->id, $vcards)) {
            return $next($request);
        } else {
            abort('404');
        }
    }
}
