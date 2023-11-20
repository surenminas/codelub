<?php

namespace App\Http\Controllers\Album;


use App\Models\Album;
use App\Http\Controllers\BaseController;


class AlbumController extends BaseController
{
    
    public function index()
    {

        $albums = Album::paginate(9);

        return view('album.index', compact('albums'));
    }


}
