<?php

namespace App\Services\Admin\Rate;

use App\Models\Rate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class Service
{
    public function store($data)
    {
        try {
            $currencyRate = $this->getCurrencyRate($data["currency"]);
            $data['exchange_rate'] = $currencyRate[$data["currency"]];
            Rate::Create($data);

        } catch (\Throwable $th) {
            $validator = Validator::make(
                ["currency_exists" => $currencyRate],
                ["currency_exists" => "array"],
                ["currency_exists.array" => "The currency " . '"' . $data["currency"] . '"' . " doesn't exist"]
            );

            $validator->validated();
        }
    }

    public function updateRateData()
    {
        try {
            $apiData = $this->getRateList();
            $rates = Rate::all();
            foreach ($rates as $item) {
                $currencyShort = $item->currency;
                if (isset($apiData->$currencyShort)) {
                    Rate::where('currency', $currencyShort)->update(['exchange_rate' => $apiData->$currencyShort]);
                    //$item->exchange_rate = $apiData->$currencyShort; $item->update();
                }
            }
        } catch (\Throwable $th) {
            $validator = Validator::make(
                ["rate_erroe_update" => null],
                ["rate_erroe_update" => "array"],
                ["rate_erroe_update.array" => "Cann't update!"]
            );
            $validator->validated();
        }
    }

    public function getRateList()
    {
        $response = Http::get('https://cb.am/latest.json.php');
        $data = json_decode($response->body());
        return $data;
    }

    public function getCurrencyRate($currency)
    {
        $currency = mb_strtoupper($currency);
        $response = Http::get('https://cb.am/latest.json.php', [
            'currency' => $currency,
        ]);

        $data = json_decode($response->body(), true);
        return $data;
    }
}
