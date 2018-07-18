@extends('layouts.defoult')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                       Dashboard
                    <div class=" btn-group pull-right">
                        <a href="/posts/create">
                             <i class="fas fa-plus"></i> New Post
                        </a>
                    </a>
                    </div>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <h3>Your <mark>Posts</mark></h3>

                  <table class="table table-striped">
                        <thead>
                           <tr>
                               <th>Title</th>
                               <th>Created</th>
                               <th>Edit</th>
                               <th>Delete</th>
                           </tr> 
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td> {{$post->title}} </td>                                                        
                                    <td> {{$post->created_at->diffForHumans()}} </td>                                                                   
                                    <td> 
                                    <a href="/posts/{{$post->id}}\edit"  class="btn btn-success btn-sm ">
                                        <i class="fas fa-edit"></i> Edit</a>
                                    </td>           

                                    <td> 
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger  btn-sm" type="submit">
                                            <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach    
                        </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
