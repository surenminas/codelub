<?php

namespace App\Http\Controllers\Search;


use App\Services\Search\Service;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Search\SearchRequest;

class SearchController extends BaseController
{
    public function __construct(protected Service $service)
    {
    }

    public function index(SearchRequest $request)
    {
        $data = $request->validated();
        $searchData = $this->service->Search($data);

        return view('search.index', compact('searchData'));


    }
}
