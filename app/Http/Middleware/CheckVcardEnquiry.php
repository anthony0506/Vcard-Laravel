<?php

namespace App\Http\Middleware;

use App\Models\Enquiry;
use App\Models\ScheduleAppointment;
use App\Models\Vcard;
use App\Utils\ResponseUtil;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Response;

class CheckVcardEnquiry
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $vcards = Vcard::with(['tenant.user', 'template'])->where('tenant_id',
            getLogInTenantId())->pluck('id')->toArray();

        if ($request->vcard) {
            if (in_array($request->vcard, $vcards)) {
                return $next($request);
            } else {
                abort('404');
            }
        }
        if (! is_numeric($request->enquiry)) {
            if ($request->appointment) {
                $appointment = ScheduleAppointment::whereIn('vcard_id', $vcards)->pluck('id')->toArray();
                if (in_array($request->appointment->id, $appointment)) {
                    return $next($request);
                } else {
                    abort('404');
                }
            }
            $enquiry = Enquiry::whereIn('vcard_id', $vcards)->pluck('id')->toArray();
            if (in_array($request->enquiry->id, $enquiry)) {
                return $next($request);
            } else {
                return Response::json(ResponseUtil::makeError('Seems, you are not allowed to access this record."'),
                    422);
            }
        } else {
            $enquiry = Enquiry::whereIn('vcard_id', $vcards)->pluck('id')->toArray();
            if (in_array($request->enquiry, $enquiry)) {
                return $next($request);
            } else {
                abort('404');
            }
        }
    }
}
