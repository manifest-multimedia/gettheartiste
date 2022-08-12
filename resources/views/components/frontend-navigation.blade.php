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
                            <li class="d-lg-none d-md-none"><a href="{{url('login')}}">Login</a>
                            {{-- <li class="d-lg-none d-md-none"><a href="{{url('register')}}">Register</a> --}}
                         </ul>
                    </div>

                </nav>
                <!-- Main Menu End-->
            </div>

            <div class="menu-right d-none d-lg-flex align-items-center ml-lg-auto">
                <a href="{{URL::Route('login')}}" class="theme-btn style-three mr-1 ml-1">{{__('Login')}} <i class="fas fa-user"></i></a>
              {{--   <a href="{{URL::Route('register')}}" class="theme-btn style-six mr-1 ml-1">{{__('Get Started')}} <i class="fas fa-arrow-right"></i></a> --}}
            </div>

        </div>
    </div>
</div>
<!--End Header Upper-->
