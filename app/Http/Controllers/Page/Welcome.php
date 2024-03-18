<?php

namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;
use App\Models\Services\Product;

class Welcome extends Controller
{
    public function index()
    {
        $products = Product::all();
        $content=[
            "page-title"=>$this->contentjson()["page-index"]["title-page"],
            "page-keywords"=>$this->contentjson()["page-index"]["keywords-seo"],
            "page-description"=>$this->contentjson()["page-index"]["description-seo"],
            "header"=>$this->header(),
            "footer"=>$this->footer(),
            "jumbotron"=>$this->contentjson()["page-index"]["jumbotron"],
            "content-client-top"=>$this->contentjson()["page-index"]["content-client-top"],
            "container-content-first"=>$this->contentjson()["page-index"]["container-content-first"],
            "container-content-second"=>$this->contentjson()["page-index"]["container-content-second"],
            "container-content-thirth"=>$this->contentjson()["page-index"]["container-content-thirth"],
            "container-content-fourth"=>$this->contentjson()["page-index"]["container-content-fourth"]
        ];
        return view("welcome", compact('content', 'products'));
    }
}
