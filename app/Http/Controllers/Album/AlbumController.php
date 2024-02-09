<?php

namespace App\Http\Controllers\Album;


use App\Models\Album;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\BaseController;


class AlbumController extends BaseController
{

    public function index()
    {
        $albums = Cache::remember('albums-page' . request('page', 1), now()->addDay(1), function () {
            return Album::paginate(12);
        });
        
        return view('album.index', compact('albums'));
    }
}
