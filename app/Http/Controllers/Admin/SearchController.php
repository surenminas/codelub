<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\Admin\SearchRequest;

class SearchController extends Controller
{
    public function search(SearchRequest $request)
    {
        $data = $request->validated();


        // $posts = Post::search($data['s'])
        //     ->paginate(10);



        // $posts = Post::query()
        //     ->select(['id', 'title', 'content'])
        //     ->when($data['s'], function (Builder $query) {
        //         $query->whereFullText(['title','content'], request('s'));
        //     })
        //     ->get();


        // $posts = DB::select(
        //     'select posts.*,
        // MATCH(posts.title, posts.content) AGAINST( ? IN BOOLEAN MODE) as relevanceScore
        //  from posts where MATCH(posts.title, posts.content) AGAINST( ? IN BOOLEAN MODE)
        //  order by relevanceScore DESC',
        //     [$data['s'], $data['s']]
        // );


        $posts = $this->paginateArray(
            DB::select(
                'select posts.*,
            MATCH(posts.title, posts.content) AGAINST( ? IN BOOLEAN MODE) as relevanceScore
             from posts where MATCH(posts.title, posts.content) AGAINST( ? IN BOOLEAN MODE)
             order by relevanceScore DESC',
                [$data['s'], $data['s']]
            )
        );

        return view('admin.search.index', compact('posts'));
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
