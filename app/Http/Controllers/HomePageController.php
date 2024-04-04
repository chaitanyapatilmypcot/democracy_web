<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


class HomePageController extends Controller
{
    /**
     * @param  
     *
     *
     * @return List of Faqs and view page
     */
    public function fetchHomeFaq() {
        $api_url = Config::get('global.api_url');
        $uuid = Config::get('global.uuid');
        $platform = Config::get('global.platform');
        $response = Http::withBasicAuth('admin', 'mypcot')
            ->withHeaders([
                'UUID' => $uuid,
                'Platform' => $platform
            ])
            ->post($api_url . 'faqs/list', [
                "page" => "1",
                "paginate" => "3",
                "order_by"=> "pages",
                "sort_by"=> "desc"
            ])
            ->json();

            if($response) {
                $data = $response;
                $faqContent = $data['data']['result'] ??[];
                $tags = config('global.meta_tags')['home'];
                
                return view('frontend.home.index', ['faqContent' => $faqContent, 'tags' => $tags]);
            }

        return back()->with('error', 'Failed to fetch Faqs');
    }

}
