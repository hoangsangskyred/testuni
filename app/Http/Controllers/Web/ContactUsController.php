<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Http\Requests\ContactUsRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ProjectCategory;

class ContactUsController extends Controller
{
    
    public function index()
    {
        $articleCategories = ArticleCategory::whereShow('Y')->get();

        $needle = Article::whereShow('Y')->latest()->limit(5)->get();

        $projectCategories = ProjectCategory::whereShow('Y')->get();

        return view('web.contact-us',compact(['articleCategories','needle','projectCategories']));
    }
    
    public function store(ContactUsRequest $request)
    {
        $contactUs = new ContactUs(request()->all());
        
        $contactUs->save();
       
        return redirect()->back()->withSuccess('Thông tin của bạn đã được gửi ,cảm ơn bạn');
    }
   
}
