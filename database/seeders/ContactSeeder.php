<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactMessage;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        ContactMessage::updateOrCreate(
            ['email' => 'user@ehb.be'],
            [
                'name' => 'Jan Jansen',
                'subject' => 'Vraag over dienstverlening',
                'message' => 'Hallo, ik heb een vraag over de diensten die jullie aanbieden. Kunnen jullie me hier meer informatie over geven?',
                'created_at' => now()->subDays(2),
            ]
        );

        ContactMessage::updateOrCreate(
            ['email' => 'admin@ehb.be'],
            [
                'name' => 'Admin Support',
                'subject' => 'Feedback over de website',
                'message' => 'Ik wilde even melden dat de website uitstekend functioneert. Ga zo door!',
                'created_at' => now()->subDay(),
            ]
        );
    }
}
