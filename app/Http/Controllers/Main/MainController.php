<?php

namespace App\Http\Controllers\Main;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BaseController;

class MainController extends BaseController
{
    public function index()
    {
        $mostPopularyPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->take(3)->get();
              
        return view('home', compact('mostPopularyPosts'));
        // return redirect()->route('post.index');
    }
}
