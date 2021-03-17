<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Service;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function category($slug)
    {
        $articleCatory = ArticleCategory::where('slug',$slug)->whereShow('Y')->first();

        if($articleCatory==null)
        {
            return abort(404);
        }
        $needle = Article::with('category')->where('article_category_id',$articleCatory->id)->whereShow('Y')->paginate(6);
        
        $articleCatories = Article::with('category')->whereShow('Y')->get();

    /*$otherArticles = Article::with('category')->where('article_category_id','<>',$needle->id)->whereShow('Y')->limit(10)->get();*/
    
        return view('web.articles.all', compact('needle','articleCatory','articleCatories'));

    }
 
}
