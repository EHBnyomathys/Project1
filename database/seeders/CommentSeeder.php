<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\News;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@ehb.be')->first();
        $user = User::where('email', 'user@ehb.be')->first();

        $newsItem = News::first();

        if ($newsItem) {
            if ($admin) {
                Comment::updateOrCreate(
                    [
                        'user_id' => $admin->id,
                        'news_id' => $newsItem->id,
                    ],
                    [
                        'content' => 'Dit is een officiële opmerking van de beheerder over dit nieuwsartikel.',
                    ]
                );
            }

            if ($user) {
                Comment::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'news_id' => $newsItem->id,
                    ],
                    [
                        'content' => 'Wat een geweldig nieuwsbericht! Bedankt voor het delen.',
                    ]
                );
            }
        } else {
            $this->command->info('Er zijn geen nieuwsitems beschikbaar. Voeg eerst nieuwsitems toe.');
        }
    }
}
