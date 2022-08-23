 <!--Header-Upper-->
 <div class="header-upper">
    <div class="container clearfix">
        <div class="header-inner py-20">
            <div class="logo-outer">
                <div class="logo"><a href="{{URL::Route('home')}}"><img src="{{asset('frontend/images/getartist.png')}}" style="height:60px" alt="Logo"></a></div>
            </div>

            <div class="nav-outer clearfix">
                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-lg">
                    <div class="navbar-header">
                        <div class="logo-mobile">
                            <a href="{{URL::Route('home')}}">
                                <img src="{{asset('frontend/images/getartist.png')}}" style="height:60px" alt="Logo">
                            </a>
                        </div>
                        <!-- Toggle Button -->
                         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="main-menu">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse collapse clearfix" id="main-menu">
                        <ul class="navigation clearfix">
                                @auth
                                <li class="d-lg-none d-md-none"><a class="text-success" href="{{url('dashboard')}}">Dashboard</a>
                            @else
                            <div class="menu-right d-none d-lg-flex align-items-center ml-lg-auto">
                                <li class="d-lg-none d-md-none"><a class="text-success" href="{{url('login')}}">Login</a>
                                @if (Route::has('register'))
                                    <li class="d-lg-none d-md-none"><a class="text-danger" href="{{url('register')}}">Register</a>
                                @endif
                            </div>
                            @endauth
                         </ul>
                    </div>

                </nav>
                <!-- Main Menu End-->
            </div>

            <div class="menu-right d-none d-lg-flex align-items-center ml-lg-auto">
            @auth
                <a href="{{URL::Route('dashboard')}}" class="btn btn-success style-three mr-1 ml-1 btn-success">{{__('Dashboard')}} <i class="fas fa-user"></i></a>
            @else

                <a href="{{URL::Route('login')}}" class="btn btn-success style-three mr-1 ml-1 btn-success">{{__('Login')}} <i class="fas fa-user"></i></a>
                @if (Route::has('register'))
                    <a href="{{URL::Route('register')}}" class="btn btn-danger">{{__('Register')}} <i class="fas fa-user"></i></a>
                @endif

            @endauth
        </div>
        </div>
    </div>
</div>
<!--End Header Upper-->
