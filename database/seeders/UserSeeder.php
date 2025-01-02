<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@ehb.be'],
            [
                'name' => 'Admin',
                'password' => Hash::make('Password!321'),
                'role' => 'admin'
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@ehb.be'],
            [
                'name' => 'User',
                'password' => Hash::make('Password!321'),
                'role' => 'user'
            ]
        );
    }
}
