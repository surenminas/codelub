<?php

namespace App\Services\Admin\Gallery;

use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class Service
{

    public function store($data)
    {
        try {
            DB::beginTransaction();

            $data['img_path'] = $data['image'];
            unset($data['image']);
            $data['album_id'] = $data['album'];
            unset($data['album']);
            $data['img_path'] = Storage::disk('imgPath')->put('/', $data['img_path']);
            Gallery::create($data);

            DB::commit();
        } catch (\Throwable $th) {
            Storage::disk('imgPath')->delete('/',  $data['img_path']);
            DB::rollBack();

            $validator = Validator::make(
                ["gallery_create_error" => null],
                ["gallery_create_error" => "array"],
                ["gallery_create_error.array" => "Cann't update, please try again"]
            );
            $validator->validated();
        }
    }

    public function update($data, $gallery)
    {
        try {
            DB::beginTransaction();
            if (isset($data['image'])) {
                $data['img_path'] = $data['image'];
                unset($data['image']);
                $data['img_path'] = Storage::disk('imgPath')->put('/', $data['img_path']);
            }
            $data['album_id'] = $data['album'];
            unset($data['album']);

            $gallery->update($data);
            DB::commit();
        } catch (\Throwable $th) {
            Storage::disk('imgPath')->delete('/',  $data['img_path']);
            DB::rollBack();
            $validator = Validator::make(
                ["gallery_update_error" => null],
                ["gallery_update_error" => "array"],
                ["gallery_update_error.array" => "Cann't update, please try again"]
            );
            $validator->validated();
        }
    }
}
