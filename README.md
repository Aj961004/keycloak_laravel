# exemplo_laravel_keycloak
Exemplo de aplicação com adaptador de keycloak / php / laravel
Criando custom [Guard](https://github.com/ceciliarb/exemplo_laravel_keycloak/blob/master/app/Services/Auth/KeycloakGuard.php) e [UserProvider](https://github.com/ceciliarb/exemplo_laravel_keycloak/blob/master/app/Extensions/KeycloakUserProvider.php).

Utilizamos os pacotes:

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

