@extends('layouts.defoult')

@section('content')

<div class="container">
<h1 style="text-align: center;">Welcome To Posts</h1> <hr>
  
 @if($posts->count() > 0)
     @foreach($posts as $post)
        <div class="panel panel-primary">
            <div class="panel-heading" style="font-size: 15px;"> 
                <a style="color: white;" href="/posts/{{$post->slug}}">  
                  {{ $post->title }} 
                </a>        
            </div>

            <div class="panel-body"> 
            <div class='image'>
            <img src=" {{ asset('images/posts/' . $post->avatar) }} " class=' img-respons' alt="avatar.png" style="padding-left:15%; margin-bottom: 10px;">
            </div>
              {{ str_limit(strip_tags( $post->body), 30) }}
            </div>

            <div class="panel-footer">
              <span class="label label-primary">
                 <i class="fas fa-calendar-alt"></i> {{$post->created_at->diffForHumans()}}

                 <span class="label label-success pull-right" style="font-size: 10px; margin-top: 6px;">
                    <i class="fas fa-user"></i> {{$post->user->name}}
                 </span>
            </span>
        </div>
     </div>
     @endforeach
 @else
        <div class="alert alert-info">
            <strong>Opps </strong>No Posts
        </div>
 @endif

{{ $posts->links() }}

</div>


@endsection      
    
