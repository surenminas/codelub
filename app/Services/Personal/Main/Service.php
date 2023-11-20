<?php

namespace App\Services\Personal\Main;

use Illuminate\Support\Facades\DB;



class Service
{
    public function index()
    {
        $data = [];
        $data['comments'] = auth()->user()->comments()->latest('created_at')->first();
        $data['post'] = DB::table('posts')->where('id', $data['comments']->post_id)->first();
        $data['likedPost'] = auth()->user()->likedPosts()->latest('created_at')->first();
        $data['likedCount'] = auth()->user()->likedPosts()->count();
        $data['commentCount'] = auth()->user()->comments()->count();
        
        return $data;
    }

    
}
