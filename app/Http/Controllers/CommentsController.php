<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Comment;
use App\Post;

class CommentsController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');       

    }

    public function store(Request $request, $slug){

        $request->validate([
            'body' => 'required|min:5|max:500',
        ]);

         //ربط البوست والمستخدم لتخزين البيانات عن طريق Slug
         //Post=========>
         $post = Post::where('slug', $slug)->firstOrFail();

         //Current User======>
         $userid = Auth::id();

        $comment = new Comment();
        $comment->body = $request->input('body');
         // للتحقق والحماية للبوست كله 
        $comment->post()->associate($post);
        // او ال2 مع بعض او تعمل ده 
        $comment->user_id = $userid;
        
        $comment->save();

        return redirect()->route('posts.show', $slug)->with('success', 'Comment Added') ;
    }
}
