<?php

namespace App;

use Illuminate\Support\Facades\Route;

class I18n {
    public function registerRoutes($action, $middlewares = [])
    {
        Route::group([
            'prefix' => $this->prefix(),
            'middleware' => array_merge(['locale'], $middlewares),
        ], $action);
    }

    public function url(string $path = null, $parameters = [], bool $secure = null)
    {
        return url(app()->getLocale() . $path, $parameters, $secure);
    }

    function route($name, $parameters = [], bool $absolute = true): string
    {
        if (!isset($parameters['locale'])) {
            $parameters['locale'] = app()->getLocale();
        }
        return route($name, $parameters, $absolute);
    }

    public function prefix()
    {
        $locales = config('i18n.supportedLocales');
        $default = config('i18n.defaultLocale');
        $urlParts = explode('/', request()->path());

        $locale = $urlParts[0] ?? '';

        if (!in_array($locale, $locales) || $locale == $default) {
            return '';
        } else {
            return $locale;
        }
    }
}
