<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use App\Models\Project;
use App\Models\ArticleCategory;

class ProjectController extends Controller
{
    public function show()
    {
        $needle = Project::where('show','Y')->latest()->paginate(10);

        $projectCategories = ProjectCategory::where('show','Y')->orderBy('display_name','asc')->get();

        $articleCategorise = ArticleCategory::where('show','Y')->orderBy('display_name','asc')->get();

        return view('web.projects.show',compact(['needle','projectCategories','articleCategorise']));
    }

    public function category($slug, $projects)
    {
        $projectCategory = ProjectCategory::where('slug',$slug)->where('show','Y')->first();

        if($projectCategory==null)
        {
            return abort(404);
        }
        
        $needle = $projectCategory->projects()->latest()->where('show','Y')->paginate(6);

        $otherProjectCategories = ProjectCategory::where('id','<>',$projectCategory->id)->where('show','Y')->get();
        
        return view('web.projects.all', compact(['needle','projectCategory','otherProjectCategories']));
    }

    public function detail($slug, $project)
    {
        $needle = Project::where('slug',$slug)->whereShow('Y')->first();

        if ($needle==null)
        {
            return abort(404);
        }
        $projectImages = glob( public_path(str_replace('/public','',$needle->folder_path)) . '/*.jpg');

        $projectCategories = ProjectCategory::where('id','<>',$needle->project_category_id)->where('show','Y')->get();

        $projectRelation = Project::where('project_category_id',$needle->project_category_id)->where('slug','<>',$needle->slug)->where('show','Y')->get();

        return view('web.projects.detail',compact(['needle','projectImages','projectRelation','projectCategories']));
    }
}
