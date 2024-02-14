<?php

namespace App\Actions\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ChangePassword
{
    public function __invoke(
        User $user,
        string $password,
    ): void {
        $user->update([
            'password' => Hash::make($password),
        ]);
    }
}
