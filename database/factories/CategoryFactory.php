<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = Str::of(
            $this->faker->unique()->word()
        );

        return [
            'title' => $title->ucfirst(),
            'slug' => $title->slug(),
            'subtitle' => mt_rand(0, 1) ? $this->faker->sentence(10) : null,
        ];
    }
}
