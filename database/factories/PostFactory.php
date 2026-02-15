<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = Str::of(
            $this->faker->unique()->sentence(mt_rand(4, 10))
        );

        return [
            'title' => $title->substr(0, -1),
            'slug' => $title->slug(),
            'excerpt' => $this->faker->paragraph(mt_rand(1, 4)),
            'content' => collect($this->faker->paragraphs(mt_rand(2, 5)))
                ->map(fn (string $paragraph): string => '<p>'.$paragraph.'</p>')
                ->join(''),
            'category_id' => Category::factory(),
            'user_id' => User::factory(),
        ];
    }
}
