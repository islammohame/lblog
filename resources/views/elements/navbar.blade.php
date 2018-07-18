
<nav class="navbar navbar-default navbar" role="navigation">
<div class="container">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <a class="navbar-brand" href="/">
        <i class="fa fa-home" aria-hidden="true"></i> My blog       
        </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
           <li>
               <a href="/posts">Posts |</a>
           </li>

           <li>
                <a href=" {{ route('aboutPage') }} ">About |</a>
           </li>

           <li>
               <a href="/contact">Contact |</a>
           </li>
        </ul>

     <!-- Right Side Of Navbar -->
 <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                  <li>
                      <a href="/posts/create">
                      <i class="fas fa-pen-square"></i> Make Post
                      </a>
                  </li>
                  <li>
                      <a href=" {{route('home')}} ">
                      <i class="fa fa-user-circle" aria-hidden="true"></i>  Admin 
                      </a>
                  </li>
                  <li class="divider"></li>

                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endguest
    </ul>  
 </ul>
    </div><!-- /.navbar-collapse -->
</div>
</nav>
