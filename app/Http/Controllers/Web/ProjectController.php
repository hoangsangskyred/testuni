<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
class ProjectController extends Controller
{
    public function detail($slug)
    {
        $needle = Project::whereSlug($slug)->whereShow('Y')->first();
        
        $otherProjects = Project::where('id','<>',$needle->id)->whereShow('Y')->limit(10)->get();
        
        return view('web.project.detail', compact('needle', 'otherProjects'));
    }
}
