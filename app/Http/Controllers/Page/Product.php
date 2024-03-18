<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Product extends Controller
{
    public function index(Request $request)
    {
        $category = \App\Models\Services\Product::select('category')->distinct()->get();
        if($request->input('search')){
            $search = $request->input('search');
            $product = \App\Models\Services\Product::where(function($q)use($search){
                $q
                ->where('slug','like','%'.$search.'%')
                ->orWhere('category','like','%'.$search.'%')
                ->orWhere('title','like','%'.$search.'%')
                ->orWhere('description','like','%'.$search.'%');
            })->latest()->paginate(10);
        }else{
            $product = \App\Models\Services\Product::latest()->paginate(10);
        }
        $content=[
            "page-title"=>$this->contentjson()["page-product"]["title-page"],
            "page-keywords"=>$this->contentjson()["page-product"]["keywords-seo"],
            "page-description"=>$this->contentjson()["page-product"]["description-seo"],
            "header"=>$this->header(),
            "footer"=>$this->footer(),
            "jumbotron"=>$this->contentjson()["page-product"]["jumbotron"]
        ];
        return view("product", compact("content", "product", "category"));
    }
    public function show(string $slug)
    {
        $product = \App\Models\Services\Product::where("slug", $slug)->first();
        $productRelated = \App\Models\Services\Product::where("category", $product->category)->latest()->paginate(10);
        $content=[
            "header"=>$this->header(),
            "footer"=>$this->footer(),
        ];
        return view("product_detail", compact("content", "product", "productRelated"));
    }
}
