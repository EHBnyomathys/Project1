<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProfileSeeder::class,
            NewsSeeder::class,
            FAQSeeder::class,
            ContactSeeder::class,
            CommentSeeder::class,
            MessageSeeder::class,
        ]);
    }
}
