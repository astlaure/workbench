<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class I18nLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $locales = config('i18n.supportedLocales');
        $default = config('i18n.defaultLocale');
        $urlParts = explode('/', $request->path());
        $locale = $urlParts[0] ?? '';

        if (!in_array($locale, $locales)) {
            App::setLocale($default);
        } else {
            App::setLocale($locale);
        }

        return $next($request);
    }

}
