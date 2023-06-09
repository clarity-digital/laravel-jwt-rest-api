<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [];

    public function boot(): void
    {
        $this->registerPolicies();

        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            $url = "/password-reset?token=$token&email={$notifiable->getEmailForPasswordReset()}";

            return config('app.frontend_url') . $url;
        });

        VerifyEmail::createUrlUsing(function (object $notifiable) {
            $url = URL::temporarySignedRoute(
                'verification.verify',
                Carbon::now()->addMinutes(config('auth.verification.expire', 60)),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification())
                ]
            );

            $url = str_replace(config('app.url') . '/api/verify-email', '', urldecode($url));

            return config('app.frontend_url') . '/verify-email' . $url;
        });
    }
}
