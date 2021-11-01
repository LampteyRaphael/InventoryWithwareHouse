@extends ('layouts.master_table')
@section('dashboard')
    <li>
        <p class="navbar-text">{{$dates}}</p>
    </li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="table-responsive">
                <div class="panel shadow mb25">
                    <div class="panel-heading border">
                        <ol class="breadcrumb mb0 no-padding">
                            <li>
                                <a href="javascript:;">Date Of Birth</a>
                            </li>
                            <li>
                                <a href="javascript:;">Notifications</a>
                            </li>
                            <li class="active">Data tables</li>
                        </ol>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb0">
                                <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Name</th>
                                    <th>Date Of Birth</th>
                                    <th>Age</th>
                                    <th><i class="fa fa-phone"></i>First Number</th>
                                    <th><i class="fa fa-phone"></i>Second Number</th>
                                    <th>Email</th>
                                    <th>Day Bone</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($users)
                                    @foreach($users as $user)
                                        <tr>
                                            <td><img class="img-rounded" height="50" width="50" src="{{$user->photo? $user->photo->file :asset('images/placeholder.png')}}" alt=""></td>
                                            <td><a href="{{route('registration.edit',$user->id)}}">{{$user->name??''}}</a></td>
                                            <td>{{$user->birthDate??''}}</td>
                                            <td>{{\Carbon\Carbon::parse($user->birthDate)->age}}</td>
                                            <td>{{$user->mobileNumber1 ?? ''}}</td>
                                            <td>{{$user->mobileNumber2?? ''}}</td>
                                            <td>{{$user->email ?? ''}}</td>
                                            <td>{{\Carbon\Carbon::parse($user->birthDate)->format('l')}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 bg-white">
            <div class="table-responsive">
                <h6 class="text-primary"><u>Date Of Birth (Month)</u></h6>
                <ul class="nav">
                    <li class="item"><a href="{{route('january.index')}}">January</a></li>
                    <li  class="item"><a href="{{route('february.index')}}">February</a></li>
                    <li  class="item"><a href="{{route('march.index')}}">March</a></li>
                    <li  class="item"><a href="{{route('april.index')}}">April</a></li>
                    <li  class="item"><a href="{{route('may.index')}}">May</a></li>
                    <li  class="item"><a href="{{route('june.index')}}">June</a></li>
                    <li  class="item"><a href="{{route('july.index')}}">July</a></li>
                    <li  class="item"><a href="{{route('august.index')}}">August</a></li>
                    <li  class="item"><a href="{{route('september.index')}}">September</a></li>
                    <li  class="item"><a href="{{route('october.index')}}">October</a></li>
                    <li  class="item"><a href="{{route('november.index')}}">November</a></li>
                    <li  class="item"><a href="{{route('december.index')}}">December</a></li>
                    <h6 class="text-primary"><u> Date of Birth (Day)</u></h6>
                    <li  class="item"><a href="{{route('sunday.index')}}">Sunday</a></li>
                    <li  class="item"><a href="{{route('monday.index')}}">Monday</a></li>
                    <li  class="item"><a href="{{route('tuesday.index')}}">Tuesday</a></li>
                    <li  class="item"><a href="{{route('wednesday.index')}}">Wednesday</a></li>
                    <li  class="item"><a href="{{route('thursday.index')}}">Thursday</a></li>
                    <li  class="item"><a href="{{route('friday.index')}}">Friday</a></li>
                    <li  class="item"><a href="{{route('saturday.index')}}">Saturday</a></li>
                </ul>
            </div>

        </div>
    </div>

@endsection


