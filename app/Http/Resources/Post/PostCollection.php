<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed >
     */
    public function toArray(Request $request): mixed
    {
        // return parent::toArray($request);

        return $this->collection->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
            ];
        });

    }
}
