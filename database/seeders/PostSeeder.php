<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imagesPath = resource_path('images/post');

        $categories = Category::all();

        $users = User::all();

        Post::factory(100)
            ->sequence(fn (): array => [
                'category_id' => $categories->random(),
                'user_id' => $users->random(),
            ])
            ->create()
            ->map(function (Post $post) use ($imagesPath): void {
                $postImages = collect()
                    ->times(10)
                    ->random(4)
                    ->map(fn (int $value): array => [
                        'path' => Storage::putFile('posts', new File($imagesPath.'/'.$value.'.jpg')),
                    ])
                    ->filter(fn (array $value): bool => is_string($value['path']))
                    ->values();

                $post->images()->createMany($postImages);
            });
    }
}
