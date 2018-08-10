<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\Services;
use Illuminate\Http\Request;
use App\Faq;
use App\Testimonials;
use App\Blog;
use App\Sample;
use App\Mail\TestMail;


class PagesController extends Controller
{
    public function index(){
        $data=array(
         'faq'=>Faq::all(),
         'testimonials'=>Testimonials::all()
        );
        // return $data['faq'];
        //return $data;
        return view('pages.index')->with('data',$data);
        
    }
    
    

    public function sample(){
        $data=Sample::all();
        return view ('pages.sample')->with('data',$data);
    }
    public function blog(){
        $data=Blog::all();
        return view('pages.blog')->with('data',$data);
    }
    public function sendMail(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
            'order_number'=>'required',             
        ]);
        $data=array(
        'name'=>$request->input('name'),
        'email'=>$request->input('email'),
        'subject'=>$request->input('subject'),
        'message'=>$request->input('message'),
        'order_number'=>$request->input('order_number'),
        );
    
    // return (new TestMail($data))->render();
    Mail::to('sarosessmdr@gmail.com')->send(new TestMail($data));
    if(Mail::failures())
    {
        return "mail failure";
    }
    else{
        return "mail success";
    }
    
}
}

