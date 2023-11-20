<?php

namespace App\Services\Search;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class Service
{
    public function Search($data)
    {
            $posts = $this->paginateArray(
                DB::select(
                    'select posts.*, categories.title as category_name, MATCH(posts.title, posts.content) AGAINST( ? IN BOOLEAN MODE) as relevanceScore
                     FROM posts 
                     LEFT JOIN `categories` ON posts.category_id = categories.id
		     
                     WHERE MATCH(posts.title, posts.content) AGAINST( ? IN BOOLEAN MODE)
                     ORDER BY relevanceScore DESC',
                    [$data['s'], $data['s']]
                )
            );

            if (empty($posts->items())) {
                $posts = 'no_result';
            }

            $data['posts'] = $posts;

            return $data;




        // $posts = DB::select(
        //     'select posts.*, categories.title as category_name,
        //         MATCH(posts.title, posts.content) AGAINST( ? IN BOOLEAN MODE) as relevanceScore
        //          from posts 
        //          LEFT JOIN `categories` ON posts.category_id = categories.id
        //          where MATCH(posts.title, posts.content) AGAINST( ? IN BOOLEAN MODE)
        //          order by relevanceScore DESC',
        //     [$data['s'], $data['s']]
        // );


        // $postLikesCount = [];

        // foreach ($posts as $key => $value) {
        //     $postLikesCount[] = DB::table('post_user_likes')
        //         ->where('post_id', '=', $value->id)
        //         ->count();
        // }

        // dd($postLikesCount);

    }

    public function paginateArray($data, $perPage = 10)
    {
        $page = Paginator::resolveCurrentPage();
        $total = count($data);
        $results = array_slice($data, ($page - 1) * $perPage, $perPage);

        return new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
        ]);
    }
}
