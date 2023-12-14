# example_laravel_keycloak
Example application with ```keycloak / php / laravel``` adapter.

Creating custom [Guard](https://github.com/ceciliarb/exemplo_laravel_keycloak/blob/master/app/Services/Auth/KeycloakGuard.php) and [UserProvider](https://github.com/ceciliarb/exemplo_laravel_keycloak/blob /master/app/Extensions/KeycloakUserProvider.php). Authorization implemented with [Gates](https://laravel.com/docs/5.7/authorization).

We use the packages:

## OAuth 2.0 Client

https://github.com/thephpleague/oauth2-client

```
$ composer require league/oauth2-client:2.2.1
```

## random_compat

https://github.com/paragonie/random_compat

```
$ composer require paragonie/random_compat:v2.0.9
```

## Keycloak Provider for OAuth 2.0 Client

https://github.com/stevenmaguire/oauth2-keycloak

```
$ composer require stevenmaguire/oauth2-keycloak
```

# Keycloak Settings for Laravel App
- first time jalankan
    - composer update
    - composer install
    - php artisan cache:clear
    - composer dump-autoload
    - php artisan key:generate (untuk generate key di env)
    - php artisan serve
- setelahnya hanya cukup jalankan php artisan serve