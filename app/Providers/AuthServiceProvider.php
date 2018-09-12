<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Group;
use App\Models\Message;
use App\Models\Subscriber;
use App\Policies\EventPolicy;
use App\Policies\GroupPolicy;
use App\Policies\MessagePolicy;
use App\Policies\SubscriberPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Message::class=>MessagePolicy::class,
        Group::class=>GroupPolicy::class,
        Subscriber::class=>SubscriberPolicy::class,
        Event::class=>EventPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Gate::resource('messages', 'MessagePolicy', [
            'messages.authorizeSend' => 'authorizeSend',
        ]);
    }
}
