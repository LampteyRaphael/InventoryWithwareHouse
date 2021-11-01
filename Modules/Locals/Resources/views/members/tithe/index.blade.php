@extends ('layouts.master_table')
@section('dashboard')
    <li>
        <p class="navbar-text">
            Individual Posted Tithe
        </p>
    </li>
@endsection

@section('content')
    @include('includes.form_error')
    @include('includes.alert')
    {{--@include('sweet::alert')--}}
    {!! Form::open(['method'=>'POST','action'=>'Locals\ShowIndividualTitheAtLocalController@index2','class'=>'modal form-row','id'=>'date', 'tabindex'=>'-1','aria-hidden'=>'true','role'=>'dialog'] ) !!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                The Apostolic Church-Ghana
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="date" class="control-label">
                        <div class="input-group col-md-6 col-md-offset-3">
                            <div class="input-group-addon bg-blue"><span class="bold">Year</span></div>
                            {!! Form::date('date',Carbon\Carbon::now(),['class'=>'form-control']) !!}
                            <div class="input-group-addon bg-blue"><i class="fa fa-calendar fa-fw"></i></div>
                        </div>
                    </label>
                </div>
            </div>

            <div class="modal-footer no-border">
                <div class="form-group">
                    {!! Form::submit('Close',['class'=>'btn  btn-danger','data-dismiss'=>'modal']) !!}
                    {!! Form::submit('submit',['class'=>'btn  btn-info']) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    <div class="panel mb25">
            <div class="panel-heading border">
                <ol class="breadcrumb mb0 no-padding">
                    <li>
                        <a href="javascript:;">Individual</a>
                    </li>
                    <li>
                        <a href="javascript:;">Tithe</a>
                    </li>
                    <li class="active">{{$date}}</li>
                    <li><a class="btn btn-xs btn-primary" href="#date" data-toggle="modal">Change Date</a></li>
                </ol>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Posted Date And Time</th>
                            <th>{{Auth::user()->area->currency->symbol??''}}</th>
                            @if(strtolower(Auth::user()->local->name)==='tema c5')
                                <th>ID</th>
                            @else
                                <th>Names</th>
                            @endif
                            <th>Mode Of Payment</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($tithe)

                            @foreach($tithe as $item)
                                @if($item->amount==0.00 ||  $item->amount==0 || $item->amount==null )@else
                                    <tr>
                                    <td>{{$item->created_at? $item->created_at->format('jS F Y'):''}}</td>
                                        <td>{{Auth::user()->area->currency->symbol??''}} {{number_format($item->amount,2)}}</td>
                                        @if(strtolower(Auth::user()->local->name)=='tema c5')
                                            <td>{{$item->user? $item->user->members_id:'UNKNOWN'}}</td>
                                        @else
                                            <td>{{$item->user? $item->user->name:'UNKNOWN'}}</td>
                                        @endif
                                    <td>
                                        @if($item->modeOfPayment==1)
                                            <a  onclick='return ConfirmDelete()'  class="btn btn-info btn-sm" href="{{route('tithe.show',$item->id)}}">{{'cash'}}</a>
                                        @elseif($item->modeOfPayment==2)
                                            <a  onclick='return ConfirmDelete()'  class="btn btn-info btn-sm" href="{{route('tithe.show',$item->id)}}">{{'E-Payment'}}<i class="fa fa-wrench"></i></a>
                                        @elseif($item->modeOfPayment==3)
                                            <a  onclick='return ConfirmDelete()'  class=" btn btn-info btn-sm" href="{{route('tithe.show',$item->id)}}">{{'cheque'}}</a>
                                        @elseif($item->modeOfPayment==5)
                                            <a  onclick='return ConfirmDelete()'  class="btn btn-sm btn-info " href="{{route('tithe.show',$item->id)}}">{{'UNKNOWN TITHE PAID'}}</a>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                            <tr>
                                <td>Total</td>
                                <td>{{Auth::user()->area->currency->symbol??''}} {{number_format($totalTithe,2)}}</td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <script>

        function ConfirmDelete()
        {
            var x = confirm("Are you sure");
            if (x)
                return true;
            else
                return false;
        }

        function ConfirmUpdate()
        {
            var x = confirm("Are you sure you want to update?");
            if (x)
                return true;
            else
                return false;
        }


        function  cashReceived() {
            var x = confirm("Are you sure the cheque goes through? if yes click Ok to stop the person from pending... thank you");
            if (x)
                return true;
            else
                return false;
        }

    </script>
@endsection

