<?php

namespace App\Http\Controllers\Personal\Like;


use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->likedPosts->toQuery()->orderBy('id', 'desc')->paginate(10);
    
        return view('personal.like.index', compact('posts'));
    }

    public function destroy(Post $post)
    {
        if (!auth()->user()->likedPosts()->detach($post->id)) {
            abort(404);
        }

        return redirect()->route('personal.like.index');

    }
}
