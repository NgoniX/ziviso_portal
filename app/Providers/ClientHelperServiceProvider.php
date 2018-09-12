<?php

namespace App\Providers;

use App\Helpers\ClientHelper;
use Illuminate\Support\ServiceProvider;

class ClientHelperServiceProvider extends ServiceProvider
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
        $this->app->bind('client', function (){
            return new ClientHelper;
        });
    }
}
