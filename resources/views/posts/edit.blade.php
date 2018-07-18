@extends('layouts.defoult')

@section('content')

<div class="container">
<h1 style="text-align: center;">Edit {{$post->title}} </h1> <hr>

 <form action=" {{route('posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
 <input type="hidden" name="_method" value="PUT"/>
   {{ csrf_field() }}
   {{-- Start Title========================================> --}}
   <div class="form-group">
     <label for="Title">Title</label>
     <input type="text" class="form-control" name="title" placeholder="Enter Your Title" value=" {{$post->title}} " />
   </div>
   {{-- End Title===========================================> --}}

   {{-- Start Body==========================================> --}}
   <div class="form-group">
     <label for="Body">Body</label>
     <textarea 
             id="body"
             name="body" 
             cols="30"
             rows="10"
             class="form-control ckeditor" 
             value=" {{$post->body}}"
             placeholder="Some Info">{{$post->body}}

     </textarea>
   </div>

   {{-- End Body============================================> --}}

   {{-- Start Avatar========================================> --}}
   
   <div class="form-group">
     <label for="Featured Image">Featured Image</label>
     <input type="file" class="form-control" name="avatar" placeholder="Select Featured Image "/>
   </div>

   {{-- End Avatar==========================================> --}}

   {{-- Start Save==========================================> --}}

   <div class="form-group">
   <button type='submit' class='btn btn-primary pull-right '>Save</button>
   </div>

   {{-- End Save============================================> --}}
      
</div>

    
@endsection      
    
