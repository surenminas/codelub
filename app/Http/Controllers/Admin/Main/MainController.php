<?php

namespace App\Http\Controllers\Admin\Main;

use App\Services\Admin\Main\Service;
use App\Http\Controllers\Admin\BaseController;

class MainController extends BaseController
{
    public function __construct(protected Service $service)
    {
    }
    public function index()
    {
        $data = $this->service->index();

        return view('admin.main.index', compact('data'));
    }
}
