<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void registerRoutes(callable $action, array $middlewares = [])
 * @method static string url(string|null $path, null|array $parameters, bool|null $secure)
 * @method static string route(array|string $name, null|array $parameters, bool $absolute)
 * @method static string prefix()
 *
 * @see \App\I18n
 */
class I18n extends Facade {
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'i18n';
    }
}
