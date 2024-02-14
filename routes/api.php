<?php

use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::middleware('auth:api')->group(function () {
    Route::get('/user', [UserController::class, 'show'])
        ->name('user.show');
});

Route::middleware(['auth:api', 'verified'])->group(function () {
    Route::patch('/user', [UserController::class, 'update'])
        ->name('user.update');

    Route::patch('/user/change-password', [UserController::class, 'changePassword'])
        ->name('user.change-password');
});
