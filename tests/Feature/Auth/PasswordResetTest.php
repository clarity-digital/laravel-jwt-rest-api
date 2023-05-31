<?php

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;

test('a password reset link can be requested for an email', function () {
    Notification::fake();

    $user = User::factory()->create([
        'email' => 'test@example.com'
    ]);

    $this->postJson('/api/forgot-password', [
        'email' => 'test@example.com',
    ]);

    Notification::assertSentTo($user, ResetPassword::class);
});

test('a password can be reset with a valid token', function () {
    Notification::fake();

    $user = User::factory()->create([
        'email' => 'test@example.com'
    ]);

    $this->postJson('/api/forgot-password', [
        'email' => 'test@example.com',
    ]);

    Notification::assertSentTo($user, ResetPassword::class, function ($notification) use ($user) {
        $response = $this->postJson('/api/reset-password', [
            'token' => $notification->token,
            'email' => $user->email,
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

        $response->assertSessionHasNoErrors();

        return true;
    });
});
