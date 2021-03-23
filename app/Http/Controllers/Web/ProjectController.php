<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use App\Models\Project;

class ProjectController extends Controller
{
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
         $project = Project::where('slug',$slug)->whereShow('Y')->first();

         $needle = Project::with('category')->whereSlug($slug)->whereShow('Y')->first();

        if ($needle==null)
        {
            return abort(404);
        }
        $projectImages = glob( public_path(str_replace('/public','',$project->folder_path)) . '/*.jpg');

        $projectRelation = Project::with('category')->where('project_category_id',$needle->project_category_id)->where('slug','<>',$needle->slug)->where('show','Y')->get();

        $projectCategories = ProjectCategory::where('id','<>',$project->project_category_id)->whereShow('Y')->get();

        return view('web.projects.detail',compact(['project','needle','projectImages','projectRelation','projectCategories']));
    }
}
