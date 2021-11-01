@extends ('layouts.master_table')
@section('dashboard')
    <li>
        <p class="navbar-text">
            Tithe Chart Range
        </p>
    </li>
@endsection

@section('content')
    @include('includes.form_error')
    @include('includes.alert')
    {{Session(['date1'=>$date1])}}
    {{Session(['date2'=>$date2])}}

    {!! Form::open(['method'=>'POST','action'=>'Locals\TitheChartController@store2','class'=>'modal form-row','id'=>'date', 'tabindex'=>'-1','aria-hidden'=>'true','role'=>'dialog'] ) !!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                The Apostolic Church-Ghana
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="date" class="control-label">
                        <div class="input-group col-md-6 col-md-offset-3">
                            <div class="input-group-addon bg-blue"><span class="bold">From</span></div>
                            {!! Form::date('date1',$date1,['class'=>'form-control']) !!}
                            <div class="input-group-addon bg-blue"><i class="fa fa-calendar fa-fw"></i></div>
                        </div>
                    </label>
                </div>

                <div class="form-group">
                    <label for="date" class="control-label">
                        <div class="input-group col-md-6 col-md-offset-3">
                            <div class="input-group-addon bg-blue"><span class="bold">To</span></div>
                            {!! Form::date('date2',$date2,['class'=>'form-control']) !!}
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

    <div class="row">
        <div class="panel shadow">
            <div class="panel-heading">
                <ol class="breadcrumb mb0 no-padding">
                    <li>
                        <a href="#">Tithe</a>
                    </li>
                    <li>
                        <a href="#">Tithe Chart</a>
                    </li>
                    <li>
                        <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#date">{{$date}}</a>
                    </li>
                    <li>
                        <a href="#">Data table</a>
                    </li>
                    <li>
                        <a href="{{route('titheCharts.show','TitheRange')}}" class="btn btn-danger btn-xs">Export To PDF</a>
                    </li>
                </ol>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-hover">
                @if(Auth::user()->role->name==='local administrator')
                <thead>
                    <tr>
                        <th>MONTH</th>
                        <th>GROSS {{Auth::user()->area->currency->symbol??''}} </th>
                        <th>60%</th>
                        <th>5%</th>
                        <th>10%</th>
                        <th>25%</th>
                    </tr>
                </thead>
                @else
                    <thead>
                    <tr>
                        <th>MONTH</th>
                        <th>GROSS</th>
                        <th>92%</th>
                        <th>8%</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                @endif
                @if(Auth::user()->role->name==='local administrator')
                   <tbody>
                    <tr>
                        <th>Tithe</th>
                        <td>{{$postTithe}}</td>
                        <td>{{$postTithe*0.6}}</td>
                        <td>{{$postTithe*0.05}}</td>
                        <td>{{$postTithe*0.1}}</td>
                        <td>{{$postTithe*0.25}}</td>
                    </tr>
                    <tr>
                        <th>Thanksgiving Offering</th>
                        <td>{{$taksIdRange}}</td>
                        <td>{{$taksIdRange*0.6}}</td>
                        <td>{{$taksIdRange*0.05}}</td>
                        <td>{{$taksIdRange*0.1}}</td>
                        <td>{{$taksIdRange*0.25}}</td>
                    </tr>
                    </tbody>
                @else
                   <tbody>
                    <tr>
                        <th>Tithe</th>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$postTithe}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$postTithe*0.92}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$postTithe*0.8}}</td>
                        <td>{{$postTithe*0.92+$postTithe*0.8}}</td>
                    </tr>
                    <tr>
                        <th>Thanksgiving Offering</th>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$taksIdRange}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$taksIdRange*0.92}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$taksIdRange*0.8}}</td>
                        <td>{{$taksIdRange*0.92+$taksIdRange*0.8}}</td>
                    </tr>
                    </tbody>
                       <tfoot>
                    <tr>
                        <th>Total</th>
                            <td>{{Auth::user()->area->currency->symbol??''}} {{$taksIdRange+$postTithe}}</td>
                            <td>{{Auth::user()->area->currency->symbol??''}} {{($taksIdRange+$postTithe)*0.92}}</td>
                            <td>{{Auth::user()->area->currency->symbol??''}} {{($taksIdRange+$postTithe)*0.8}}</td>
                             <td>{{Auth::user()->area->currency->symbol??''}}{{($taksIdRange+$postTithe)*0.92+($taksIdRange+$postTithe)*0.8}}</td>
                    </tr>
                    </tfoot>
                @endif
                  
                </table>

            </div>
        </div>
    </div>
@endsection

