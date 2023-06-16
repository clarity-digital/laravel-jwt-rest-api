<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Show the currently authenticated user.
     */
    public function show(): UserResource
    {
        return new UserResource(Auth::user());
    }

    /**
     * Update the currently authenticated user.
     */
    public function update(UpdateUserRequest $request): UserResource
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
            $request->user()->sendEmailVerificationNotification();
        }

        $request->user()->save();

        return new UserResource(Auth::user()->fresh());
    }

    /**
     * Update the password of the currently authenticated user.
     */
    public function changePassword(Request $request): JsonResponse
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'status' => 'Password updated.'
        ]);
    }
}
