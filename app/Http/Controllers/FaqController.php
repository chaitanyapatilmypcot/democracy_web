<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FaqController extends Controller
{
    public function fetchFaq(Request $request) {
        $uuid = '123456789';
        $platform = 'web';
        $response = Http::withBasicAuth('admin', 'mypcot')
            ->withHeaders([
                'UUID' => $uuid,
                'Platform' => $platform
            ])
            ->post('http://skyonliners.com/demo/democracy-apis/webservices/v1/faqs/list', [
                "page" => "1",
                "paginate" => "10",
                "order_by"=> "pages",
                "sort_by"=> "desc"
            ])
            ->json();

            if($response) {
                $data = $response;
                $faqContent = $data['data']['result'];
                $tags = config('global.meta_tags')['faq'];


                return view('frontend.faq.index', ['faqContent' => $faqContent, 'tags' => $tags]);
            }else {
                return back()->with('error', 'Failed to fetch Faqs');
            }
    }
}
