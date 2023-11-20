<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Services\Admin\Post\Service;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\FilterRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends BaseController
{
    public function __construct(protected Service $service)
    {
        $this->authorizeResource(Post::class, 'post');
    }

    public function index(FilterRequest $request)
    {


        $data = $request->validated();
        $postSearchData = $this->service->index($data);

        return view('admin.post.index', compact('postSearchData'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('admin.post.index');
    }

    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $post = $this->service->update($data, $post);

        return view('admin.post.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }
}
