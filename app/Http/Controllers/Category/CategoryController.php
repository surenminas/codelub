<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Cache::remember('categories-page' . request('page', 1), now()->addDay(1), function () {
            return Category::paginate(12);
        });
        return view('category.index', compact('categories'));
    }
}
