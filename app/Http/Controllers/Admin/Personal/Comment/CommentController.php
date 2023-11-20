<?php

namespace App\Http\Controllers\Admin\Personal\Comment;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Services\Personal\Comment\Service;
use App\Http\Requests\Personal\Comment\UpdateRequest;

class CommentController extends Controller
{
    public function __construct(protected Service $service)
    {
    }
    
    public function index()
    {
        $comments = auth()->user()->comments;

        return view('admin.personal.comment.index', compact('comments'));
    }

    public function edit(Comment $comment)
    {
        return view('admin.personal.comment.edit', compact('comment'));
    }

    public function update(UpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $comment->update($data);

        return redirect()->route('admin.personal.comment.index');
    }

    public function destroy(Comment $comment)
    {
        $this->service->destroy($comment);

        return redirect()->back();
    }
}
