<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Illuminate\Support\Carbon;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        News::updateOrCreate(
            ['title' => 'Boekenkasten raken leeg'],
            [
                'content' => 'Volgens expert Boekenmeester geraken de boekenkasten van de bevolking leeg. Na onderzoek bleek dat 90% van de Vlamingen steeds meer en meer naar de bibliotheek gaan in plaats van zelf fysieke boeken te kopen.',
                'published_at' => Carbon::now()->subDays(2),
                'image' => 'news_images\Fx3l9zefLdhkNs6IgMgqsZ02bJTs8j8F2ZE8KkgM.jpg',
            ]
        );

        News::updateOrCreate(
            ['title' => 'Boeken prijzen stijgen'],
            [
                'content' => 'Sinds de opkomst van de Amerikaanse president Donalt Trump stijgen de prijzen van boeken. Volgens expert Boekenmeester is dit een gevolg van de handelsoorlog tussen de VS en China.',
                'published_at' => Carbon::now()->subDay(),
                'image' => 'news_images\kMeNrp7SQu5hlzmjBxdeWwxLljQ0Uy3C0Gewkydw.jpg',
            ]
        );
    }
}
