<?php

namespace App\Services\Admin\Main;

use Throwable;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;


class Service
{
    public function index()
    {
        $data = [];
        $data['usersCount'] = User::all()->count();
        $data['postsCount'] = Post::all()->count();
        $data['categoriesCount'] = Category::all()->count();
        $data['tagsCount'] = Tag::all()->count();

        return $data;
    }
}
