@extends ('layouts.master_table')
@section('dashboard')
{{--    <li>--}}
{{--    <p class="navbar-text">Active Members</p>--}}
{{--    </li>--}}
{{--    <li>--}}
{{--    <p class="navbar-text">--}}
{{--    Total  {{$countUsers}}--}}
{{--    </p>--}}
{{--    </li>--}}

@endsection
@section('content')
    @include('includes.form_error')
    @include('includes.alert')
{{--        <div class="row table-responsive">--}}
{{--            <div class="panel shadow mb25">--}}
{{--                <div class="panel-heading no-border">--}}
{{--                    <ol class="breadcrumb mb0 no-padding">--}}
{{--                        <li>--}}
{{--                            <a href="{{route('local.index')}}">Home</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="javascript:">Active Users</a>--}}
{{--                        </li>--}}
{{--                        <li class="active">Data tables</li>--}}
{{--                    </ol>--}}
{{--                </div>--}}
{{--                <div class="panel-body">--}}
{{--                    <div class="table-responsive">--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    <div class="card shadow p-3 mb-5 bg-white rounded">
{{--        <h5 class="card-header label-success">Featured</h5>--}}
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
{{--            <p class="card-text">--}}
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-users large text-success"></i> Active Members</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-users large text-danger"></i> None Active Members</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-users large text-warning"></i> Deceased Members</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <table class="table" id="data-table" >
                        <thead>
                        <tr>
                            <div class="form-group pull-left" style="padding: 0px; margin: 0px;">
                                <a class="btn btn-success btn-xs" href="{{route('storeExcel')}}">Export to Excel</a>
                                <a class="btn btn-primary btn-xs" href="{{route('LocalImport.create')}}">Import</a>
                            </div>
                            <span class="pull-right">
                            {!! Form::open(['method'=>'POST','action'=>'Locals\LocalMembersSearchController@store'] ) !!}
                                {!! Form::text('search',null,['class'=>'btn-info bold','required'=>'required','style'=>"background-color: white; color: black", 'placeholder'=>'Search here']) !!}
                            <button type="submit" class="btn btn-xs btn-danger">search</button>
                            {!! Form::close() !!}
                        </span>
                        </tr>
                        <tr>
                            <th>MEMBERSHIP ID</th>
                            <th>IMAGES</th>
                            @if(strtolower(Auth::user()->local->name)==='tema c5')@else
                                <th>NAME</th>
                            @endif
                            <th>GENDER</th>
                            @if(Auth::user()->role->name==='local administrator')
                                <th>MOBILE 1</th>
                            @else
                                <th>CELL PHONE</th>
                            @endif

                            <th>YEARS IN THE CHURCH.</th>
                            <th>OFFICE HELD </th>
                            <th>AGE</th>
                            <th>Status</th>
                        </tr>
                            <tr>
                                <th><input class="form-control" type="text" name="name"></th>
                                <th><input class="form-control" type="text" name="name"></th>
                                <th><input class="form-control" type="text" name="name"></th>
                                <th><input class="form-control" type="text" name="name"></th>
                                <th><input class="form-control" type="text" name="name"></th>
                                <th><input class="form-control" type="text" name="name"></th>
                                <th><input class="form-control" type="text" name="name"></th>
                                <th><input class="form-control" type="text" name="name"></th>
                                <th colspan='3'></th>
                            </tr>
                        </thead>
                        <tbody>


                        @if($users)
                            @foreach($users as $user)
                                <tr>
                                    <td class="badge badge-pill badge-danger large bold">{{$user->members_id}}</td>
                                    <td>
                                        <img class="img-rounded" height="50" width="50" src="{{$user->photo? $user->photo->file :asset('images/placeholder.png') }}" alt="">
                                    </td>
                                    @if(strtolower(Auth::user()->local->name)==='tema c5')@else
                                        <td><a class="btn-link" href="{{route('registration.show',$user->id)}}">{{strtoupper($user->name)}}</a></td>
                                    @endif

                                    <td>{{strtoupper($user->gender? $user->gender:'')}}</td>
                                    <td>{{$user->mobileNumber1? $user->mobileNumber1:''}}</td>
                                    <td>{{strtoupper(Carbon\Carbon::now()->parse(str_replace('/','-',$user->datejoinchurch))->diff(Carbon\Carbon::now())
                                             ->format('%y years,%m months,%d days'))}}</td>

                                    <td class="badge badge-warning rounded-pill">{{strtoupper($user->officeHeld)}}</td>

                                    <td>{{Carbon\Carbon::parse(date("Y-m-d", strtotime($user->birthDate)))->age}}</td>
                                    <td><span class='badge badge-success rounded-pill'>{{ $user->is_active==1? 'Active':'Not Active' }}</span></td>

                                    <td><a class="btn btn-primary btn-xs" href="{{route('registration.show',$user->id)}}"><i class="fa fa-edit"></i></a></td>

                                    <td><a class="btn btn-default btn-xs" href="{{route('localIndividualT',$user->id)}}">Tithe</a></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot class="">
                        <tr>
                            <th>MEMBERSHIP ID</th>
                            <th>IMAGES</th>
                            @if(strtolower(Auth::user()->local->name)==='tema c5')@else
                                <th>NAME</th>
                            @endif
                            <th>GENDER</th>
                            @if(Auth::user()->role->name =='im local administrator')
                                <th>Cell Phone</th>
                            @else
                                <th>MOBILE. 1</th>
                            @endif
                            <th>YEARS IN THE CHURCH.</th>
                            <th>OFFICE HELD </th>
                            <th>AGE</th>
                        </tr>
                        </tfoot>
                    </table>
                    <span class="pull-left">{{$users->links()}}</span>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">..3.</div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...4</div>
            </div>
{{--            </p>--}}
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>

        <script type="text/javascript">
            function ConfirmUpdate()
            {
                var x = confirm("Are you sure you want to view the person profile");
                if (x)
                    return true;
                else
                    return false;
            }

            function ConfirmDelete()
            {
                var x = confirm("Are you sure you want to delete?");
                if (x)
                    return true;
                else
                    return false;
            }



            $('document').ready(function(){

              fetch_data($query=""){
                  $.ajax({

                      url:{{ route("members-search") }},
                      method:'GET',
                      data:{query},
                      dataType:'json',
                      success:function(){
                          $('body').html(data.table_data)
                      }
                  });
              }

            });


        </script>
@endsection