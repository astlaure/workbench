<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\I18n;

class I18nServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('i18n', function($app) {
            return new I18n();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
