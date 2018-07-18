<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use\App\Post;
use Image;

class PostsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //the Road Also Use Only========(1)===============>
       // $this->middleware('auth', ['only'=>['show'] ]);

      //the Road Also Use Except========(2)===============>
       $this->middleware('auth', ['except'=>['index','show'] ]);
      
       

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //$posts = Post::all();
      // $posts = Post::orderBy('created_at','DESC')->get();
     //دي هتجيب كل البيانات بالاحدث==========================>
       $posts = Post::orderBy('created_at','DESC')->paginate(3);
       return view('posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //دي بتظهر الفورم الخاص بأضافة بوست جديد
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $postTitle =  $request->input('title');
        // return $postTitle;
        //اما دي فبنحزن البيانات داخل الفورم اللي الفيو بتاعه فوقه ده
        $request->validate([
          'title'    =>   'required|min:3',
           'body'    =>   'required',
           'avatar'  =>   'image|mimes:png,jpg,jpeg|max:2048',
        ]);

        //Current User=============>
        $user = Auth::user();

        $post = new Post();
        $post->title =  $request->input('title');
        $post->body =   $request->input('body');

        $now = date("Y-m-d h:i:s"); //حتي لا يحدث تضارب بالعنوان

        //اي مسافة هتتحول ل - واي حاجة برضو هتتحول لكابيتل lower
        $post->slug = str_replace('','-', strtolower($post->title)) . '-'. $now;

        $post->user_id = $user->id;
        
        //Upload Avatar========>
        if($request->hasFile('avatar')){
           $avatar = $request->avatar;
           $filename = time() . '-' . $avatar->getClientOriginalName();
           $location = public_path('images/posts/' . $filename);

           Image::make($avatar)->resize(800,400)->save($location);
           $post->avatar =  $filename;
        }


        $post->save();
       return redirect('/posts')->with('success', 'Post Created Successfully');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    { 
        //دي لما تضغط ع لينك البوست يظهرلك ف صفحة تانية عن طريق ID
       // $post = Post::find($id); -1
        //ودي عشان url والحماية slug
        $post = Post::where('slug',$slug)->first();
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        //المستخدم لو مش مسجل يحولو بمجرد الضغط ع زر Edit
        $userid = Auth::id();
        if($post->user_id !== $userid){
            return redirect('/posts')->with('error', 'There is not allowed Oops!');
        }

        return view('posts.edit', compact('post'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'    =>   'required',
             'body'    =>   'required',
             'avatar'  =>   'image|mimes:png,jpg,jpeg|max:2048',
             
          ]);

          $post = Post::find($id);
          $post->title =  $request->input('title');
          $post->body =   $request->input('body');

        //المستخدم لو مش مسجل يحولو بمجرد الضغط ع زر Update
        $userid = Auth::id();
        if($post->user_id !== $userid){
            return redirect('/posts')->with('error', 'There is not allowed Oops!');
        }
        
            //Upload Avatar========>
            if($request->hasFile('avatar')){
                $avatar = $request->avatar;
                $filename = time() . '-' . $avatar->getClientOriginalName();
                $location = public_path('images/posts/' . $filename);

                Image::make($avatar)->resize(800,400)->save($location);
                $post->avatar =  $filename;
            }

          $post->save();
         return redirect('/posts')->with('success', 'Post Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $userid = Auth::id();
        
        //المستخدم لو مش مسجل يحولو بمجرد الضغط ع زر Delete
        if($post->user_id !== $userid){
            return redirect('/posts')->with('error', 'There is not allowed Oops!');            
        }

        $post->delete();
        return redirect('/posts')->with('error', 'Post Deleted Successfully');
        

    }
}
