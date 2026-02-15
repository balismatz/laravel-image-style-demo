<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Section;
use App\Models\User;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Display the home.
     */
    public function __invoke(): View
    {
        $sections = Section::query()
            ->with('images')
            ->whereIn('section_id', ['hero', 'blog', 'banner', 'team'])
            ->get()
            ->keyBy('section_id');

        $posts = Post::query()
            ->with(['category', 'featuredImage', 'user.image'])
            ->limit(4)
            ->latest('id')
            ->get();

        $users = User::query()
            ->with('image')
            ->limit(6)
            ->get();

        return view('home', [
            'sections' => $sections,
            'posts' => $posts,
            'users' => $users,
        ]);
    }
}
