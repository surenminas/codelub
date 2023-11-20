<?php

namespace App\Http\Controllers\Admin\Gallery;


use App\Models\Album;
use App\Models\Gallery;
use App\Services\Admin\Gallery\Service;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\Admin\Gallery\StoreRequest;
use App\Http\Requests\Admin\Gallery\UpdateRequest;

class GalleryController extends BaseController
{

    public function __construct(protected Service $service)
    {
    }
    
    public function index()
    {
        $galleries = Gallery::all();


        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        $albums = Album::all();
        return view('admin.gallery.create', compact('albums'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        
        $data = $this->service->store($data);

        return redirect()->route('admin.gallery.index');
    }


    public function edit(Gallery $gallery)
    {

        $albums = Album::all();
        return view('admin.gallery.edit', compact('gallery', 'albums'));
    }

    public function update(UpdateRequest $request, Gallery $gallery)
    {

        $data = $request->validated();
        $data = $this->service->update($data, $gallery);

        return redirect()->route('admin.gallery.index');
    }

    public function destroy(Gallery $gallery)
    {
        $this->authorize('deleteAnyInfomation', auth()->user());
        $gallery->delete();
        return redirect()->back();
    }
}
