@extends ('layouts.master_table')
@section('dashboard')
    <li>
        <p class="navbar-text">
            Chart Room
        </p>
    </li>
@endsection

@section('content')

    @include('includes.form_error')
    @include('includes.alert')
    <div class="col-md-12">
        <div class="col-md-10 col-md-offset-1">
            {{$users->links()}}
            <div class="">
                {!! Form::open(['method'=>'POST','action'=>'Locals\TextFieldController@store'])!!}
                <div class="col-sm-9">
                    <div class="form-group">
                        {!! Form::hidden('user_id',Auth::user()->id,['class'=>'form-control input-sm']) !!}
                        {!! Form::hidden('local_id',Auth::user()->local_id,['class'=>'form-control input-sm']) !!}
                        {!! Form::text('text',null,['class'=>'form-control','rows'=>2]) !!}
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        {!! Form::submit('submit',['class'=>'btn  btn-info']) !!}
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-10 col-md-offset-1">
            <div class="table-responsive">
                <div  style="background: url('{{asset('photos/background.png')}}')">
                    <div class="">
                        <table class="table" style="border: none;background: inherit">
                            <tbody style="border: none; ">
                            @if($users)
                                @foreach($users as $user)

                                    <tr style="border: none">
                                        <div class="row">
                                            <td style="border: none;" class="p-4">
                                                @if ($user->text =="")
                                                @else
                                                    <div class="animated bounceInRight fadeInUp text-center" style="border-radius: 1px 70px  70px 10px;background:white;color:black;font-family: sans-serif; font-weight:bold;padding: 10px;">
                                                        <p>
                                                            <img src="{{$user->photo? $user->photo->file:asset('images/logo 2.png')}}" class="header-avatar img-circle ml10" alt="user" title="user" height="40" width="40">
                                                            {{$user->created_at->diffForHumans() }}
                                                        </p>
                                                        <p style="padding:0 20px; margin:0px">
                                                            {{$user->text}}
                                                        </p>
                                                    </div>
                                                @endif
                                                @if ($user->reply=="")
                                                @else
                                                    <div class="animated bounceInRight fadeInUp text-center" style="border-radius: 1px 70px  70px 10px;background:#dcf8c6;color:black;font-family: sans-serif; font-weight:bold;padding: 10px;">
                                                        <p>
                                                            <img src="{{$user->photo? $user->photo->file:asset('images/logo 2.png')}}" class="header-avatar img-circle ml10" alt="user" title="user" height="40" width="40">
                                                            {{$user->created_at->diffForHumans() }}
                                                        </p>
                                                        <p>
                                                            {{$user->reply}}
                                                        </p>
                                                    </div>
                                                @endif
                                            </td>
                                        </div>
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


   
@endsection



