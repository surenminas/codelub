<?php

namespace App\Http\Controllers\Api\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\Post\Service;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Resources\Post\PostRresource;
use App\Http\Resources\Post\PostCollection;

class ApiPostController 
{

    public function __construct(protected Service $service)
    {
                
    }

    public function index()
    {
        return new PostRresource(Post::orderByDesc('created_at')->first());

    }

    public function all()
    {
        return new PostCollection(Post::paginate(6));
    }
    
    public function myPosts(Request $request)
    {
        $token = JWTAuth::getToken();
        $payload = JWTAuth::getPayload($token)->toArray();

        //get user ID from $payload["user_id"]
        //get posts which belong to userID
    }
    
}
