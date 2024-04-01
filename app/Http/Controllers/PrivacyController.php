<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PrivacyController extends Controller
{

    public function fetchPrivacy(Request $request)
    {

        $uuid = '134657985';
        $platform = 'web';
        $response = Http::withBasicAuth('admin', 'mypcot')
            ->withHeaders([
                'UUID' => $uuid,
                'Platform' => $platform
            ])
            ->post('http://skyonliners.com/demo/democracy-apis/webservices/v1/policies', [
                'type' => 'policy'
            ])
            ->json();
            // print_r($response);exit;

        if ($response) {
            $data = $response;
            $privacyContent = $data['data']['result']['content'];
            $tags = config('global.meta_tags')['privacy_policy'];


            return view('frontend.privacy', ['privacyContent' => $privacyContent, 'tags' => $tags]);
        } else {
            return back()->with('error', 'Failed to fetch privacy policy.');
        }
    }
}

