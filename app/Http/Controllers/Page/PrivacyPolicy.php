<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;

class PrivacyPolicy extends Controller
{
    public function index()
    {
        $pp = \App\Models\Services\PrivacyPolicy::where('publish', 1)->orderBy('created_at','desc')->first();
        $content=[
            "page-title"=>$this->contentjson()["page-product"]["title-page"],
            "page-keywords"=>$this->contentjson()["page-product"]["keywords-seo"],
            "page-description"=>$this->contentjson()["page-product"]["description-seo"],
            "header"=>$this->header(),
            "footer"=>$this->footer(),
            "jumbotron"=>$this->contentjson()["page-product"]["jumbotron"]
        ];
        return view("privacyPolicy", compact("content", "pp"));
    }
}
