    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Title -->
        <title>{{ $title }}</title>

        <!-- Styles -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap"
            rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
            rel="stylesheet">
        <link href="{{ asset('neptune/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('neptune/plugins/perfectscroll/perfect-scrollbar.css') }}" rel="stylesheet">
        <link href="{{ asset('neptune/plugins/pace/pace.css') }}" rel="stylesheet">


        <!-- Theme Styles -->
        <link href="{{ asset('neptune/css/main.min.css') }}" rel="stylesheet">
        <link href="{{ asset('neptune/css/custom.css') }}" rel="stylesheet">

        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/images/favicon.png') }}" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/images/favicon.png') }}" />

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        {{-- Int Tel Input --}}
        <link rel="stylesheet" href="{{ asset('neptune/plugins/intl-tel-input/css/intlTelInput.css') }}">

        {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}



        {{-- Replace background image with artiste picture --}}
        <style>
            .app-auth-lock-screen .app-auth-background {
                background: url({{ $image ?? asset('/neptune/images/backgrounds/enjoy-music.webp')}}) no-repeat;
                background-size: cover;
                background-position: center;
            }

            .iti.iti--allow-dropdown {
                width: 100%;
            }

           /*  body.swal2-shown.swal2-height-auto {
                height: 0 !important;
            } */
        </style>
    </head>

    <body>
        <div class="flex-wrap app app-auth-lock-screen align-content-stretch d-flex justify-content-end">
            <div class="app-auth-background">

            </div>
            <div class="app-auth-container">
                <div class="logo">
                    <a href="{{ URL::Route('home') }}"></a>
                </div>
                {{ $slot }}
            </div>
        </div>
        @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

        <!-- Javascripts -->
        <script src="{{ asset('neptune/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('neptune/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('neptune/plugins/perfectscroll/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('neptune/plugins/pace/pace.min.js') }}"></script>
        <script src="{{ asset('neptune/js/main.min.js') }}"></script>
        <script src="{{ asset('neptune/js/custom.js') }}"></script>
        <script src="https://js.paystack.co/v1/inline.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="{{ asset('neptune/plugins/intl-tel-input/js/intlTelInput.js') }}"></script>
        <script>
            var input = document.querySelector("#phone"),
                //  output = document.querySelector("#output"),
                errorMsg = document.querySelector("#error-msg"),
                elem = document.getElementById('result');
            validMsg = document.querySelector("#valid-msg");

            // here, the index maps to the error code returned from getValidationError - see readme
            var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
            var iti = window.intlTelInput(input, {
                initialCountry: "auto",
                nationalMode: true,
                geoIpLookup: function(success, failure) {
                    $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                        var countryCode = (resp && resp.country) ? resp.country : "gh";
                        success(countryCode);
                    });
                },
                utilsScript: "{{ asset('neptune/plugins/intl-tel-input/js/utils.js') }}"
            });

            var reset = function() {
                input.classList.remove("error");
                errorMsg.innerHTML = "";
                errorMsg.classList.add("hide");
                validMsg.classList.add("hide");
            };

            // on blur: validate
            input.addEventListener('blur', function() {
                reset();
                if (input.value.trim()) {
                    if (iti.isValidNumber()) {
                        validMsg.classList.remove("hide");
                    } else {
                        input.classList.add("error");
                        var errorCode = iti.getValidationError();
                        errorMsg.innerHTML = errorMap[errorCode];
                        errorMsg.classList.remove("hide");
                    }
                }
            });

            var handleChange = function() {
                var text = (iti.isValidNumber()) ? iti.getNumber() : "";
                var textNode = document.createTextNode(text);
                // output.innerHTML = "";
                //output.appendChild(textNode);
                elem.value = text;
                console.log('phone', text);
            };


            // listen to "keyup", but also "change" to update when the user selects a country
            input.addEventListener('change', handleChange);
            input.addEventListener('keyup', handleChange);
        </script>


        <script>
            let paymentForm = document.getElementById('paymentForm');
            paymentForm.addEventListener("submit", payWithPaystack, false);

            let key = "";
            let firstname = document.getElementById("firstname").value;
            let lastname = document.getElementById("lastname").value;
            let email = document.getElementById("email-address").value;
            let amount = document.getElementById("amount").value;
            let currency = document.getElementById("currency").value;
            let ref = '' + Math.floor((Math.random() * 1000000000) + 1);

            function payWithPaystack(e) {

                e.preventDefault();
                let handler = PaystackPop.setup({
                    key: 'pk_test_09c3bb18bbace4059a11fe3f67c1222f0a354727', // Replace with your public key
                    // key: 'pk_test_4806ae46ac32e5a19e0a55a9cdb8b2ffe25d1622', // Replace with your public key
                    email: document.getElementById("email-address").value,
                    currency: currency,
                    amount: amount * 100, //document.getElementById("amount").value * 100,
                    ref: '' + Math.floor((Math.random() * 1000000000) +
                        1
                    ), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                    // label: "Optional string that replaces customer email"

                    onClose: function() {
                        alert('Window closed.');
                    },
                    callback: function(response) {
                        /* let reference =  response.reference;
                        let fname = document.getElementById("firstname").value;
                        let lname = document.getElementById("lastname").value;
                        let phone = document.getElementById("phone").value;
                        let pass = document.getElementById("password").value;
                        let email = document.getElementById("email-address").value;
                        let apptTime = document.getElementById("appt_time").value;
                        let apptDate = document.getElementById("appt_date").value; */
                        console.log(reference);
                        $.ajax({
                            type: "GET",
                            url: "{{ URL::to('verify-payment') }}/" + reference,
                            success: function(response) {
                                console.log(response);
                                if (response[0].status == true) {
                                    // alert('Success', response[0].message)
                                    window.location = '/receipt/' + reference + "/" + fname + "/" +
                                        lname + "/" + email + "/" + phone + "/" + pass;
                                } else {
                                    alert('Failed', response[0].message)
                                }

                                /* if(data.redirect_url){
                                window.location=data.redirect_url; // or {{ url('login') }}
                                } */
                            }
                        });
                    }
                });
                handler.openIframe();
            }
        </script>


    </body>

    </html>
