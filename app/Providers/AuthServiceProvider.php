<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('act-user', function($user){
            return $user->hasAccess(['act-user']);
        });
        Gate::define('act-teacher', function($user){
            return $user->hasAccess(['act-teacher']);
        });
        Gate::define('act-student', function($user){
            return $user->hasAccess(['act-student']);
        });
        Gate::define('act-class', function($user){
            return $user->hasAccess(['act-class']);
        });
        Gate::define('act-point', function($user){
            return $user->hasAccess(['act-point']);
        });
        Gate::define('act-exam', function($user){
            return $user->hasAccess(['act-exam']);
        });
        Gate::define('act-question', function($user){
            return $user->hasAccess(['act-question']);
        });
        Gate::define('act-answer', function($user){
            return $user->hasAccess(['act-answer']);
        });
        Gate::define('view-point', function($user){
            return $user->hasAccess(['view-point']);
        });
    }
}
