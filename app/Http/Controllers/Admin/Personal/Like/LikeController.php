<?php

namespace App\Http\Controllers\Admin\Personal\Like;


use App\Models\Post;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->likedPosts;

        return view('admin.personal.like.index', compact('posts'));
    }

    public function destroy(Post $post)
    {
        if (!auth()->user()->likedPosts()->detach($post->id)) {
            abort(404);
        }

        return redirect()->route('admin.personal.like.index');

    }
}
