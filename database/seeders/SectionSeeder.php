<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class SectionSeeder extends Seeder
{
    /**
     * The images path.
     */
    protected string $imagesPath;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->imagesPath = resource_path('images');

        $this->createHero();

        $this->createBlog();

        $this->createBanner();

        $this->createTeam();
    }

    /**
     * Create the banner section.
     */
    protected function createBanner(): void
    {
        $section = Section::create([
            'section_id' => 'banner',
            'title' => 'Work with us',
            'content' => 'Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat.',
        ]);

        if ($path = Storage::putFile('banner', new File($this->imagesPath.'/banner/1.jpg'))) {
            $section->images()->create([
                'path' => $path,
            ]);
        }
    }

    /**
     * Create the blog section.
     */
    protected function createBlog(): void
    {
        Section::create([
            'section_id' => 'blog',
            'title' => 'From the blog',
            'content' => 'Learn how to grow your business with our expert advice.',
        ]);
    }

    /**
     * Create the hero section.
     */
    protected function createHero(): void
    {
        $section = Section::create([
            'section_id' => 'hero',
            'title' => 'Laravel Image Style Demo',
            'content' => 'This website demonstrates the functionality of the "Laravel Image Style" package.',
        ]);

        $section->images()->createMany(
            collect()
                ->times(7)
                ->map(fn (int $value): array => [
                    'path' => Storage::putFile('hero', new File($this->imagesPath.'/hero/'.$value.'.jpg')),
                ])
                ->filter(fn (array $value): bool => is_string($value['path']))
                ->values()
        );
    }

    /**
     * Create the team section.
     */
    protected function createTeam(): void
    {
        Section::create([
            'section_id' => 'team',
            'title' => 'Meet our leadership',
            'content' => 'We’re a dynamic group of individuals who are passionate about what we do and dedicated to delivering the best results for our clients.',
        ]);
    }
}
