<?php

namespace App\Http\Controllers\Personal\Like;


use App\Models\Post;
use App\Services\Personal\Like\Service;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    public function __construct(protected Service $service)
    {
    }
    public function index()
    {
        // if (auth()->user()->likedPosts()->first() == null) {
        //     abort(404);
        // }
        
        $posts = auth()->user()->likedPosts->toQuery()->orderBy('id', 'desc')->paginate(10);

        return view('personal.like.index', compact('posts'));
    }

    public function destroy(Post $post)
    {
        $data = $this->service->destroy($post);

        if (isset($data["likeDelete"])) {
            abort(404);
        }

        if ($data['checkLikeCount'] == null) {
            return redirect()->route('personal.main.index');
        } else {
            return redirect()->route('personal.like.index');
        }
    }
}
