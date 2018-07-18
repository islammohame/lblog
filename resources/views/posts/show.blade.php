@extends('layouts.defoult')

@section('content')

<div class="container">
    <h1 style="text-align: center;">Show Post Only</h1> <hr>

       <div class="panel panel-primary">
            <div class="panel-heading" style="font-size: 15px;"> 
                 {{ $post->title }} 
            </div>

 <div class="panel-body"> 
    @if(!Auth::guest() && (Auth::user()->id == $post->user_id))      
            <div class="clearfix">
                <a href="/posts/{{$post->id}}\edit"  class="btn btn-success  btn-sm  pull-right">
                    <i class="fas fa-edit"></i> Edit
                </a>

                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger  btn-sm" type="submit">
                       <i class="fas fa-trash"></i> Delete
                    </button>
                </form>
            </div>
            @endif

            <div class='image'>
               <img src=" {{ asset('images/posts/' . $post->avatar) }} " class=' img-respons' alt="avatar.png" style="padding-left:15%; margin-bottom: 10px;">
           </div>

             {{ $post->body }}
        </div>
    </div>  
</div>

{{-- Start Button Back==========================================> --}}

<div class="container">
    <a href="{{route('posts.index')}}" class="btn btn-primary btn-sm">
    <i class="fa fa-chevron-left" aria-hidden="true"></i> Go Back
    </a>

{{-- End Button Back============================================> --}}

    
     <hr />

{{-- Start Show Comment=========================================> --}}

 <h4><i class="far fa-comments"></i> Comments  <kbd>{{ $post->comments->count() }}</kbd></h4>
 <ul  class='comments'>
     @foreach( $post->comments as $comment)
        <li class='comment'>
            <div class="clearfix">
                <h4 class='pull-left'> <i class="fa fa-user-circle" aria-hidden="true"></i> {{ $comment->user->name }} </h4>
                <p class="pull-right"> <i class="fas fa-calendar-alt"></i> {{ $comment->created_at->diffForHumans() }} </p>
            </div>
            <p> {{ $comment->body }} </p>
        </li>
     @endforeach
 </ul>

{{-- End Show Comment=============================================> --}}


{{-- Start Comment Added==========================================> --}}

    <div class="panel panel-default">
      <div class="panel-heading">Add Your Comment</div>
      <div class="panel-body">
        <div class="form-group">
     @guest
          <div class="alert alert-info">
              Please Login To Comment 
          </div>
     @else
           <form action=" {{route('comments.store', $post->slug)}} " method="get">
           {{csrf_field()}}

           <div class="form-group">
              <label for="Comment">Comment</label>
              <textarea name="body" class="form-control" placeholder='Enter your Comment' cols="30" rows="10"></textarea>
              </div>
              
              <div class="form-group">
              <button type='submit' class='btn btn-primary pull-right '>Add Comment</button>
              </div>
           </form>
     @endguest
        </div>
      </div>
</div>

{{-- End Comment Added============================================> --}}

 <ul class="list-inline">
   <li>
      <a href="#" class="btn btn-primary btn-sm" title="Header" data-toggle="popover" data-placement="top" data-content="Content"> <i class="fas fa-chevron-circle-up"></i> </a>
   </li>
</ul>

    <script>

          $(document).ready(function(){
             $('[data-toggle="popover"]').popover();   
         });

    </script>

@endsection      
            
