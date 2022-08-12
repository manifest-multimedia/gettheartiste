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
        <title>{{$title}}</title>

        <!-- Styles -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
        <link href="{{asset('neptune/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('neptune/plugins/perfectscroll/perfect-scrollbar.css')}}" rel="stylesheet">
        <link href="{{asset('neptune/plugins/pace/pace.css')}}" rel="stylesheet">


        <!-- Theme Styles -->
        <link href="{{asset('neptune/css/main.min.css')}}" rel="stylesheet">
        <link href="{{asset('neptune/css/custom.css')}}" rel="stylesheet">

        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('frontend/images/favicon.png')}}" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('frontend/images/favicon.png')}}" />

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="app app-auth-lock-screen align-content-stretch d-flex flex-wrap justify-content-end">
            <div class="app-auth-background">

            </div>
            <div class="app-auth-container">
                <div class="logo">
                    <a href="{{URL::Route('home')}}"></a>
                </div>
                {{$slot}}
            </div>
        </div>

        <!-- Javascripts -->
        <script src="{{asset('neptune/plugins/jquery/jquery-3.5.1.min.js')}}"></script>
        <script src="{{asset('neptune/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('neptune/plugins/perfectscroll/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset('neptune/plugins/pace/pace.min.js')}}"></script>
        <script src="{{asset('neptune/js/main.min.js')}}"></script>
        <script src="{{asset('neptune/js/custom.js')}}"></script>
        <script src="https://js.paystack.co/v1/inline.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                    currency:currency,
                    amount: amount * 100,//document.getElementById("amount").value * 100,
                    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                    // label: "Optional string that replaces customer email"

                    onClose: function(){
                    alert('Window closed.');
                    },
                    callback: function(response){
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
                        url: "{{URL::to('verify-payment')}}/"+ reference,
                        success: function (response){
                            console.log(response);
                            if(response[0].status == true){
                            // alert('Success', response[0].message)
                            window.location='/receipt/'+ reference+"/"+fname+"/"+lname+"/"+email+"/"+phone+"/"+pass;
                            } else{
                                alert('Failed', response[0].message)
                            }

                            /* if(data.redirect_url){
                            window.location=data.redirect_url; // or {{url('login')}}
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
