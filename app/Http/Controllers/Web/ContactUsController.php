<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Http\Requests\ContactUsRequest;
class ContactUsController extends Controller
{
    
    public function index()
    {
        return view('web.contact-us');
    }
    
    public function store(ContactUsRequest $request)
    {
        
        $contactUs = new ContactUs(request()->all());
        
        $contactUs->save();
       
        return redirect()->back()->withSuccess('Thông tin của bạn đã được gửi ,cảm ơn bạn');
    }
   
}
