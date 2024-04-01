<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function fetchHome(Request $request) {
        $uuid = '123456789';
        $platform = 'web';
        $response = Http::withBasicAuth('admin', 'mypcot')
            ->withHeaders([
                'UUID' => $uuid,
                'Platform' => $platform
            ])
            ->post('http://skyonliners.com/demo/democracy-apis/webservices/v1/faqs/list', [
                "page" => "1",
                "paginate" => "3",
                "order_by"=> "pages",
                "sort_by"=> "desc"
            ])
            ->json();

            if($response) {
                $data = $response;
                $faqContent = $data['data']['result'];
                $tags = config('global.meta_tags')['home'];


                return view('frontend.home.index', ['faqContent' => $faqContent, 'tags' => $tags]);
            }else {
                return back()->with('error', 'Failed to fetch Faqs');
            }
    }

}
