<?php

namespace App\Http\Controllers\Album\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Album;

class GalleryController extends Controller
{
    public function index(Album $album)

    {
        $galleries = $album->galleries()->paginate(20);
        $galleryName = $album->title;

        if($galleries->count() === 0){
            $galleries = "no_result";
        }

        return view('album.gallery.index', compact('galleries', 'galleryName'));
    }
}
