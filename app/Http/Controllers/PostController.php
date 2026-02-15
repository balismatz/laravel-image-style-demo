<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Category $category, Post $post): View
    {
        return view('post.show', [
            'post' => $post,
            'category' => $category,
        ]);
    }
}
