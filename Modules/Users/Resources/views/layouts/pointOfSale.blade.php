<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>App Name - @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}" media="all">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('styles/one-health/assets/css/maicons.css')}}"> --}}

  {{-- <link rel="stylesheet" href="{{asset('styles/one-health/assets/css/bootstrap.css')}}"> --}}

  <link rel="stylesheet" href="{{asset('styles/one-health/assets/vendor/owl-carousel/css/owl.carousel.css')}}">

  <link rel="stylesheet" href="{{asset('styles/one-health/assets/vendor/animate/animate.css')}}">

  {{-- <link rel="stylesheet" href="{{asset('styles/one-health/assets/css/theme.css')}}"> --}}
<style>
.pointrt
{
    background-color:#F2E68F;
}
.content-header
{
    background-color:blue;
    color:#ffffff;
}
.content-header a
{
    color:#ffffff;
}
</style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <nav class="navbar navbar-expand-lg navbar-light  bg-primary">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
    @include('users::partials.breadcrumb')

  <!-- Navbar -->
  {{-- @include('users::partials.header') --}}
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  {{-- @include('users::partials.sidebar') --}}
  <!-- Content Wrapper. Contains page content -->
  <div class="">

    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
       @foreach($errors->all() as $error)
          <li>{{$error}}</li>
       @endforeach
      <!-- Default box -->
      @yield('content')
      @include('sweetalert::alert')   
      <div class='container-fluid' style="background-image: url({{asset('photos/bg4.jpeg')}});">
      
      <div class='row' style='height:900px; overflow: auto;'>
           <div class='col-md-6' style='overflow: auto;'>
                 <div class='container'>
                      @yield('content1')
                </div>
          </div>
          <div class='col-md-6' style="background-image: url({{asset('photos/bg5.jpeg')}}); overflow: auto;">
              @yield('content2')
          </div>
      </div>
          
      </div>
    </section>
    <!-- /.content -->
  </div>
  {{-- @include('users::partials.footer') --}}
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/js/demo.js') }}"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('styles/one-health/assets/vendor/wow/wow.min.js')}}"></script>
     <script src="{{asset('styles/one-health/assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

    <script src="{{asset('styles/one-health/assets/vendor/wow/wow.min.js')}}"></script>

    {{-- <script src="{{asset('styles/one-health/assets/js/google-maps.js')}}"></script> --}}

    <script src="{{asset('styles/one-health/assets/js/theme.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
        $(".js-example-basic-multiple").on("click", function () {
            $(".js-example-disabled-multi").prop("disabled", false);
          });
    });






</script>

<script>
var setPos=document.getElementById('setPos');


 setPos.addEventListener('click',function () {
   var cc= setPos.innerText;
   alert(cc);
    
});
</script>


</body>
</html>

