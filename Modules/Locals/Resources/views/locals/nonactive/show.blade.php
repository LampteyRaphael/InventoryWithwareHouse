@extends ('layouts.master_table')
@section('dashboard')
    <li>
        <p class="navbar-text">{{ucwords($localName->name)}} Local</p>
    </li>
    <li>
        <p class="navbar-text" style="font-size: 12px;">
            Male &numero; &nbsp;{{$male}}
        </p>
    </li>
    <li>
        <p class="navbar-text" style="font-size: 12px;">
            Female &numero; &nbsp;{{$female}}
        </p>
    </li>

    <li>
        <p class="navbar-text" style="font-size: 12px;">
            Total&numero; &nbsp;{{$countUsers}}
        </p>
    </li>
@endsection
@section('content')
    <div class="">
        <div class="panel mb25">
            <div class="panel-heading border">
                <ol class="breadcrumb mb0 no-padding">
                    <li>
                        <a href="{{route('local.index')}}">Home</a>
                    </li>
                    <li>
                        <a href="javascript:;">New Convert</a>
                    </li>
                    <li class="active">Data tables</li>
                </ol>
            </div>
            <div class="panel-body">
                <div class="">
                    <table class="table table-striped" id="data-table">
                        <thead>
                        <tr>
                            <th>MEMBERSHIP ID</th>
                            <th>IMAGES</th>
                            <th>NAME</th>
                            <th>GENDER</th>
                            <th>YEARS IN THE CHURCH.</th>
                            <th>OFFICE HELD </th>
                            <th>AGE</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($users)
                            @foreach($users as $user)
                                {{--<tr>--}}
                                    {{--<td>{{$user->members_id}}</td>--}}
                                    {{--<td><img class="img-rounded" height="50" width="50" src="{{$user->photo? $user->photo->file :asset('images/placeholder.png')}}" alt=""></td>--}}
                                    {{--<td><a href="{{route('registration.edit',$user->id)}}">{{$user->name}}</a></td>--}}
                                    {{--<td>{{$user->role? $user->role->name: 'User has no role'}}</td>--}}
                                    {{--<td>{{$user->is_active==1? 'Active':'Not Active'}}</td>--}}
                                    {{--<td>{{$user->officeHeld}}</td>--}}
                                    {{--<td>{{\Carbon\Carbon::parse($user->birthDate)->age}}</td>--}}
                                    {{--<td>{{$user->created_at->diffForHumans() }}</td>--}}
                                {{--</tr>--}}
                                <tr>
                                    <td>{{$user->members_id}}</td>
                                    <td>
                                        <img class="img-rounded" height="50" width="50" src="{{$user->photo? $user->photo->file :asset('images/placeholder.png') }}" alt="">
                                    </td>
                                    <td><a class="btn-link" href="{{route('registration.edit',$user->id)}}">{{strtoupper($user->name)}}</a></td>

                                    <td>{{strtoupper($user->gender)}}</td>

                                    <td>{{strtoupper(Carbon\Carbon::now()->parse(str_replace('/','-',$user->datejoinchurch))->diff(Carbon\Carbon::now())
                                 ->format('%y years,%m months,%d days'))}}</td>

                                    <td>{{strtoupper($user->officeHeld)}}</td>

                                    <td>{{\Carbon\Carbon::parse($user->birthDate)->age}}</td>

                                    <td><a class="btn btn-primary btn-xs" href="{{route('registration.edit',$user->id)}}"><i class="fa fa-edit"></i></a></td>

                                    <td>
                                        {!! Form::model($user,['method'=>'DELETE','action'=>['Locals\RegisterLocalMembersController@destroy',$user->id],'onsubmit' => 'return ConfirmDelete()',],['class'=>'form-inline'])!!}
                                        <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-edit"></i></button>
                                        {!! Form::close() !!}
                                        {{--<a class="btn btn-danger btn-xs" href="{{route('registration.edit',$user->id)}}"><i class="fa fa-edit"></i></a>--}}
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <script>
        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
    {{--<script type="text/javascript">--}}
        {{--$(document).ready(function() {--}}
            {{--$(function () {--}}
                {{--$('#data-table').DataTable({--}}
                    {{--processing: true,--}}
                    {{--serverSide: true,--}}
                    {{--ajax:"{{ route('nonactive.show','newconvert') }}",--}}
                    {{--columns: [--}}
                        {{--{data: 'actionA'},--}}
                        {{--// {data:'pictures'},--}}
                        {{--{--}}
                            {{--data:"file",name:"file",--}}

                            {{--render:function (data, type, full, meta) {--}}

                                {{--return  "<img src='{{URL::to('/images')}}" + data + "width='70' class='image-thumbnail'/>";--}}
                                {{--// return  '<img class="img-rounded" height="50" width="50" src=/images/."data".>';--}}
                            {{--}--}}
                        {{--},--}}
                        {{--{data: 'name', name: 'name'},--}}
                        {{--{data: 'actionG'},--}}
                        {{--{data: 'action3'},--}}
                        {{--{data: 'action4'},--}}
                        {{--{data: 'datesOfBirth'},--}}
                        {{--{data: 'action', name: 'action', orderable: true, searchable: true},--}}
                        {{--{data: 'delete', name: 'delete'},--}}
                    {{--]--}}
                {{--});--}}

            {{--});--}}

        {{--});--}}

        {{--{--}}
        {{--data: 'photo_id', name:'photo_id',render:function (data, type, full, meta) {--}}

        {{--return "<img src='{{URL::to('/')}}/images/"--}}

        {{--+ data + "width='70' class='image-thumbnail'/>"--}}
        {{--}--}}
        {{--}--}}

        {{--// orderable: false,--}}

        {{--// },--}}
        {{--function ConfirmDelete()--}}
        {{--{--}}
            {{--var x = confirm("Are you sure you want to delete?");--}}
            {{--if (x)--}}
                {{--return true;--}}
            {{--else--}}
                {{--return false;--}}
        {{--}--}}


    {{--</script>--}}
@endsection



