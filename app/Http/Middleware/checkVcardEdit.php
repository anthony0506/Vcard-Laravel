<?php

namespace App\Http\Middleware;

use App\Models\Vcard;
use App\Utils\ResponseUtil;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Response;

class checkVcardEdit
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $requestVcardId = $request->vcard->id;
        $tenantId = getLogInUser()->tenant_id;
        $VcardId = Vcard::whereTenantId($tenantId)->pluck('id')->toArray();
        if (in_array($requestVcardId, $VcardId)) {
            return $next($request);
        } else {
            return Response::json(ResponseUtil::makeError('Seems, you are not allowed to access this record."'), 422);
        }
    }
}
