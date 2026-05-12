<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    protected $signature = 'user:admin {username}';
    protected $description = 'Set a user as admin';

    public function handle(): void
    {
        $user = User::where('username', $this->argument('username'))->first();

        if (!$user) {
            $this->error('User not found.');
            return;
        }

        $user->update(['role' => 'admin']);
        $this->info("User '{$user->username}' is now admin.");
    }
}
