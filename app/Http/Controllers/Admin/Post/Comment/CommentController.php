<?php

namespace App\Http\Controllers\Admin\Post\Comment;

use App\Models\Post;
use App\Models\Comment;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    // public function __construct(protected Service $service)
    // {
    // }
    
    public function index(Post $post)
    {
        $comments = $post->comment()->get();

        return view('admin.post.comment.index', compact('comments', 'post'));
    }

    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();    

        return redirect()->back();
    }
}
