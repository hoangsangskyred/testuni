<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectImage;
use App\Http\Controllers\Traits\RedirectAfterSubmit;

class ProjectImageController extends Controller
{
    use RedirectAfterSubmit;

    public $name = "admin.projects-image";

    public $view = "admin.projects-image";

    public function search(Request $request)
    {
        $list = ProjectImage::orderBy('created_at','desc')
        ->paginate(10);

        return $list;
    }

    public function index(Request $request)
    {
        $this->setRedirectLink($request);

        return view($this->view . '.index', ['list' => $this->search($request)])
            ->withController($this);       
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

   
    public function destroy($id)
    {
        
    }
}
