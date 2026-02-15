<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Category $category): View
    {
        return view('category.show', [
            'category' => $category,
            'posts' => $category->posts()
                ->with('featuredImage', 'user.image')
                ->latest('id')
                ->simplePaginate(6),
        ]);
    }
}
