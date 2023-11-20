<?php

namespace App\Services\Admin\Post;

use Throwable;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Http\Filters\PostFilter;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Service
{

    public function index($data)
    {
        $data['searchTitle'] = isset($data['title']) ? $data['title'] : '';

        $data['allCategories'] = Category::all();
        $data['allTags'] = Tag::all();
        $data['filter'] = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $data['posts'] = Post::filter($data['filter'])->orderBy('id', 'desc')->paginate(20);

        return $data;
    }

    public function store($data)
    {

        try {
            DB::beginTransaction();
            
            $previewImage = Image::make($data['image_preview']);
            $data['image_preview'] = $data['image_preview']->getClientOriginalname();
            $previewImage
            ->fit(560, 300)
            ->save(storage_path('app\public\image\\' . $data['image_preview']));
            
            
            $data['image'] = Storage::disk('imgPath')->put('/', $data['image']);
            
            
            $data['category_id'] = $data['category'];
            unset($data['category']);
            if (isset($data['tags'])) {
                $tagsIds = $data['tags'];
                unset($data['tags']);
            }
            
            $post = Post::firstOrCreate($data);
            if (isset($tagsIds)) {
                $post->tags()->attach($tagsIds);
            }
            DB::commit();
        } catch (Throwable $th) {

            Storage::disk('imgPath')->delete('/',  $data['image']);
            Storage::disk('imgPath')->delete('/',  $data['image_preview']);
            DB::rollBack();

            $validator = Validator::make(
                ["post_create_error" => null],
                ["post_create_error" => "array"],
                ["post_create_error.array" => "Unknown error, please try again"]
            );
            $validator->validated();
        }
    }

    public function update($data, $post)
    {
        try {
            DB::beginTransaction();

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('imgPath')->put('/', $data['image']);
            }
            if (isset($data['image_preview'])) {
                $previewImage = Image::make($data['image_preview']);

                $data['image_preview'] = $data['image_preview']->getClientOriginalname();

                $previewImage
                    ->fit(560, 300)
                    ->save(storage_path('app\public\image\\' . $data['image_preview']));
            }
            $data['category_id'] = $data['category'];
            unset($data['category']);
            if (isset($data['tags'])) {
                $tagsIds = $data['tags'];
                unset($data['tags']);
            }
            $post->update($data);
            if (isset($tagsIds)) {
                $post->tags()->sync($tagsIds);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            //djnjel te che??
            if (isset($data['image']) && !empty($data['image'])) {
                Storage::disk('imgPath')->delete('/',  $data['image']);
            }
            //djnjel te che??
            if (isset($data['image_preview']) && !empty($data['image_preview'])) {
                Storage::disk('imgPath')->delete('/',  $data['image_preview']);
            }

            $validator = Validator::make(
                ["post_create_error" => null],
                ["post_create_error" => "array"],
                ["post_create_error.array" => "Cann't update, please try again"]
            );
            $validator->validated();
        }

        return $post;
    }
}
