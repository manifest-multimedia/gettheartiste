<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>eProcure</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('images/logo/favicon.png')}}">

    <!-- page css -->

    <!-- Core css -->
    <link href="{{asset('css/app.min.css')}}" rel="stylesheet">


</head>

<body>
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('{{asset('images/others/login-3.png')}}')">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-5 m-h-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between m-b-30">
                                       <a href="/"> <img class="img-fluid" alt="" src="{{asset('images/logo/logo.png')}}"> </a>
                                       
                                        <h2 class="m-b-0">@yield('title')</h2>
                                    </div>
                                    @yield('form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-flex p-h-40 justify-content-between">
                    <span class="">© 2021 McCallys Company Limited</span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="/legal">Legal</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="/privacy">Privacy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="{{asset('js/vendors.min.js')}}"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="{{asset('js/app.min.js')}}"></script>

</body>

</html>