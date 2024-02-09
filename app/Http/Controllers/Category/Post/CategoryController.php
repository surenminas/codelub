<?php

namespace App\Http\Controllers\Category\Post;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $posts = Cache::remember('post-categories-page' . request('page', 1), now()->addDay(1), function () use($category){
            return $category->posts()->paginate(12);
        });
        // $posts = $category->posts()->paginate(9);
        $categoryName = $category->title;
        return view('category.post.index', compact('posts','categoryName'));
    }
}
