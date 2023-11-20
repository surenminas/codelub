<?php

namespace App\Http\Controllers\Contact;


use App\Services\Mail\Service;
use App\Jobs\StoreContactMailJob;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Contact\StoreRequest;

class ContactController extends BaseController
{
    public function __construct(protected Service $service)
    {
    }

    public function index()
    {

        return view('contact.index');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        StoreContactMailJob::dispatch($data);
        // $this->service->sendContactMailProd($data);
        return redirect()->back()->with(['success' => 'Contact Form Submit Successfully']);
    }
}
