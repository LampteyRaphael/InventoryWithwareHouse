@extends('layouts.master_table')

@section('dashboard')
    <li>
        <p class="navbar-text">Audit Trail</p>
    </li>
@endsection
@section('content')
    @include('includes.alert')

    <div class="table-responsive">
        <div class="panel mb25">
            <div class="panel-heading border">
                <ol class="breadcrumb mb0 no-padding">
                    <li>
                        <a href="javascript:;">Audit</a>
                    </li>
                    <li>
                        <a href="javascript:;">Trail</a>
                    </li>
                    <li class="active">Data tables</li>
                </ol>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped mb0">
                        <thead>
                        <tr>
                            <th>Admins</th>
                            <th>Detail</th>
                            <th>Date/Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($users)
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->user? $user->user->name:''}}</td>
                                    <td>{{$user->category? $user->category:''}}</td>
                                    <td>
                                        <i class="fa fa-arrow-right"></i>
                                        <span class="text-danger" >
                                         {{$user->user->area->name??''}}
                                        </span>
                                        <i class="fa fa-arrow-right"></i>
                                        <span style="color:darkblue">
                                            {{$user->user->district->name??''}}
                                         </span>
                                        <i class="fa fa-arrow-right"></i>
                                        <span style="color: #010a3b">
                                           {{$user->user->local->name??''}}
                                       </span>
                                    </td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                {{$users->links()}}
            </div>
        </div>
    </div>
@endsection


