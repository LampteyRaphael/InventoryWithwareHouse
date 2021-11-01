@extends ('layouts.master_table')
@section('dashboard')
    <li>
        <p class="navbar-text">Children</p>
    </li>

    <li>
        <p class="navbar-text">
            <a class="btn btn-instagram btn-xs" href="#summary" data-toggle="modal">Summary</a>
        </p>
    </li>
    <li>
        <p class="navbar-text">
            Total&numero; &nbsp;{{$countUsers}}
        </p>
    </li>

@endsection
@section('content')
    @include('includes.alert')
    @include('sweet::alert')
    <div class="modal" id="summary">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"></div>
                <div class="modal-body">
                    <table class="table">

                        <thead>
                        <tr>
                            <th>TOTAL CHILDREN</th>
                            <th>{{$countUsers}}</th>
                        </tr>
                        <tr>
                            <th>Boys</th>
                            <th>Girls</th>
                        </tr>
                        </thead>
                        <tbody >
                        <tr>
                            <td>{{$male}}</td>
                            <td>{{$female}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>


    <div class="table-responsive-sm">
        <div class="panel mb25 shadow">
            <div class="panel-heading no-border">
                <ol class="breadcrumb mb0 no-padding">
                    <li>
                        <a href="{{route('ministry.index')}}">Home</a>
                    </li>
                    <li>
                        <a href="javascript:;">Active Children</a>
                    </li>
                    <li class="active">Data tables</li>
                </ol>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-responsive table-scroll-vertical">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>IMAGES</th>
                            <th>NAME</th>
                            <th>GENDER</th>
                            <th>OFFICE HELD </th>
                            <th>PARENT</th>
                            <th>CONTACT</th>
                            <th>AGE</th>
                        </tr>
                        </thead>
                        <tbody>
                        {!! Form::open(['method'=>'POST','action'=>'Locals\LocalMembersSearchController@childrenSearch'])!!}
                        <div class="form-group col-md-2 pull-left bold">
                            {!! Form::text('search',null,['class'=>'form-control input-sm']) !!}
                        </div>
                        <div class="form-group form-group-sm col-md-2">
                            {!! Form::submit('Search',['class'=>'btn btn-info','placeholder'=>'Search A Child Here!']) !!}
                        </div>
                        <div class="form-group pull-right">
                            <a class="btn btn-primary btn-sm pull-right" href="{{route('childrenExcel')}}">Export to Excel</a>
                        </div>
                        {!! Form::close() !!}
                        @if($users)
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->members_id??''}}</td>
                                    <td><img class="img img-rounded" height="50" width="50" src="{{$user->photo? $user->photo->file :asset('images/placeholder.png')}}" alt=""></td>
                                    <td><a class="btn-link" href="{{route('ministry.show',$user->id)}}">{{strtoupper($user->name)}}</a></td>
                                    <td>{{strtoupper($user->gender)}}</td>
                                    <td>{{strtoupper($user->officeHeld??'')}}</td>
                                    <td>
                                        <span>
                                            @if(empty($user->parents->parent->name??'') || empty($user->parents->name??''))
                                                <a href="#" class="btn-link bg-danger" data-toggle="modal" data-target="#parents">
                                                    <i class="text-danger">ADD PARENT</i>
                                                </a>
                                            @else
                                                <a href="#" class="btn-link bg-danger" data-toggle="modal" data-target="#parents">
                                                  {{strtoupper($user->parents->parent->name ?? $user->parents->name??'')}}
                                                </a>
                                            @endif
                                        </span>
                                    </td>
                                    <td class="text-success font-weight-bolder">{{$user->mobileNumber1??''}}</td>
                                    <td>{{\Carbon\Carbon::parse($user->birthDate)->age}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>IMAGES</th>
                            <th>NAME</th>
                            <th>GENDER</th>
                            <th>OFFICE HELD</th>
                            <th>PARENT</th>
                            <th>CONTACT</th>
                            <th>AGE</th>
                        </tr>
                        </tfoot>
                    </table>
                    <section>
                        <nav>
                            <ul class="pager">
                                @if($users->currentPage() !== 1)
                                    <li class="previous"><a href="{{ $users->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Older</a></li>
                                @endif
                                @if($users->currentPage() !== $users->lastPage() && $users->hasPages())
                                    <li class="next"><a href="{{ $users->nextPageUrl() }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
                                @endif
                            </ul>
                        </nav>
                    </section>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="parents">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">Assign Parent To Your Child</div>
                <div class="modal-body">
                    {!! Form::open(['method'=>'POST','action'=>'Locals\ChildrenMinistryAtLocalController@store2','files'=>true,'class'=>'form-row', 'onsubmit'=>'return confirm("Are You Sure You Want To Update?")'])!!}
                    <div class="row">
                        <input type="text" name="ids" value="" class="form-control">

                        <div class="col-sm-4">
                            <div class="form-group ">
                                {!! Form::label('parentGuardian','Parent/Guardian a Church Member',['class'=>'control-label']) !!}
                                <div class="input-group">
                                    Yes <input type="radio" id="parentGuardian" value='1' name="parent">
                                    No  <input type="radio" id="parentGuardian2" value='2' name="parent">
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-4" id="parent1" >
                            <div class="form-group">
                                {!! Form::label('parentGuardianName','Name of Parent or Guardian',['class'=>'control-label']) !!}
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    {!! Form::text('parentGuardianName',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4" id="parent2">
                            <div class="form-group">
                                {!! Form::label('parentGuardianName2','Name of Parent or Guardian',['class'=>'control-label']) !!}
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    {!! Form::select('parentGuardianName2',[''=>'--Choose Option--']+$parents,null,['class'=>'form-group','id'=>'parentss']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group text-center">
                            {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>

                </div>
                <div class="modal-footer"></div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <script>

        var p1=document.getElementById('parent1');
        var p2=document.getElementById('parent2');
        var parentGuardian=document.getElementById('parentGuardian');
        var parentGuardian2=document.getElementById('parentGuardian2');

        p2.style.display="none";

        parentGuardian.addEventListener('click',function (e) {
            if (parentGuardian.value==='1'){
                p2.style.display="block";
                p1.style.display="none";
            }
        });

        parentGuardian2.addEventListener('click',function (e) {
            if (parentGuardian2.value==='2'){
                p1.style.display="block";
                p2.style.display="none";
            }
        });

        $(document).ready(function() {
            $('#parentss').select2({
                placeholder: "Select Account Name",
                allowClear: true,
            });
        });

        function myFunction() {

            var x=document.getElementById('myInput');

            if (x.type==="password"){
                x.type="text";
            }else {
                x.type="password";
            }
        }

    </script>
@endsection