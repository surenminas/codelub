<?php

namespace App\Services\Personal\Like;


class Service
{
    public function destroy($post)
    {
        $data = [];

        if (auth()->user()->likedPosts()->detach($post->id)) {
            $data['checkLikeCount'] = auth()->user()->likedPosts()->first();
        } else {
            $data["likeDelete"] = 404;
        }

        return $data;
    }
}
