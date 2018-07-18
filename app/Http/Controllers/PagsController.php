<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;

class PagsController extends Controller
{

    // Start Index Page======================================> --}} 
    
    public function index(){
    $data = "This Is My Site";
    //return view('pags.index')->with('data',$data);
     return view('pags.index',compact('data'));
     
    }

 //-- Start Index Page========================================> --}} 

 //-- Start About Page========================================> --}}
 
    public function about(){
        return view('pags.about');
    }

 //-- End About Page==========================================> --}}
 
 //-- Start Contact Page======================================> --}}
 
    public function contact(){
        return view('pags.contact');
    }
 //-- End Contact Page========================================> --}}
    
       
 public function dosend (Request $request){
    $request->validate([
        'name'       =>   'required',
        'email'      =>   'required|email',
        'subject'    =>   'required',
         'body'      =>   'required|min:10',
      ]);
    
    $name    = $request->input('name');
    $email   = $request->input('email');
    $subject = $request->input('subject');
    $body    = $request->input('body');

    Mail::to('eslambombo67@gmail.com')
    ->send(new ContactUs($name, $email, $subject, $body));

        return redirect('/contact')->with('success', 'Email Send Successfully');
} 




}
