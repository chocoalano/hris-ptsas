<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;
use App\Models\Blog\PostTag;
use Illuminate\Http\Request;

class Article extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $newarticles = Post::with('category', 'tags')->whereNotNull('cover')->latest('id')->first();
        $tags = PostTag::orderBy("created_at","desc")->get();
        if($request->input('search')){
            $search = $request->input('search');
            $articles = Post::with('category', 'tags')->where(function($q) use ($search){
                $q
                ->where('keywords', 'like', "%".$search."%")
                ->orWhere('title', 'like', "%".$search."%")
                ->orWhere('slug', 'like', "%".$search."%")
                ->orWhere('description', 'like', "%".$search."%")
                ->orWhere('content', 'like', "%".$search."%");
            })->orWhereHas('category', function($q) use ($search) {
                $q->where('name', 'like', "%".$search."%");
            })->orWhereHas('tags', function($q) use ($search) {
                $q->where('name', 'like', "%".$search."%");
            })->orderBy("created_at","desc")->paginate(10);
        }else{
            $articles = Post::with('category', 'tags')->orderBy("created_at","desc")->paginate(10);
        }
        $content=[
            "page-title"=>$this->contentjson()["page-article"]["title-page"],
            "page-keywords"=>$this->contentjson()["page-article"]["keywords-seo"],
            "page-description"=>$this->contentjson()["page-article"]["description-seo"],
            "header"=>$this->header(),
            "footer"=>$this->footer(),
            "jumbotron"=>$this->contentjson()["page-article"]["jumbotron"]
        ];
        return view("article", compact('content', 'tags', 'newarticles', 'articles'));
    }
    public function show(string $id)
    {
        $articleDetail = Post::where('slug', $id)->first();
        $articleRelated = Post::with('category','tags')
        ->where('id', '!=', $articleDetail->id)
        ->whereHas('category', function($q) use ($articleDetail) {
            $q->where('id', $articleDetail->category_id);
        })
        ->orderBy('created_at','desc')
        ->paginate(10);
        $content=[
            "header"=>$this->header(),
            "footer"=>$this->footer(),
            "article"=>$articleDetail,
            "articleRelated"=>$articleRelated,
        ];
        return view("article_detail", compact('content'));
    }
}
