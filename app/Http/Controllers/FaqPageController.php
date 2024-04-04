<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;


class FaqPageController extends Controller
{
    /**
     * @param  
     *
     *
     * @return List of Faqs and view page
     */
    public function fetchFaqs() {
        $api_url = Config::get('global.api_url');
        $uuid = Config::get('global.uuid');
        $platform = Config::get('global.platform');
        $response = Http::withBasicAuth('admin', 'mypcot')
            ->withHeaders([
                'UUID' => $uuid,
                'Platform' => $platform
            ])
            ->post($api_url . 'faqs/list')
            ->json();

            if($response) {
                $data = $response;
                $faqContent = $data['data']['result'];
                $tags = config('global.meta_tags')['faq'];


                return view('frontend.faq.index', ['faqContent' => $faqContent, 'tags' => $tags]);
            }

        return back()->with('error', 'Failed to fetch Faqs');
    }
}
