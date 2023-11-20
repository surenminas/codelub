<?php

namespace App\Services\Admin\Album;

use App\Models\Album;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Service
{

    public function store($data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['image'])) {

                $coverImage = Image::make($data['image']);
                $data['cover_path'] = $data['image']->getClientOriginalname();
                $coverImage
                    ->fit(420, 220)
                    ->save(storage_path('app\public\image\\' . $data['cover_path']));

                unset($data['image']);

                // $data['cover_path'] = Storage::disk('imgPath')->put('/', $data['cover_path']);
            } else {
                $data['cover_path'] = 'no_photo.jpg';
            }
            Album::create($data);

            DB::commit();
        } catch (\Throwable $th) {
            if (isset($data['cover_path']) ) {
                Storage::disk('imgPath')->delete('/',  $data['cover_path']);
            }
            DB::rollBack();

            $validator = Validator::make(
                ["album_create_error" => null],
                ["album_create_error" => "array"],
                ["album_create_error.array" => "Unknown error, please try again"]
            );
            $validator->validated();
        }
    }

    public function update($data, $album)
    {
        try {
            DB::beginTransaction();

            if (isset($data['image'])) {
                $coverImage = Image::make($data['image']);
                $data['cover_path'] = $data['image']->getClientOriginalname();
                $coverImage
                    ->fit(420, 220)
                    ->save(storage_path('app\public\image\\' . $data['cover_path']));

                unset($data['image']);
            }
            $album->update($data);

            DB::commit();
        } catch (\Throwable $th) {
            Storage::disk('imgPath')->delete('/',  $data['cover_path']);
            DB::rollBack();

            $validator = Validator::make(
                ["album_update_error" => null],
                ["album_update_error" => "array"],
                ["album_update_error.array" => "Cann't update, please try again"]
            );
            $validator->validated();
        }
    }
}
