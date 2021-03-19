<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use App\Models\Project;

class ProjectController extends Controller
{
    public function category($slug)
    {

        $projectCategory = ProjectCategory::where('slug',$slug)->whereShow('Y')->first();

        if($projectCategory==null)
        {
            return abort(404);
        }
        $needle = Project::with('category')->where('project_category_id',$projectCategory->id)->whereShow('Y')->get();

        $projectCategories = ProjectCategory::where('id','<>',$projectCategory->id)->whereShow('Y')->get();
        
        return view('web.projects.all', compact('needle','projectCategory','projectCategories'));
    }

    public function detail($slug)
    {
         // $fileImageSmall = glob( public_path(str_replace('/public', '', $needleImage->folder_path)) . '/*.jpg');
         $project = Project::where('slug',$slug)->whereShow('Y')->first();

         $needle = Project::with('category')->whereSlug($slug)->whereShow('Y')->first();
         if($needle==null)
         {
            return abort('404');
         }
        
        $projectImages = glob( public_path(str_replace('/public','',$project->folder_path)) . '/*.jpg');
        
         return view('web.projects.detail',compact(['project','needle','projectImages']));
    }
}
