# Laravel JWT

[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)
[![Conventional Commits](https://img.shields.io/badge/Conventional%20Commits-1.0.0-%23FE5196?logo=conventionalcommits&logoColor=white)](https://conventionalcommits.org)

This repository contains a Laravel 10 with JWT authentication boilerplate
using the [tymon/jwt-auth](https://github.com/tymondesigns/jwt-auth) package.

This boilerplate also has a domain-driven variant which can be
found [here](https://github.com/avocado-media/laravel-jwt-starter-ddd).

## Installation

> Note: the application does not have a `package.json` since this project purely a REST API that will not use any
> JavaScript or asset builders such as Vite.

1. `cp .env .env.example`
2. `composer install`
3. `php artisan jwt:secret` (generate a secret key that will be used to sign your tokens)
4. `php artisan migrate:fresh --seed`

## Authentication

In order to authenticate, you have to log in using valid credentials. User data and an access token will be returned.
You can use this access token to do subsequent requests to the API.

The access token has a TTL of 1 hour until it expires. The access token should be refreshed within this time window to
avoid becoming unauthenticated.

The access token can be refreshed for two weeks. After that, the user has to log in again.

## Telescope

This boilerplate comes with [Laravel Telescope](https://laravel.com/docs/8.x/telescope) installed. You can access the
Telescope dashboard at the `/telescope` URL (prefixed with your local URL).

## Testing

In order to run the tests, run `./vendor/bin/pest`.

## License

This project is open-sourced software licensed under the MIT license.
