<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ProjectCategory;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function all()
    {
        $needle = Service::whereShow('Y')->latest()->get();

        $projectCategories = ProjectCategory::where('show','Y')->orderBy('display_name','asc')->get();

        $articleCategorise = ArticleCategory::where('show','Y')->orderBy('display_name','asc')->get();

        return view('web.services.all', compact(['needle','projectCategories','articleCategorise']));
    }

    public function show($slug, $service_prefix)
    {
        $needle = Service::whereSlug($slug)->whereShow('Y')->first();

        if( $needle==null)
        {
            return abort(404);
        }

        $otherServices = Service::where('id','<>',$needle->id)->whereShow('Y')->get();
        
        return view('web.services.detail', compact('needle', 'otherServices'));
    }

}
