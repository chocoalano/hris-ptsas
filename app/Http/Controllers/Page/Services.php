<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Services\Product;
use App\Models\Services\Superiority;
use Illuminate\Http\Request;

class Services extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $superiority = Superiority::all();
        $product = Product::all();
        $content=[
            "page-title"=>$this->contentjson()["page-services"]["title-page"],
            "page-keywords"=>$this->contentjson()["page-services"]["keywords-seo"],
            "page-description"=>$this->contentjson()["page-services"]["description-seo"],
            "header"=>$this->header(),
            "footer"=>$this->footer(),
            "gallery"=>$this->contentjson()["page-services"]["gallery"],
            "icon-blocks"=>$this->contentjson()["page-services"]["icon-blocks"],
            "clients"=>$this->contentjson()["page-services"]["clients"],
        ];
        return view("services", compact('content','product','superiority'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
