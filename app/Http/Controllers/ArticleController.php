<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */


    public function index($slug)
    {
        $article = Article::where('slug',$slug)->first();

        // if article Not Found
        if( !$article ){
            return redirect('/');
        }

        return view( $article->type ,compact("article"));
    }


}
