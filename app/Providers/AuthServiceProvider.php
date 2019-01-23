<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Stevenmaguire\OAuth2\Client\Provider\Keycloak;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Auth;
use App\Extensions\KeycloakUserProvider;
use App\Services\Auth\KeycloakGuard;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('administrador', function ($user) {
            $user = $user->toArray();
            return in_array('administrador', $user['roles']);
        });
        Gate::define('gerente', function ($user) {
            $user = $user->toArray();
            return in_array('gerente', $user['roles']);
        });
        Gate::define('desenvolvedor', function ($user) {
            $user = $user->toArray();
            return in_array('desenvolvedor', $user['roles']);
        });
    }

    public function register()
    {
        $this->app->singleton('Keycloak', function ($app) {
            return new Keycloak([
                'authServerUrl' => config('keycloak.authServerUrl'),
                'realm' => config('keycloak.realm'),
                'clientId' => config('keycloak.clientId'),
                'clientSecret' => config('keycloak.clientSecret'),
                'redirectUri' => config('keycloak.redirectUri'),
            ]);
        });

        $this->app->bind('App\Models\Auth\User', function ($app) {
            return new User($app->make('Keycloak'));
        });

        // add custom guard provider
        Auth::provider('kc_driver_provider', function ($app, array $config) {
            return new KeycloakUserProvider($app->make('App\Models\Auth\User'));
        });

        // add custom guard
        Auth::extend('kc_driver_guard', function ($app, $name, array $config) {
            $userProvider = Auth::createUserProvider('kc_users');
            return new KeycloakGuard($userProvider, $app->make('request'));
        });

    }
}
