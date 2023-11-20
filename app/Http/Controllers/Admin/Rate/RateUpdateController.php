<?php

namespace App\Http\Controllers\Admin\Rate;

use Illuminate\Support\Facades\Http;
use App\Services\Admin\Rate\Service;

use App\Http\Controllers\Admin\BaseController;

class RateUpdateController extends BaseController
{
    protected $service;

    public function __construct()
    {
        $this->service = new Service();
    }

    public function __invoke()
    {
        $ratesList = $this->getRateList();

        $this->service->updateRateData($ratesList);
    }


    public function getRateList()
    {
        $response = Http::get('https://cb.am/latest.json.php');
        $data = json_decode($response->body());
        return $data;
    }
}
