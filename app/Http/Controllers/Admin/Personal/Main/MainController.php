<?php

namespace App\Http\Controllers\Admin\Personal\Main;

use App\Http\Controllers\Controller;
use App\Services\Admin\Personal\Main\Service;

class MainController extends Controller
{
    public function __construct(protected Service $service)
    {
    }


    public function index()
    {
        $data = $this->service->index();

        return view('admin.personal.main.index', compact('data'));
    }
}
