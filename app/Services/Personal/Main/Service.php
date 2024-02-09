<?php

namespace App\Services\Personal\Main;

use Illuminate\Support\Facades\DB;



class Service
{
    public function index()
    {
        $data = [];
        if (auth()->user()->comments()->first()) {
            $data['comments'] = auth()->user()->comments()->latest('created_at')->first();
            $data['post'] = DB::table('posts')->where('id', $data['comments']->post_id)->first();
        }
        if ($data['likedPost'] = auth()->user()->likedPosts()->latest('created_at')->first()) {
            $data['likedPost'] = auth()->user()->likedPosts()->latest('created_at')->first();
        } else {
            $data['likedPost'] = 0;
        }
        $data['likedCount'] = auth()->user()->likedPosts()->count();
        $data['commentCount'] = auth()->user()->comments()->count();

        return $data;
    }
}
