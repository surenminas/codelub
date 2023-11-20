<?php

namespace App\Http\Controllers\Category\Post;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $posts = $category->posts()->paginate(9);
        $categoryName = $category->title;
        return view('category.post.index', compact('posts','categoryName'));
    }
}
