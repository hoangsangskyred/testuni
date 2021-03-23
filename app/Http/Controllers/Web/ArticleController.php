<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Service;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function category($slug, $blogs)
    {
        $articleCatory = ArticleCategory::where('slug',$slug)->whereShow('Y')->first();

        if($articleCatory==null)
        {
            return abort(404);
        }

        $needle = $articleCatory->articles()->latest()->paginate(6);
        
        $otherArticleCategories = ArticleCategory::where('id', '<>', $articleCatory->id)->whereShow('Y')->get();
       
        return view('web.articles.all', compact('needle','articleCatory','otherArticleCategories'));
    }

    public function detail($slug, $blog)
    {
        $articleCategories = ArticleCategory::all();
        
        $article = Article::where('slug',$slug)->whereShow('Y')->first();

        $needle = Article::with('category')->whereSlug($slug)->whereShow('Y')->first();
        
        $articleRelation = Article::with('category')->where('article_category_id',$needle->article_category_id)->where('slug','<>',$needle->slug)->where('show','Y')->get();

        return view('web.articles.detail',compact(['article','needle','articleCategories','articleRelation']));
    }
 
}
