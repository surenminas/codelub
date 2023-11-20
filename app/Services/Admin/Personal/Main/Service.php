<?php

namespace App\Services\Admin\Personal\Main;

use Illuminate\Support\Facades\DB;



class Service
{
    public function index()
    {
        $data = [];
        $data['likedCount'] = auth()->user()->likedPosts()->count();
        $data['commentCount'] = auth()->user()->comments()->count();

        return $data;
    }
}
