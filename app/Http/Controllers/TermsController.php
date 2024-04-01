<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TermsController extends Controller
{

    public function fetchAndDisplayTerms(Request $request)
    {
        $uuid = '134657985';
        $platform = 'web';
        $response = Http::withBasicAuth('admin', 'mypcot')
            ->withHeaders([
                'UUID' => $uuid,
                'Platform' => $platform
            ])
            ->post('https://skyonliners.com/demo/democracy-apis/webservices/v1/policies', [
                'type' => 'terms'
            ])
            ->json();
        if ($response) {
            $data = $response;
            $termsContent = $data['data']['result']['content'];
            $tags = config('global.meta_tags')['terms_conditions'];
            // echo "<pre>";
            // print_r($termsContent);exit;

            return view('frontend.terms', ['termsContent' => $termsContent, 'tags' => $tags]);
        } else {

            return back()->with('error', 'Failed to fetch terms and conditions.');
        }
    }
}

