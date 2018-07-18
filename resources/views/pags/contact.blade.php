@extends('layouts.defoult')

@section('content')

<div class="container">
<h1 style="text-align: center;"> Contact Us</h1>  <hr>

<form action="/dosend" method="post">
    {{csrf_field()}}

   {{-- Start Name========================================> --}}
   <div class="form-group">
     <label for="name">Name</label>
     <input type="text" class="form-control" name="name"  placeholder="Enter Your Name">
   </div>
   {{-- End Name===========================================> --}}

   
   {{-- Start Email========================================> --}}
   <div class="form-group">
     <label for="name">Email</label>
     <input type="text" class="form-control" name="email"  placeholder="Enter Your Email">
   </div>
   {{-- End Email===========================================> --}}


   {{-- Start Subject========================================> --}}
   <div class="form-group">
     <label for="Subject">Subject</label>
     <input type="text" class="form-control" name="subject"  placeholder="Enter Your Subject" >
   </div>
   {{-- End Subject===========================================> --}}


   {{-- Start Body==========================================> --}}
   <div class="form-group">
     <label for="Body">Body</label>
     <textarea 
             id="body"
             name="body" 
             cols="30"
             rows="10"
             class="form-control" 
             placeholder="Enter Your Message">

     </textarea>
   </div>
   {{-- End Body============================================> --}}


   {{-- Start Send==========================================> --}}
  <div class="form-group">
   <button type='submit' class='btn btn-primary pull-right '>Send</button>
   </div>
   {{-- End Send============================================> --}}

</form>


<br><br>
<br><br>



<h1 class="text-center">Contact Address</h1>
<hr>
  <div class="row">
    <div class="col-sm-8">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11880.492291371422!2d12.4922309!3d41.8902102!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x28f1c82e908503c4!2sColosseo!5e0!3m2!1sit!2sit!4v1524815927977" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>

    <div class="col-sm-4" id="contact2" style="z-index: !important;>
        <h3>Sedi e Contatti</h3>
        <hr align="left" width="50%">
        <h4 class="pt-2">Sede operativa</h4>
        <i class="fas fa-globe" style="color:#000"></i> address<br>
        <h4 class="pt-2">Contatti</h4>
        <i class="fas fa-phone" style="color:#000"></i> <a href="tel:+"> 01014211507 </a><br>
        <i class="fab fa-whatsapp" style="color:#000"></i><a href="tel:+"> 01143674221 </a><br>
        <h4 class="pt-2">Email</h4>
        <i class="fa fa-envelope" style="color:#000"></i> <a href="https://www.facebook.com/profile.php?id=100002391387754">smsm_samy1995@yahoo.com</a><br>
      </div>
  </div>
</div>


      
@endsection      
    



   <!-- {{-- Start Email========================================> --}}

   <label for="name">Email</label>
   <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="text" class="form-control" name="email" placeholder="Email">
    </div>

  {{-- End Email===========================================> --}}  -->