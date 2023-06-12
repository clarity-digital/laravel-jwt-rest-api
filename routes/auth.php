<?php

use App\Http\Controllers\Auth\JwtAuthController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SendEmailVerificationNotificationController;
use App\Http\Controllers\Auth\SendPasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [JwtAuthController::class, 'register'])
    ->name('register');

Route::post('/login', [JwtAuthController::class, 'login'])
    ->name('login');

Route::post('/refresh', [JwtAuthController::class, 'refresh'])
    ->name('refresh');

Route::post('/forgot-password', SendPasswordResetLinkController::class)
    ->name('password.email');

Route::post('/reset-password', ResetPasswordController::class)
    ->name('password.update');

Route::middleware('auth:api')->group(function () {
    Route::post('/email/verification-notification', SendEmailVerificationNotificationController::class)
        ->middleware(['throttle:6,1'])
        ->name('verification.send');

    Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('/logout', [JwtAuthController::class, 'logout'])
        ->name('logout');
});
