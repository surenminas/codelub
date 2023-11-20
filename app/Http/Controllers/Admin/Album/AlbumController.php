<?php

namespace App\Http\Controllers\Admin\Album;


use App\Models\Album;
use App\Services\Admin\Album\Service;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\Admin\Album\StoreRequest;
use App\Http\Requests\Admin\Album\UpdateRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AlbumController extends BaseController
{
    public function __construct(protected Service $service)
    {
    }

    public function index()
    {

        $albums = Album::all();

        return view('admin.album.index', compact('albums'));
    }

    public function create()
    {

        return view('admin.album.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data = $this->service->store($data);

        return redirect()->route('admin.album.index');
    }


    public function edit(Album $album)
    {

        return view('admin.album.edit', compact('album'));
    }

    public function update(UpdateRequest $request, Album $album)
    {

        $data = $request->validated();
        $data = $this->service->update($data, $album);

        return redirect()->route('admin.album.index');
    }

    public function destroy(Album $album)
    {
        $this->authorize('deleteAnyInfomation', auth()->user());
        
        $album->delete();
        return redirect()->back();
    }

    
}
