<?php

namespace App\Providers;

use App\Services\FCMService;
use Illuminate\Support\ServiceProvider;

class FCMServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('fcm', function (){
            return new FCMService;
        });
    }
}
