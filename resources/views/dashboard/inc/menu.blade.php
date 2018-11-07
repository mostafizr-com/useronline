<nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top">
    <div class="container">

        <a class="navbar-brand" href="{{ url('/dashboard') }}">
            {{ config('app.name', 'Dashboard') }}
        </a>
   
        @if (Auth::check())
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            @if (Route::has('post.create'))
                <a class="btn btn-success btn-sm" href="{{ route('post.create') }}">
                 <i class="fas fa-plus"></i> {{ __('Article') }}
                </a>
            @endif
            </li>
        </ul>        
        @endif

    
         <!-- Left Side Of Navbar -->
         <ul class="navbar-nav mr-auto">

         </ul>

            <!-- Right Side Of Navbar -->
        

            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                @else

                    <li class="nav-item dropdown">
                        
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Hello, <strong>{{ Auth::user()->username }} </strong>
                            @if(Auth::user()->image != "")  
                             <img class="user-avater" src="{{ asset(Auth::user()->image) }}">
                            @else
                             <img class="user-avater" src="{{ asset('public/defaults/user-male.png') }}"> 
                           @endif  
                           <span class="caret"></span> 
                        </a>

                        <div class="dropdown-menu dropdown-menu-right user-popup" aria-labelledby="navbarDropdown">
                        
                            <a class="dropdown-item" href="{{ route('profile', Auth::user()->username) }}">
                                <span class="text-muted"><i class="fas fa-cog"></i> Profile settings</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <span class="text-muted"><i class="fas fa-envelope"></i>  Messages</span>
                            </a>

                            <a class="dropdown-item" href="#">
                                <span class="text-muted"><i class="fas fa-globe-asia"></i>  Notifications</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="#">
                                <span class="text-muted"><i class="fas fa-rss"></i>  My articles</span>
                            </a>
    
                            <a class="dropdown-item" href="#">
                                <span class="text-muted"><i class="fas fa-edit"></i> Write article</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                               <span class="text-muted"><i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>

                    </li>
                @endguest
                
            </ul>
      
    </div>
</nav>
<br><br>
