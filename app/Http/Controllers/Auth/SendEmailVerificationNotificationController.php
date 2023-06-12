<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class SendEmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function __invoke(): JsonResponse
    {
        if (Auth::user()->hasVerifiedEmail()) {
            return response()->json([
                'status' => 'email-already-verified',
            ]);
        }

        Auth::user()->sendEmailVerificationNotification();

        return response()->json([
            'status' => 'verification-link-sent',
        ]);
    }
}
