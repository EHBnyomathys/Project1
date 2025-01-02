<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@ehb.be')->first();
        $user = User::where('email', 'user@ehb.be')->first();

        if ($admin && $user) {
            Message::updateOrCreate(
                [
                    'sender_id' => $admin->id,
                    'receiver_id' => $user->id,
                ],
                [
                    'content' => 'Hallo gebruiker, dit is een bericht van de admin. Laat het ons weten als je hulp nodig hebt!',
                    'created_at' => now()->subDay(),
                ]
            );

            Message::updateOrCreate(
                [
                    'sender_id' => $user->id,
                    'receiver_id' => $admin->id,
                ],
                [
                    'content' => 'Hallo admin, bedankt voor de ondersteuning en de geweldige website!',
                    'created_at' => now()->subHours(5),
                ]
            );
        } else {
            $this->command->info('Admin of User bestaat niet. Voeg eerst de UserSeeder uit.');
        }
    }
}
