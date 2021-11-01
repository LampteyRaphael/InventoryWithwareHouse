@extends ('layouts.master_table')
@section('dashboard')
    <li>
        <p class="navbar-text">{{$dates}}</p>
    </li>
@endsection
@section('content')
    <div class="row">
        <div class=" col-md-10">
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
                                    <th>Day Born</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($users)
                                    @foreach($users as $user)
                                        <tr>
                                            <td><img class="img-rounded" height="50" width="50" src="{{$user->photo? $user->photo->file :asset('images/placeholder.png')}}" alt=""></td>
                                            <td>{{$user->name??''}}</td>
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
            <h6 class="text-primary"><u>Date Of Birth (Month)</u></h6>
            <ul class="nav scrollable">
                <li class="item"><a href="{{route('january.index')}}"><i class="fa fa-calendar fa-fw"></i>  January</a></li>
                <li  class="item"><a href="{{route('february.index')}}"><i class="fa fa-calendar fa-fw"></i> February</a></li>
                <li  class="item"><a href="{{route('march.index')}}"><i class="fa fa-calendar fa-fw"></i>  March</a></li>
                <li  class="item"><a href="{{route('april.index')}}"><i class="fa fa-calendar fa-fw"></i> April</a></li>
                <li  class="item"><a href="{{route('may.index')}}"><i class="fa fa-calendar fa-fw"></i> May</a></li>
                <li  class="item"><a href="{{route('june.index')}}"><i class="fa fa-calendar fa-fw"></i> June</a></li>
                <li  class="item"><a href="{{route('july.index')}}"><i class="fa fa-calendar fa-fw"></i> July</a></li>
                <li  class="item"><a href="{{route('august.index')}}"><i class="fa fa-calendar fa-fw"></i> August</a></li>
                <li  class="item"><a href="{{route('september.index')}}"><i class="fa fa-calendar fa-fw"></i> September</a></li>
                <li  class="item"><a href="{{route('october.index')}}"><i class="fa fa-calendar fa-fw"></i> October</a></li>
                <li  class="item"><a href="{{route('november.index')}}"><i class="fa fa-calendar fa-fw"></i> November</a></li>
                <li  class="item"><a href="{{route('december.index')}}"><i class="fa fa-calendar fa-fw"></i> December</a></li>
                <h6 class="text-primary"><u> Date of Birth (Day)</u></h6>
                    <li  class="item"><a href="{{route('sunday-birth.index')}}"><i class="fa fa-calendar fa-fw"></i> Sunday</a></li>
                    <li  class="item"><a href="{{route('monday-birth.index')}}"><i class="fa fa-calendar fa-fw"></i> Monday</a></li>
                    <li  class="item"><a href="{{route('tuesday-birth.index')}}"><i class="fa fa-calendar fa-fw"></i> Tuesday</a></li>
                    <li  class="item"><a href="{{route('wednesday-birth.index')}}"><i class="fa fa-calendar fa-fw"></i> Wednesday</a></li>
                    <li  class="item"><a href="{{route('thursday-birth.index')}}"><i class="fa fa-calendar fa-fw"></i> Thursday</a></li>
                    <li  class="item"><a href="{{route('friday-birth.index')}}"><i class="fa fa-calendar fa-fw"></i> Friday</a></li>
                    <li  class="item"><a href="{{route('saturday-birth.index')}}"><i class="fa fa-calendar fa-fw"></i> Saturday</a></li>
            </ul>
        </div>
    </div>

@endsection


