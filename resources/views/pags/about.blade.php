@extends('layouts.defoult')

@section('content')

<!-- <div class="container">
    <h1 style="text-align: center;">About Us</h1>     
</div> -->
    

  <style>
  .bg-1 { 
      background-color: #1abc9c;
      color: #ffffff;
  }
  .bg-2 { 
      background-color: #474e5d;
      color: #ffffff;
  }
  .bg-3 { 
      background-color: #ffffff;
      color: #555555;
  }
  .container-fluid {
      padding-top: 100px;
      padding-bottom: 100px;
  }
  </style>
</head>
<body>

<div class="container-fluid bg-1 text-center">
  <h3>Who Am I?</h3>
  <img src="bird.jpg" class="img-circle" alt="Bird" width="350" height="350">
  <h3>I'm an adventurer</h3>
</div>

<div class="container-fluid bg-2 text-center">
  <h3>What Am I?</h3>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
  <a href="#" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-search"></span> Search
  </a>
</div>

<div class="container-fluid bg-3 text-center">    
  <h3>Where To Find Me?</h3><br>
  <div class="row">
    <div class="col-sm-4">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <img src="birds1.jpg" alt="Image" width="350" height="300">
    </div>
    <div class="col-sm-4"> 
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <img src="birds2.jpg" alt="Image" width="350" height="300">
    </div>
    <div class="col-sm-4"> 
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <img src="avatar.png" alt="Image" width="350" height="300">
    </div>
  </div>
</div>




    @endsection      
