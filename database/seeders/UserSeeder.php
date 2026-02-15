<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imagesPath = resource_path('images/user');

        User::factory()->createMany([
            [
                'name' => 'Leslie Alexander',
                'job_title' => 'Co-Founder / CEO',
            ],
            [
                'name' => 'Michael Foster',
                'job_title' => 'Co-Founder / CTO',
            ],
            [
                'name' => 'Dries Vincent',
                'job_title' => 'Business Relations',
            ],
            [
                'name' => 'Lindsay Walton',
                'job_title' => 'Front-end Developer',
            ],
            [
                'name' => 'Courtney Henry',
                'job_title' => 'Designer',
            ],
            [
                'name' => 'Tom Cook',
                'job_title' => 'Director of Product',
            ],
        ])->map(function (User $user) use ($imagesPath): void {
            if (! $path = Storage::putFile('users', new File($imagesPath.'/'.$user->id.'.jpg'))) {
                return;
            }

            $user->image()->create([
                'path' => $path,
            ]);
        });
    }
}
