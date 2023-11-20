<?php

namespace App\Http\Controllers\Personal\Main;

use App\Services\Personal\Main\Service;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function __construct(protected Service $service)
    {
    }

    public function index()
    {
        $data = $this->service->index();

        return view('personal.main.index', compact('data'));
    }
}
