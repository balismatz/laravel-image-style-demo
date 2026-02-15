<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->createMany([
            [
                'title' => 'Business',
                'slug' => 'business',
            ],
            [
                'title' => 'Marketing',
                'slug' => 'marketing',
            ],
            [
                'title' => 'Sales',
                'slug' => 'sales',
            ],
        ]);
    }
}
