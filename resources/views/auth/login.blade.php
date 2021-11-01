
@extends('layouts.app-login')

@section('content')

    <div class="row align-items-center m-h-100">
        <div class="mx-auto col-md-8 pt5 text-center m-auto">
        {{-- NavBar Header --}}

    <nav class="navbar navbar-expand-sm navbar-light">

          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">Home</a>
            </li>
            <li class="nav-item">
                 <a class="nav-link text-white" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
            </li>
          </ul>
    </nav>
        {{-- End Of NavBar --}}
            <p>
               <h5 class='text-white'>Ghana Electricals Delears</h5>
            </p>
        </div>
    </div>
    <div class="login-page" style="padding-top: 0%;  background-color: #193ec3" >
        <div class="form" style="background-color:#193ec3">
            <form class="login-form form-group{{ $errors->has('email') ? ' has-error' : '' }}" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} wow zoomIn">
                    <input name="email" type="email" value="admin@gmail.com" placeholder="Enter Your Email"/>
                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} wow zoomIn">
                   <input  name="password" type="password" value="zzzzzzzz" placeholder="Enter Your Password"/>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <button class='btn btn-primary wow fadeInUp' type="submit" id="btn">login</button>
            </form>
        </div>
    </div>

@endsection
