    <!DOCTYPE html>
    <html lang="">
    <head>
        <meta charset=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('styles/one-health/assets/css/maicons.css')}}">
        {{-- <link rel="stylesheet" href="{{asset('styles/one-health/assets/css/bootstrap.css')}}"> --}}
        <link rel="stylesheet" href="{{asset('styles/one-health/assets/vendor/owl-carousel/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('styles/one-health/assets/vendor/animate/animate.css')}}">
        {{-- <link rel="stylesheet" href="{{asset('styles/one-health/assets/css/theme.css')}}"> --}}

        <style type="text/css">

            .page-hero {
                position: relative;
                height: 300px;
                z-index: -1;
            }
           
            .container1{
                width:100%;
            }
            @media screen and (max-width: 600px) {
                .container1,.title{
                    font-size: 8px;
                }
            }
            .progressbar{
                counter-reset: step;
            }

            .progressbar li{
                list-style-type: none;
                float: left;
                width:19.25%;
                position: relative;
                text-align: center;
            }

            .progressbar li:before{
                content: counter(step);
                counter-increment: step;
                width: 40px;
                height: 40px;
                line-height: 40px;
                border: 1px solid #ddd;
                display: block;
                text-align: center;
                margin: 0 auto 10px auto;
                border-radius: 50%;
                background-color: white;
            }

            .progressbar li:after{
                content: '';
                position: absolute;
                width: 100%;
                height: 1px;
                background-color: #ddd;
                top: 15px;
                left: -50%;
                z-index: -1;
            }
            .progressbar li:first-child:after{
                content: none;
            }


            .progressbar li.active{
                color: #e9eee9;
            }
            .progressbar li.active:before{
                background-color: #d90000;
                color: white;
            }

            .progressbar li.active+li:after{
                background-color:  #d90000;
                font-weight: bold;
            }

            .progressbar li.active {
                color: #0c820c;
                font-weight: bold;
            }

            .bg-dark {
                background-color: #051b69!important;
                height:300px;
                /*margin-bottom: 50px;*/
                /*z-index: -5;*/
            }
            .bg-red{
                margin-top: -50px;
            }
            .badge-circle{
                border-radius:200%;
                padding: 10px;
                background-color: #d90000;
                color: #ffffff;
            }
            .title{
                color:   #d90000;
            }

            .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
                color: #fff;
                background-color:  #d90000;
            }

            .wrapper{
                position: absolute;
                /*top: 0;*/
                z-index: -1;
                width: 100%;
                height: 100%;
            }
            nav{
                background-color: #eeeeee;
                font-size: 1.6em;
                padding: 0.5rem 1rem;
                display: flex;
                color: #eeeeee;
                align-items: center;
                box-shadow: 0 0 4px rgba(0.0 , 0. 2);
            }

            .hamburger{
                transform: translateY(3px);
                margin-right: 1rem;
                cursor: pointer;
                color: #0a0a0a;
            }

            .backdrop{
                position: fixed;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color:rgba(0,0,0,0.4);
                display: none;
            }

            .backdrop--active{
                display: block;
            }


            .sidebar{
                position: fixed;
                top: 0;
                left: 0;
                width: 70%;
                max-width: 18rem;
                height: 100%;
                transition: all 1s cubic-bezier(0.075,0.82,0.165,1);
                box-shadow: 0 0 4px rgba(0 . 0, 0.2 );
                background-color: darkblue;
                transform: translateX(-100%);
            }

            .sidebar--active{
                transform: translateX(0);
            }

            .sidebar_profile{
                padding: 1rem 1.5rem;
                display: flex;
                border-bottom: 2px solid rgba(2,2,2,0.1);
                align-items: center;
            }

            .sidebar_profile h1{
                font-size: 1rem;
                margin-bottom: 6px;
                color: yellow;
            }

            .sidebar_profile p{
                font-size: 8px;
                color: white;
            }

            .sidebar_profile img{
                width: 6rem;
                height: 6rem;
                border-radius: 50%;
                margin-right: 1rem;
                transform: translateX(-0.3rem);
            }

            .sidebar_list{
                list-style: none;
            }

            .sidebar_item{
                padding: 2rem 2.5rem;
                font-size: 1rem;
                position: relative;
                overflow: hidden;
            }

            .sidebar_item a{
                text-decoration: none;
                color: #eeeeee;
                display: flex;
                align-items: center;
            }

            .sidebar_item i{
                margin-right:1rem;
            }

            .sidebar_item::after{
                content: '';
                position: absolute;
                left: 0;
                top: 0;
                height: 0;
                width: 2px;
                background-color: darkblue;
                transition: height 0.5s 0.4s, width 0.5s;
                z-index: -1;
            }


            .sidebar_item:hover::after{
                transition: height 0.5s 0.1s, width 0.5s 0.4s ;
                width: 100%;
                height: 100%;
            }

            .sidebar_item:hover{
                color: darkblue;
            }

        </style>
    </head>
    <body>
    <nav>
        <div class="hamburger">
            <i class="ri-menu-line"></i>
        </div>

        <div class="backdrop"></div>
        <div class="sidebar">
            <div class="sidebar_profile">
                <img src="/image/upsa4.jpg" alt="logo" width="50" height="50">
                <div>
                    <h1></h1>
                    <p>Email.com</p>
                </div>
            </div>
            <div class="sidebar_list">
                <li class="sidebar_item">
                    <a href="#"><i class="ri-home-line"></i>Home</a>
                </li>
                <li class="sidebar_item">
                    <a href="#"><i class="ri-information-line"></i>About</a>
                </li>
                <li class="sidebar_item">
                    <a href="#"><i class="ri-pencil-ruler-2-line"></i>Skills</a>
                </li>
                <li class="sidebar_item">
                    <a href="#"><i class="ri-image-2-line"></i>Portfolio</a>
                </li>
                <li class="sidebar_item">
                    <a href="#"><i class="ri-settings-3-line"></i>Settings</a>
                </li>
            </div>
        </div>
    </nav>
<div class="wrapper">
 <div class="page-hero bg-image overlay-dark" style="background-image: url({{asset('styles/one-health/assets/img/bg_image_1.jpg')}}); height:300px;">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="subhead">Let's make your business grow faster</span>
        <h1 class="display-4">Hire Developer</h1>
        <a href="#" class="btn btn-primary">Let's Consult</a>
      </div>
    </div>
  </div>

    <div class="container bg-red" style="width:90%;">
        <div class="row pull-up">
            <div class="col m-b-30">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center p-t-30 p-b-20">
                            <div class="text-overline text-muted opacity-75">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
{{--  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>  --}}
{{--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>  --}}
<script src="{{asset('styles/one-health/assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('styles/one-health/assets/vendor/wow/wow.min.js')}}"></script>

<script src="{{asset('styles/one-health/assets/js/theme.js')}}"></script>
    <script>
        const hamburger=document.querySelector('.hamburger');
        const backdrop=document.querySelector('.backdrop');
        const sidebar=document.querySelector('.sidebar');

        hamburger.addEventListener('click',()=>{
            toggleSidebar();
        });

        backdrop.addEventListener('click',()=>{
            toggleSidebar();
        });


        const toggleSidebar =()=>{
            backdrop.classList.toggle('backdrop--active');
            sidebar.classList.toggle('sidebar--active');
        }



        <script>
            $('#myTab a').on('click', function (event) {
                event.preventDefault()
                $(this).tab('show')
              })
        </script>


    </script>
</div>
    </body>
    </html>
