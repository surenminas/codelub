<?php

namespace App\Http\Controllers\Admin\Rate;

use App\Models\Rate;
use App\Services\Admin\Rate\Service;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\Admin\Rate\StoreRequest;
use App\Http\Requests\Admin\Rate\UpdateRequest;

class RateController extends BaseController
{
    public function __construct(protected Service $service)
    {
    }

    public function index()
    {
        $rates = Rate::all();
        
        return view('admin.rates.index', compact('rates'));
    }

    public function create()
    {
        return view('admin.rates.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('admin.rates.index');
    }

    public function edit(Rate $rate)
    {
        return view('admin.rates.edit', compact('rate'));
    }

    public function update(UpdateRequest $request, Rate $rate)
    {
        $data = $request->validated();
        $rate->update($data);

        return redirect()->route('admin.rates.index');
    }

    public function destroy(Rate $rate)
    {
        $this->authorize('deleteAnyInfomation', auth()->user());
        $rate->delete();

        return redirect()->route('admin.rates.index');
    }

    public function updateRateData()
    {
        $this->service->updateRateData();
        
        return redirect()->route('admin.rates.index',['messageRateUpdated'=> 'Updated'])->with('messageRateUpdated', 'Updated!');
    }
}
