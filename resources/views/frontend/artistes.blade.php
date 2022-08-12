<x-frontend-layout>

    <!--====== Page Banner Start ======-->
<section class="page-banner bg-blue rel z-1" style="background-image: url({{asset('/neptune/images/backgrounds/enjoy-music.webp')}});">
    <div class="container">
        <div class="banner-inner text-center">
            <h1 class="page-title wow fadeInUp delay-0-2s">Book An Artiste</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb wow fadeInUp delay-0-4s justify-content-center">
                    <li class="breadcrumb-item"><p class="text-white">Music is the heartbeat of men. Book your favorite artiste now</p></li>

                </ol>
            </nav>
        </div>
    </div>
    <img class="dots-shape" src="{{asset('frontend/images/shapes/white-dots-two.png')}}" alt="Shape">
    <img class="tringle-shape slideLeftRight" src="{{asset('frontend/images/shapes/white-tringle.png')}}" alt="Shape">
    <img class="close-shape" src="{{asset('frontend/images/shapes/white-close.png')}}" alt="Shape">
    <img src="{{asset('frontend/images/newsletter/circle.png')}}" alt="shape" class="banner-circle slideUpRight">
    <img class="dots-shape-three slideUpDown delay-1-5s" src="{{asset('frontend/images/shapes/white-dots-three.png')}}" alt="Shape">
</section>
<!--====== Page Banner End ======-->


<!--====== Team Section Start ======-->
<section class="team-section rel z-1 pb-75 rpb-45">
    <div class="container">
       <div class="row justify-content-center">
           <div class="col-xl-8 col-lg-10">
               <div class="section-title text-center mt-60 mb-60">
{{--                     <span class="sub-title">Expert Artiste</span> --}}
                    <h2>Available for Booking</h2>
                </div>
           </div>
       </div>
        <div class="row align-items-center">
            @foreach ($artistes as $artiste)
            <div class="col-xl-3 col-md-6">
                <div class="team-member wow fadeInUp delay-0-2s">
                    <div class="image">
                        <img src="{{asset($artiste->picture)}}" alt="{{$artiste->name}}">

                    </div>
                    <h3>{{$artiste->name}}</h3>
                    <span><a href="{{route('booking', $artiste->name)}}">Book Now</a></span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--====== Team Section End ======-->




    </x-frontend-layout>
