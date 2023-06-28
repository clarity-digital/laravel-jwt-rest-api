<img width="800" alt="GitHub README banner_ JWT Laravel JWT REST API" src="https://github.com/avocado-media/laravel-jwt-rest-api/assets/32078923/b802da74-2719-4e76-ab61-bf565cb38b69">


[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)

This repository contains a Laravel 10 with JWT authentication boilerplate
using the [tymon/jwt-auth](https://github.com/tymondesigns/jwt-auth) package, inspired by
the [Laravel Breeze](https://github.com/laravel/breeze) package (API stack).

## Next.js frontend

We created a dedicated frontend using [Next.js](https://nextjs.org/), [Tailwind CSS](https://tailwindcss.com/)
and [NextAuth](https://next-auth.js.org/). You can find the
repository [here](https://github.com/avocado-media/nextjs-jwt-app-router).

## Features

- JWT authentication (login, register, password reset, email verification)
- Profile updating
- Password changing
- Tests (using [Pest](https://pestphp.com/))
- [Laravel Telescope](https://laravel.com/docs/8.x/telescope) (disabled by default)

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

This boilerplate comes with Laravel Telescope installed. You can access the
Telescope dashboard at the `/telescope` URL (prefixed with your local URL).

## Testing

This boilerplate comes with [Pest](https://pestphp.com/) as its testing framework. In order to run the tests,
run `./vendor/bin/pest`.

## Contributing

Feel free to open a pull request if you want to contribute to this project. All contributions / suggestions are
welcome ✨

## License

This project is open-sourced software licensed under the MIT license.
