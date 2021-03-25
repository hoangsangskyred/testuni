<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Service;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show()
    {
        $needle = Article::where('show','Y')->latest()->paginate(10);

        $projectCategories = ProjectCategory::where('show','Y')->orderBy('display_name','asc')->get();

        $articleCategorise = ArticleCategory::where('show','Y')->orderBy('display_name','asc')->get();

        return view('web.articles.show',compact(['needle','projectCategories','articleCategorise']));
    }

    public function category($slug, $blogs)
    {
        $articleCategory = ArticleCategory::where('slug',$slug)->whereShow('Y')->first();

        if($articleCategory==null)
        {
            return abort(404);
        }

        $needle = $articleCategory->articles()->where('show','Y')->latest()->paginate(6);
        
        $otherArticleCategories = ArticleCategory::where('id', '<>', $articleCategory->id)->whereShow('Y')->get();
       
        return view('web.articles.all', compact('needle','articleCategory','otherArticleCategories'));
    }

    public function detail($slug, $blog)
    {
        $needle = Article::where('slug', $slug)->where('show','Y')->first();

        if($needle==null)
        {
            return abort(404);
        }

        $articleCategories = ArticleCategory::where('id','<>',$needle->article_category_id)->where('show','Y')->get();

        $articleRelation =  Article::where('article_category_id',$needle->article_category_id)->where('slug','<>',$needle->slug)->where('show','Y')->get();

        return view('web.articles.detail',compact(['needle','articleCategories','articleRelation']));
    }
 
}
