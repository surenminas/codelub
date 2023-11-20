<?php

namespace App\Services\Personal\Comment;

use Illuminate\Support\Facades\DB;



class Service
{
    public function destroy($comment)
    {
        if (DB::table('comments')->where(
    [
                ['user_id', '=', auth()->user()->id],
                ['post_id', '=', $comment->post_id],
            ]
        )->doesntExist()) {
            abort(404);
        };
        $comment->delete();
    }
}
