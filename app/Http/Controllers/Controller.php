<?php

namespace App\Http\Controllers;

use App\Models\Blog\Post;
use App\Models\Services\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function contentjson(){
        $json_string = file_get_contents('../page-content.json');
        $json_array = json_decode($json_string, true);
        return $json_array;
    }
    public function header(){
        return [
            "main-menu"=>[
                [
                    "name"=>"Home",
                    "link"=>route('home.index'),
                ],
                [
                    "name"=>"About Us",
                    "link"=>route('about.index'),
                ],
                [
                    "name"=>"Services",
                    "link"=>route('services.index'),
                ],
                [
                    "name"=>"Article",
                    "link"=>route('article.index'),
                ]
            ]
        ];
    }
    public function footer(){
        $product = Product::select('category', 'slug')->distinct()->limit(5)->get();
        $article = Post::with('category', 'tags')->latest()->limit(5)->get();
        $productLink = [];
        $articleLink = [];
        foreach ($product as $value) {
            array_push($productLink, [
                'name'=> $value->category,
                'link'=> route('product.show', $value->slug),
            ]);
        }
        foreach ($article as $value) {
            array_push($articleLink, [
                'name'=> ucfirst(Str::limit($value->title, 40)),
                'link'=> route('article.show', $value->slug),
            ]);
        }
        return [
            "logo"=>asset($this->contentjson()["config"]["footer"]["logo"]),
            "address"=>$this->contentjson()["config"]["footer"]["address"],
            "phone"=>$this->contentjson()["config"]["footer"]["phone"],
            "menu"=>[
                [
                    "name-group"=>"Company",
                    "child-menu"=>[
                        [ "name"=>"Home", "link"=>route('home.index') ],
                        [ "name"=>"About Us", "link"=>route('about.index') ], 
                        [ "name"=>"Services", "link"=>route('services.index') ],
                        [ "name"=>"Article", "link"=>route('article.index') ]
                    ]
                ],
                [
                    "name-group"=>"Project Products",
                    "child-menu"=>$productLink
                ],
                [
                    "name-group"=>"Articles",
                    "child-menu"=>$articleLink
                ]
            ],
            "footer-three-1"=>[
                ["name"=>"Privacy & Policy","link"=>route('privacy-pilicy')]
            ],
            "footer-three-2"=>$this->contentjson()["config"]["footer"]["sosmed"],
            "footer-three-3"=>[
                "Copyright @".date('Y')." PT. Sinergi Abadi Sentosa all rights reserved.",
                "When you visit or interact with our sites, services or tools, we or our authorised service providers may use cookies for storing information to help provide you with a better, faster and safer experience and for marketing purposes.",
            ]
        ];
    }
}
