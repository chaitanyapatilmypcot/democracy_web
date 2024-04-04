<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class TermsPageController extends Controller
{
    
    public function fetchTerms()
    {
        /**
         * @param  
         *
         *
         * @return List of Terms and view page
         */
        $api_url =Config::get('global.api_url');
        $uuid = Config::get('global.uuid');
        $platform = Config::get('global.platform');
        $response = Http::withBasicAuth('admin', 'mypcot')
            ->withHeaders([
                'UUID' => $uuid,
                'Platform' => $platform
            ])
            ->post( $api_url . 'policies', [
                'type' => 'terms'
            ])
            ->json();
        if ($response) {
            $data = $response;
            $termsContent = $data['data']['result']['content'];
            $tags = config('global.meta_tags')['terms_conditions'];

            return view('frontend.termsConditions.terms', ['termsContent' => $termsContent, 'tags' => $tags]);
        }

        return back()->with('error', 'Failed to fetch terms and conditions.');
    }
}

