<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ListUsers extends Command
{
    protected $signature = 'user:list';

    protected $description = 'List all users';

    public function handle(): void
    {
        $users = User::all();

        $this->table(
            ['ID', 'Name', 'Email', 'Email Verified At'],
            $users->map(function (User $user) {
                return [
                    $user->id,
                    $user->name,
                    $user->email,
                    $user->email_verified_at,
                ];
            })
        );
    }
}
