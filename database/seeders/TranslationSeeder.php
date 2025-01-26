<?php

namespace Database\Seeders;

use App\Models\Locale;
use App\Models\Translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        // Create 10 locales
        Locale::factory()->count(10)->create();

        // Create 100,000+ translations
        Translation::factory()->count(1000)->create();
    }
}
