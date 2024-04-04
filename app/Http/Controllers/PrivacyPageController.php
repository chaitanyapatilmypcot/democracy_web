<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class PrivacyPageController extends Controller
{

    public function fetchPrivacy()
    {
        /**
         * @param  
         *
         *
         * @return List of Privacy Policy and view page
         */
        $api_url =Config::get('global.api_url');
        $uuid = Config::get('global.uuid');
        $platform = Config::get('global.platform');
        $response = Http::withBasicAuth('admin', 'mypcot')
            ->withHeaders([
                'UUID' => $uuid,
                'Platform' => $platform
            ])
            ->post( $api_url .'policies', [
                'type' => 'policy'
            ])
            ->json();
        if ($response) {
            $data = $response;
            $privacyContent = $data['data']['result']['content'];
            $tags = config('global.meta_tags')['privacy_policy'];


            return view('frontend.privacyPolicy.privacy', ['privacyContent' => $privacyContent, 'tags' => $tags]);
        } else {
            return back()->with('error', 'Failed to fetch privacy policy.');
        }
    }
}

