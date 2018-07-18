@if($errors->any())
    <div class="container">
        <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
   </div>
 @endif
 </div>

 <div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }} 
        </div>
    @endif
 </div>

 <div class="container">
    @if(session('error'))
    <div class="alert alert-danger">
            {{ session('error') }} 
        </div>
    @endif
 </div>
