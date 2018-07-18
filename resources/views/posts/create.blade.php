@extends('layouts.defoult')

@section('content')

<div class="container">
<h1 style="text-align: center;">Add New Post</h1> <hr>

 <form action=" {{route('posts.store')}}" method="post" enctype="multipart/form-data">
   {{-- Start Title========================================> --}}
   {{ csrf_field() }}
   <div class="form-group">
     <label for="Title">Title</label>
     <input type="text" class="form-control" name="title" placeholder="Enter Your Title"/>
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
             placeholder="Some Info">

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
   {{-- Start Save==========================================> --}}
      
</div>

      
@endsection      
    
