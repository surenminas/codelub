<?php

namespace App\Http\Controllers\Album\Gallery;

use App\Models\Album;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class GalleryController extends Controller
{
    public function index(Album $album)

    {
        
        $galleries = Cache::remember('gallery-page' . request('page', 1), now()->addDay(1), function () use ($album) {
            return $album->galleries()->paginate(20);
        });
    
        $galleryName = $album->title;

        if ($galleries->count() === 0) {
            $galleries = "no_result";
        }

        return view('album.gallery.index', compact('galleries', 'galleryName'));
    }
}
