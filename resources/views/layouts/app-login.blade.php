
 <!DOCTYPE html>
 <html lang="{{ app()->getLocale() }}">
 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>{{ config('app.name', 'Laravel') }}</title>

     <!-- Styles -->
     {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="{{asset('styles/one-health/assets/css/maicons.css')}}">

  <link rel="stylesheet" href="{{asset('styles/one-health/assets/css/bootstrap.css')}}">

  <link rel="stylesheet" href="{{asset('styles/one-health/assets/vendor/owl-carousel/css/owl.carousel.css')}}">

  <link rel="stylesheet" href="{{asset('styles/one-health/assets/vendor/animate/animate.css')}}">

  <link rel="stylesheet" href="{{asset('styles/one-health/assets/css/theme.css')}}">

     <style type="text/css">
         .banner{
             background-image:url('{{asset('photos/background2.jpg')}}');
             background-position: center;
             background-repeat: no-repeat;
             background-size: cover;
             height: 1000px;
             background-color: #193ec3;
         }
         .container1{
             width:100%;
         }

         @media screen and (max-width: 600px) {
             .banner{
                 display: none;
             }
         }

         @media screen and (max-width: 600px) {
             .container1{
                 font-size: 8px;
             }
         }
      

         .bg-dark {
             background-color: #193ec3;
             height:200px;
         }
         .bg-red{
             margin-top: -50px;
         }

         .login-page {
             width: 360px;
             padding: 8% 0 0;
             margin: auto;
         }
         .form {
             position: relative;
             background: #FFFFFF;
             max-width: 360px;
             margin: 0 auto 100px;
             padding: 45px;
             text-align: center;
             /*box-shadow: 0 0 0px 0 rgba(0, 0, 0, 0.1), 0 1px 1px 0 rgba(0, 0, 0, 0.1);*/
         }
         .form input {
             font-family: "Roboto", sans-serif;
             outline: 0;
             background: #f2f2f2;
             width: 100%;
             border: 0;
             margin: 0 0 15px;
             padding: 15px;
             box-sizing: border-box;
             font-size: 14px;
         }
         .form button {
             font-family: "Roboto", sans-serif;
             text-transform: uppercase;
             outline: 0;
             background: #4CAF50;
             width: 100%;
             border: 0;
             padding: 15px;
             color: #FFFFFF;
             font-size: 14px;
             -webkit-transition: all 0.3 ease;
             transition: all 0.3 ease;
             cursor: pointer;
         }
         .form button:hover,.form button:active,.form button:focus {
             background: #43A047;
         }
         .form .message {
             margin: 15px 0 0;
             color: #b3b3b3;
             font-size: 12px;
         }
         .form .message a {
             color: #4CAF50;
             text-decoration: none;
         }
         .form .register-form {
             display: none;
             box-sizing: border-box;
         }

     </style>

 </head>
 <body>
 <div class="container-fluid">
     <div class="row" style="background-color:#193ec3">
         <div class="col-lg-3" style="height: 900px; padding-top: 100px; background-color:#193ec3">
             @yield('content')
         </div>
         <div class="col-lg-9 banner">

         </div>
     </div>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
     <script src="{{asset('styles/one-health/assets/vendor/wow/wow.min.js')}}"></script>
     <script src="{{asset('styles/one-health/assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

    <script src="{{asset('styles/one-health/assets/vendor/wow/wow.min.js')}}"></script>

    <script src="{{asset('styles/one-health/assets/js/google-maps.js')}}"></script>

    <script src="{{asset('styles/one-health/assets/js/theme.js')}}"></script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>
    
 </body>
 </html>


