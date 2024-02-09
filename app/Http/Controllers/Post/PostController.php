<?php

namespace App\Http\Controllers\Post;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\BaseController;

class PostController extends BaseController
{
    public function index()
    {
        $randomPosts = Post::get()->random(3);
        $posts = Cache::remember('posts-page' . request('page', 1), now()->addDay(1), function () {
            return Post::paginate(6);
        });

        return view('post.index', compact('randomPosts', 'posts'));
    }

    public function show(Post $post)
    {
        $date = Carbon::parse($post->created_at);
        $relatedPosts = Post::where('category_id', $post->category_id)
        ->where('id', '!=', $post->id)
        ->take(3)
        ->get();
        return view('post.show', compact('post', 'date', 'relatedPosts'));
    }
}
