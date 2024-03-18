<?php

namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUs extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $content=[
            "page-title"=>$this->contentjson()["page-about"]["title-page"],
            "page-keywords"=>$this->contentjson()["page-about"]["keywords-seo"],
            "page-description"=>$this->contentjson()["page-about"]["description-seo"],
            "header"=>$this->header(),
            "footer"=>$this->footer(),
            "gallery"=>$this->contentjson()["page-about"]["gallery"],
            "feature"=>$this->contentjson()["page-about"]["feature"],
            "info"=>$this->contentjson()["page-about"]["info"]
        ];
        return view("about", compact('content'));
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
