<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ContactUsController extends Controller
{
    function index()
    {
        $data['tags'] = config('global.meta_tags')['contact'];


        $uuid = '134657985';
        $platform = 'web';
        $response = Http::withBasicAuth('admin', 'mypcot')
            ->withHeaders(['UUID' => $uuid, 'Platform' => $platform])
            ->post('http://skyonliners.com/demo/democracy-apis/webservices/v1/contact/show')
            ->json();
        $data['contact'] = $response['data']['result'];
        return view("frontend/contact/index", $data);
    }

    public function storeContactForm(Request $request)
    {
        $validateData = $request->validate([
            "name" => "required|string|max:255",
            "phone" => "required|min:10|max:10",
            "message" => "nullable|max:255",
        ]);

        $body = [
            "name" => $validateData['name'],
            "phone" => $validateData['phone'],
            "message" => $validateData['message']
        ];

        $uuid = '134657985';
        $platform = 'web';

       
        $response = Http::withBasicAuth('admin', 'mypcot')
            ->withHeaders(['UUID' => $uuid, 'Platform' => $platform])
            ->post('http://skyonliners.com/demo/democracy-apis/webservices/v1/contact/create', $body)
            ->json();

        if ($response) {

            return redirect('contact')->with('success', 'Form submitted successfully!');
        } else {

            return redirect()->with('error', 'Error submitting form');
        }
    }
}
