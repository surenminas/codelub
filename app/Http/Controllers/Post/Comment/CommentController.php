<?php

namespace App\Http\Controllers\Post\Comment;

use App\Models\Post;
use App\Models\Comment;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\Post\Comment\StoreRequest;

class CommentController extends BaseController
{
    public function store(StoreRequest $request, Post $post)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['post_id'] = $post->id;

        Comment::create($data);
        return redirect()->back();
    }
}
