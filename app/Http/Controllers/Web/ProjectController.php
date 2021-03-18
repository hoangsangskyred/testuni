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

        $projectCategory = ProjectCategory::where('slug',$slug)->first();

        if($projectCategory==null)
        {
            return abort(404);
        }
        $needle = Project::with('category')->where('project_category_id',$projectCategory->id)->whereShow('Y')->paginate(6);
        
        $articleCategories = ProjectCategory::where('id','<>',$projectCategory->id)->whereShow('Y')->get();
    
        return view('web.projects.all', compact('needle','projectCategory','articleCategories'));
    }

    public function detail($slug)
    {


    }
}
