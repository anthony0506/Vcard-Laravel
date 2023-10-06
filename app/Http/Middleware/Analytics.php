<?php

namespace App\Http\Middleware;

use App\Models\Analytic;
use App\Models\Vcard;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;

//use Route;

class Analytics
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $uri = str_replace($request->root(), '', $request->url()) ?: '/';
        $urlAlias = Route::current()->parameters['alias'];
        $vcardId = Vcard::select('id')->where('url_alias', $urlAlias)->pluck('id')->toArray();
        if (! $vcardId) {
            return abort('404');
        }

        $agent = new Agent();
        if (! $agent->isRobot()) {
            $agent->setUserAgent($request->headers->get('user-agent'));
            $agent->setHttpHeaders($request->headers);
            $sessionExists = Analytic::where('session', $request->session()->getId())->where('vcard_id',
                $vcardId[0])->exists();
            if ($sessionExists) {
                return $next($request);
            }

            $items = implode($agent->languages());
            $lang = substr($items, 0, 2);
            $ip = Location::get($request->ip());
            $country = $ip ? $ip->countryName : '';
            Analytic::create([
                'session' => $request->session()->getId(),
                'vcard_id' => $vcardId[0],
                'uri' => $uri,
                'source' => $request->headers->get('referer'),
                'country' => $country,
                'browser' => $agent->browser() ?? null,
                'device' => $agent->deviceType(),
                'operating_system' => $agent->platform(),
                'ip' => $request->ip(),
                'language' => $lang,
                'meta' => json_encode(Location::get($request->ip())),
            ]);

            return $next($request);
        }

        return $next($request);
    }
}
