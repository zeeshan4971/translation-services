<?php

namespace Database\Factories;

use App\Models\Locale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Translation>
 */
class TranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'key' => $this->faker->word . '_' . $this->faker->unique()->numberBetween(1, 1000000),
            'locale_id' => Locale::query()->inRandomOrder()->first()->id ?? 1,
            'content' => $this->faker->sentence,
            'tags' => $this->faker->randomElements(['web', 'mobile', 'desktop'], rand(1, 3)),
        ];
    }
}
