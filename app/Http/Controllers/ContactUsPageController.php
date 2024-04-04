<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;


class ContactUsPageController extends Controller
{
    /**
     * @param  
     *
     *
     * @return Application|Factory|View|\Illuminate\Http\RedirectResponse
     */
    function index()
    {
        $data['tags'] = config('global.meta_tags')['contact'];

        $api_url = Config::get('global.api_url');
        $uuid = Config::get('global.uuid');
        $platform = Config::get('global.platform');
        
        $response = Http::withBasicAuth('admin', 'mypcot')
            ->withHeaders(['UUID' => $uuid, 'Platform' => $platform])
            ->post($api_url . 'contact/show')
            ->json();
        $data['contact'] = $response['data']['result'];
        
        return view("frontend/contact/index", $data);
    }

    /**
     * @param  ContactUsRequest - for validation
     *
     *
     * @return stores Contact and send successfull response
     */
    public function storeContactForm(ContactUsRequest $request)
    {
        $validateData = $request->all();

        $body = [
            "name" => $validateData['name'],
            "phone" => $validateData['phone'],
            "message" => $validateData['message']
        ];

        $api_url = Config::get('global.api_url');
        $uuid = Config::get('global.uuid');
        $platform = Config::get('global.platform');
        $response = Http::withBasicAuth('admin', 'mypcot')
            ->withHeaders(['UUID' => $uuid, 'Platform' => $platform])
            ->post($api_url . 'contact/create', $body)
            ->json();

        if ($response) {

            return response()->json(['success' => $response],200);
        } else {
            return response()->json(['error' => 'Error submitting form.'], 500);
        }

    }
}
