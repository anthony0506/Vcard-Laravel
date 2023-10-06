<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class languageChangeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $localeLanguage = Session::get('languageChange_'.$request->alias);

        if (! empty($localeLanguage)) {
            setLocalLang($localeLanguage);

            return $next($request);
        }

        setLocalLang(getVcardDefaultLanguage());

        return $next($request);
    }
}
