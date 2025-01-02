<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FAQCategory;
use App\Models\FAQ;

class FAQSeeder extends Seeder
{
    public function run(): void
    {
        $generalCategory = FAQCategory::updateOrCreate(
            ['name' => 'Algemeen'],
            ['description' => 'Algemene vragen over de website.']
        );

        $accountCategory = FAQCategory::updateOrCreate(
            ['name' => 'Account'],
            ['description' => 'Vragen over gebruikersaccounts.']
        );

        FAQ::updateOrCreate(
            ['question' => 'Hoe kan ik contact opnemen met ondersteuning?'],
            [
                'answer' => 'Je kunt ons bereiken via het contactformulier op de website.',
                'category_id' => $generalCategory->id,
            ]
        );

        FAQ::updateOrCreate(
            ['question' => 'Wat zijn de openingstijden?'],
            [
                'answer' => 'We zijn elke werkdag geopend van 9:00 tot 17:00.',
                'category_id' => $generalCategory->id,
            ]
        );

        FAQ::updateOrCreate(
            ['question' => 'Hoe kan ik mijn wachtwoord resetten?'],
            [
                'answer' => 'Klik op de "Wachtwoord vergeten" link op de inlogpagina.',
                'category_id' => $accountCategory->id,
            ]
        );

        FAQ::updateOrCreate(
            ['question' => 'Hoe kan ik mijn account verwijderen?'],
            [
                'answer' => 'Neem contact op met onze klantenservice om je account te verwijderen.',
                'category_id' => $accountCategory->id,
            ]
        );
    }
}
