 <!--Header-Upper-->
 <div class="header-upper">
     <div class="container clearfix">
         <div class="py-20 header-inner">
             <div class="logo-outer">
                 <div class="logo"><a href="{{ URL::Route('home') }}"><img
                             src="{{ asset('frontend/images/getartist.png') }}" style="height:60px" alt="Logo"></a>
                 </div>
             </div>

             <div class="clearfix nav-outer">
                 <!-- Main Menu -->
                 <nav class="main-menu navbar-expand-lg">
                     <div class="navbar-header">
                         <div class="logo-mobile">
                             <a href="https://gettheartiste.com">
                                 <img src="{{ asset('frontend/images/getartist.png') }}" style="height:60px"
                                     alt="Logo">
                             </a>
                         </div>
                         <!-- Toggle Button -->
                         <button type="button" class="navbar-toggle" data-toggle="collapse"
                             data-target=".navbar-collapse" aria-controls="main-menu">
                             <span class="icon-bar"></span>
                             <span class="icon-bar"></span>
                             <span class="icon-bar"></span>
                         </button>
                     </div>

                     <div class="clearfix navbar-collapse collapse" id="main-menu">
                         <ul class="clearfix navigation">
                             <li class="bk-menu"><a class="menu-text" href="https://gettheartiste.com">HOME</a></li>
                             <li class="bk-menu"><a class="menu-text" href="https://gettheartiste.com/about-us">ABOUT
                                     US</a></li>
                             <li class="bk-menu"><a class="menu-text"
                                     href="https://booking.gettheartiste.com">BOOKINGS</a></li>
                             <li class="bk-menu"><a class="menu-text"
                                     href="https://gettheartiste.com/contact-us">CONTACT
                                     US</a></li>


                             <li class="bk-menu">
                                 @auth
                                     <a href="{{ URL::Route('dashboard') }}"
                                         class="ml-1 mr-1 btn btn-success w-fix-content">{{ __('Dashboard') }}
                                         <i class="fas fa-user"></i></a>
                                 @else
                                     <a href="{{ URL::Route('login') }}"
                                         class="ml-1 mr-1 btn btn-success w-fix-content">{{ __('Login') }}
                                         <i class="fas fa-user"></i></a>

                                 @endauth
                             </li>




                         </ul>

                         <div class="menu-right d-lg-flex align-items-center ml-lg-auto1">


                         </div>
                     </div>

                 </nav>
                 <!-- Main Menu End-->
             </div>

             <div class="menu-right d-none d-lg-flex align-items-center ml-lg-auto1">

                 @auth
                     <a href="{{ URL::Route('dashboard') }}"
                         class="ml-1 mr-1 btn btn-success style-three">{{ __('Dashboard') }}
                         <i class="fas fa-user"></i></a>
                 @else
                     <a href="{{ URL::Route('login') }}" class="ml-1 mr-1 btn btn-success style-three">{{ __('Login') }}
                         <i class="fas fa-user"></i></a>
                     @if (Route::has('register'))
                         <a href="{{ URL::Route('register') }}" class="btn btn-danger">{{ __('Register') }} <i
                                 class="fas fa-user"></i></a>
                     @endif

                 @endauth
             </div>
         </div>
     </div>
 </div>
 <!--End Header Upper-->
