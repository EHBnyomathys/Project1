<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@ehb.be')->first();
        $user = User::where('email', 'user@ehb.be')->first();

        if ($admin) {
            Profile::updateOrCreate(
                ['user_id' => $admin->id],
                [
                    'username' => 'AdminMaster',
                    'birthday' => '1990-01-01',
                    'about_me' => 'Ik ben de beheerder van deze website en zorg voor een vlotte werking.',
                    'profile_picture' => 'profile_pictures\4OooCEldktNkLiClpp8aZEDONBF5kCLLk016fOkX.jpg',
                ]
            );
        }

        if ($user) {
            Profile::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'username' => 'StandaardGebruiker',
                    'birthday' => '2000-05-15',
                    'about_me' => 'Ik ben een enthousiaste gebruiker van deze geweldige applicatie!',
                    'profile_picture' => 'profile_pictures\LGVLtnQqOXzrZftfB0TqwzODpipQ59ioZ9TS1NcY.jpg',
                ]
            );
        }
    }
}
