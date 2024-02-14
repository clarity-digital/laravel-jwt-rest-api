<?php

namespace App\Actions\Users;

use App\Models\User;

class UpdateUser
{
    public function __invoke(
        User $user,
        string $name,
        string $email,
    ): void {
        $user->fill([
            'name'  => $name,
            'email' => $email,
        ]);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
        }

        $user->save();
    }
}
