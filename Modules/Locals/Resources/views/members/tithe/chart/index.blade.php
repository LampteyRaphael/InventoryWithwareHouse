@extends ('layouts.master_table')
@section('dashboard')
    <li>
        <p class="navbar-text">
           Yearly Tithe Chart
        </p>
    </li>
@endsection

@section('content')
    @include('includes.form_error')
    @include('includes.alert')
    {{Session(['chartYear'=>$year])}}
    {!! Form::open(['method'=>'POST','action'=>'Locals\TitheChartController@store','class'=>'modal form-row','id'=>'date', 'tabindex'=>'-1','aria-hidden'=>'true','role'=>'dialog'] ) !!}
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
                            {!! Form::selectYear('year',2017,\Carbon\Carbon::now()->year,\Carbon\Carbon::now()->year,['class'=>'form-control']) !!}
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
<div class="table-responsive">
    <div class="panel shadow">
        <div class="panel-heading">
            <ol class="breadcrumb mb0 no-padding">
                <li>
                    <a href="#">tithe</a>
                </li>
                <li>
                    <a href="#">Chart</a>
                </li>
                <li>
                    <a class="btn btn-default btn-xs" href="#" data-toggle="modal" data-target="#date">{{$year}}</a>
                </li>
                <li>
                    <a href="#">Data table</a>
                </li>
                <li>
                    <a class="btn btn-default btn-xs" href="{{route('titheCharts.edit','exporting..')}}">Export To Excel</a>
                </li>
            </ol>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                @if(Auth::user()->role->name==='local administrator')
                    <thead class="text-center">
                    <tr>
                        <th>MONTH</th>
                        <th colspan="3">GROSS {{Auth::user()->area->currency->symbol??''}} </th>
                        <th colspan="3">60%</th>
                        <th colspan="3">5%</th>
                        <th colspan="3">10%</th>
                        <th colspan="3">25%</th>
                    </tr>
                    <tr>
                        <th>MONTH</th>
                        <th>Tithe</th>
                        <th>Thanksgiving</th>
                        <th>Total</th>
                        <th>Tithe</th>
                        <th>Thanksgiving</th>
                        <th>Total</th>
                        <th>Tithe</th>
                        <th>Thanksgiving</th>
                        <th>Total</th>
                        <th>Tithe</th>
                        <th>Thanksgiving</th>
                        <th>Total</th>
                        <th>Tithe</th>
                        <th>Thanksgiving</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                @else
                    <thead class="text-center">
                    <tr>
                        <th>MONTH</th>
                        <th colspan="3">GROSS</th>
                        <th colspan="">92%</th>
                        <th colspan="3">8%</th>
                    </tr>
                    <tr>
                        <th>MONTH</th>
                        <th>Tithe</th>
                        <th>Thanksgiving</th>
                        <th>Total</th>
                        <th>Tithe</th>
                        <th>Thanksgiving</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    @endif
                    
                    @if(Auth::user()->role->name==='local administrator')
                 <tbody>
                    <tr>
                        <th>January</th>
                        <td>{{$postTithe}}</td>
                        <td>{{$thanksgiving1}}</td>
                        <td>{{$postTithe+$thanksgiving1}}</td>
                        <td>{{$postTithe*0.6}}</td>
                        <td>{{$thanksgiving1*0.6}}</td>
                        <td>{{($postTithe+$thanksgiving1)*0.6}}</td>
                        <td>{{$postTithe*0.05}}</td>
                        <td>{{$thanksgiving1*0.05}}</td>
                        <td>{{($postTithe+$thanksgiving1)*0.05}}</td>
                        <td>{{$postTithe*0.1}}</td>
                        <td>{{$thanksgiving1*0.1}}</td>
                        <td>{{($postTithe+$thanksgiving1)*0.1}}</td>
                        <td>{{$postTithe*0.25}}</td>
                        <td>{{$thanksgiving1*0.25}}</td>
                        <td>{{($postTithe+$thanksgiving1)*0.25}}</td>
                    </tr>
                    <tr>
                        <th>February</th>
                        <td>{{$fpostTithe}}</td>
                        <td>{{$thanksgiving2}}</td>
                        <td>{{($fpostTithe+$thanksgiving2)}}</td>
                        <td>{{$fpostTithe*0.6}}</td>
                        <td>{{$thanksgiving2*0.6}}</td>
                        <td>{{($fpostTithe+$thanksgiving2)*0.6}}</td>
                        <td>{{$fpostTithe*0.05}}</td>
                        <td>{{$thanksgiving2*0.05}}</td>
                        <td>{{($fpostTithe+$thanksgiving2)*0.05}}</td>
                        <td>{{$fpostTithe*0.1}}</td>
                        <td>{{$thanksgiving2*0.1}}</td>
                        <td>{{($fpostTithe+$thanksgiving2)*0.1}}</td>
                        <td>{{$fpostTithe*0.25}}</td>
                        <td>{{$thanksgiving2*0.25}}</td>
                        <td>{{($fpostTithe+$thanksgiving2)*0.25}}</td>
                    </tr>
                    <tr>
                        <th>March</th>
                        <td>{{$mfpostTithe}}</td>
                        <td>{{$thanksgiving3}}</td>
                        <td>{{($mfpostTithe+$thanksgiving3)}}</td>
                        <td>{{$mfpostTithe*0.6}}</td>
                        <td>{{$thanksgiving3*0.6}}</td>
                        <td>{{($mfpostTithe+$thanksgiving3)*0.6}}</td>
                        <td>{{$mfpostTithe*0.05}}</td>
                        <td>{{$thanksgiving3*0.05}}</td>
                        <td>{{($mfpostTithe+$thanksgiving3)*0.05}}</td>
                        <td>{{$mfpostTithe*0.1}}</td>
                        <td>{{$thanksgiving3*0.1}}</td>
                        <td>{{($mfpostTithe+$thanksgiving3)*0.1}}</td>
                        <td>{{$mfpostTithe*0.25}}</td>
                        <td>{{$thanksgiving3*0.25}}</td>
                        <td>{{($mfpostTithe+$thanksgiving3)*0.25}}</td>
                    </tr>
                    <tr>
                        <th>April</th>
                        <td>{{$afpostTithe}}</td>
                        <td>{{$thanksgiving4}}</td>
                        <td>{{($afpostTithe+$thanksgiving4)}}</td>
                        <td>{{$afpostTithe*0.6}}</td>
                        <td>{{$thanksgiving4*0.6}}</td>
                        <td>{{($afpostTithe+$thanksgiving4)*0.6}}</td>
                        <td>{{$afpostTithe*0.05}}</td>
                        <td>{{$thanksgiving4*0.05}}</td>
                        <td>{{($afpostTithe+$thanksgiving4)*0.05}}</td>
                        <td>{{$afpostTithe*0.1}}</td>
                        <td>{{$thanksgiving4*0.1}}</td>
                        <td>{{($afpostTithe+$thanksgiving4)*0.1}}</td>
                        <td>{{$afpostTithe*0.25}}</td>
                        <td>{{$thanksgiving4*0.25}}</td>
                        <td>{{($afpostTithe+$thanksgiving4)*0.25}}</td>
                    </tr>
                    <tr>
                        <th>May</th>
                        <td>{{$myfpostTithe}}</td>
                        <td>{{$thanksgiving5}}</td>
                        <td>{{($myfpostTithe+$thanksgiving5)}}</td>
                        <td>{{$myfpostTithe*0.6}}</td>
                        <td>{{$thanksgiving5*0.6}}</td>
                        <td>{{($myfpostTithe+$thanksgiving5)*0.6}}</td>
                        <td>{{$myfpostTithe*0.05}}</td>
                        <td>{{$thanksgiving5*0.05}}</td>
                        <td>{{($myfpostTithe+$thanksgiving5)*0.05}}</td>
                        <td>{{$myfpostTithe*0.1}}</td>
                        <td>{{$thanksgiving5*0.1}}</td>
                        <td>{{($myfpostTithe+$thanksgiving5)*0.1}}</td>
                        <td>{{$myfpostTithe*0.25}}</td>
                        <td>{{$thanksgiving5*0.25}}</td>
                        <td>{{($myfpostTithe+$thanksgiving5)*0.25}}</td>
                    </tr>
                    <tr>
                        <th>June</th>
                        <td>{{$jfpostTithe}}</td>
                        <td>{{$thanksgiving5}}</td>
                        <td>{{($jfpostTithe+$thanksgiving5)}}</td>
                        <td>{{$jfpostTithe*0.6}}</td>
                        <td>{{$thanksgiving5*0.6}}</td>
                        <td>{{($jfpostTithe+$thanksgiving5)*0.6}}</td>
                        <td>{{$jfpostTithe*0.05}}</td>
                        <td>{{$thanksgiving5*0.05}}</td>
                        <td>{{($jfpostTithe+$thanksgiving5)*0.05}}</td>
                        <td>{{$jfpostTithe*0.1}}</td>
                        <td>{{$thanksgiving5*0.1}}</td>
                        <td>{{($jfpostTithe+$thanksgiving5)*0.1}}</td>
                        <td>{{$jfpostTithe*0.25}}</td>
                        <td>{{$thanksgiving5*0.25}}</td>
                        <td>{{($jfpostTithe+$thanksgiving5)*0.25}}</td>
                    </tr>
                    <tr>
                        <th>July</th>
                        <td>{{$jyfpostTithe}}</td>
                        <td>{{$thanksgiving6}}</td>
                        <td>{{($jyfpostTithe+$thanksgiving6)}}</td>
                        <td>{{$jyfpostTithe*0.6}}</td>
                        <td>{{$thanksgiving6*0.6}}</td>
                        <td>{{($jyfpostTithe+$thanksgiving6)*0.6}}</td>
                        <td>{{$jyfpostTithe*0.05}}</td>
                        <td>{{$thanksgiving6*0.05}}</td>
                        <td>{{($jyfpostTithe+$thanksgiving6)*0.05}}</td>
                        <td>{{$jyfpostTithe*0.1}}</td>
                        <td>{{$thanksgiving6*0.1}}</td>
                        <td>{{($jyfpostTithe+$thanksgiving6)*0.1}}</td>
                        <td>{{$jyfpostTithe*0.25}}</td>
                        <td>{{$thanksgiving6*0.25}}</td>
                        <td>{{($jyfpostTithe+$thanksgiving6)*0.25}}</td>
                    </tr>
                    <tr>
                        <th>August</th>
                        <td>{{$aufpostTithe}}</td>
                        <td>{{$thanksgiving7}}</td>
                        <td>{{($aufpostTithe+$thanksgiving7)}}</td>
                        <td>{{$aufpostTithe*0.6}}</td>
                        <td>{{$thanksgiving7*0.6}}</td>
                        <td>{{($aufpostTithe+$thanksgiving7)*0.6}}</td>
                        <td>{{$aufpostTithe*0.05}}</td>
                        <td>{{$thanksgiving7*0.05}}</td>
                        <td>{{($aufpostTithe+$thanksgiving7)*0.05}}</td>
                        <td>{{$aufpostTithe*0.1}}</td>
                        <td>{{$thanksgiving7*0.1}}</td>
                        <td>{{($aufpostTithe+$thanksgiving7)*0.1}}</td>
                        <td>{{$aufpostTithe*0.25}}</td>
                        <td>{{$thanksgiving7*0.25}}</td>
                        <td>{{($aufpostTithe+$thanksgiving7)*0.25}}</td>
                    </tr>
                    <tr>
                        <th>September</th>
                        <td>{{$sefpostTithe}}</td>
                        <td>{{$thanksgiving9}}</td>
                        <td>{{($sefpostTithe+$thanksgiving9)}}</td>
                        <td>{{$sefpostTithe*0.6}}</td>
                        <td>{{$thanksgiving9*0.6}}</td>
                        <td>{{($sefpostTithe+$thanksgiving9)*0.6}}</td>
                        <td>{{$sefpostTithe*0.05}}</td>
                        <td>{{$thanksgiving9*0.05}}</td>
                        <td>{{($sefpostTithe+$thanksgiving9)*0.05}}</td>
                        <td>{{$sefpostTithe*0.1}}</td>
                        <td>{{$thanksgiving9*0.1}}</td>
                        <td>{{($sefpostTithe+$thanksgiving9)*0.1}}</td>
                        <td>{{$sefpostTithe*0.25}}</td>
                        <td>{{$thanksgiving9*0.25}}</td>
                        <td>{{($sefpostTithe+$thanksgiving9)*0.25}}</td>
                    </tr>
                    <tr>
                        <th>October</th>
                        <td>{{$ocfpostTithe}}</td>
                        <td>{{$thanksgiving10}}</td>
                        <td>{{$ocfpostTithe+$thanksgiving10}}</td>
                        <td>{{$ocfpostTithe*0.6}}</td>
                        <td>{{$thanksgiving10 *0.6}}</td>
                        <td>{{($ocfpostTithe+$thanksgiving10)*0.6}}</td>
                        <td>{{$ocfpostTithe*0.05}}</td>
                        <td>{{$thanksgiving10*0.05}}</td>
                        <td>{{($ocfpostTithe+$thanksgiving10)*0.05}}</td>
                        <td>{{$ocfpostTithe*0.1}}</td>
                        <td>{{$thanksgiving10*0.1}}</td>
                        <td>{{($ocfpostTithe+$thanksgiving10)*0.1}}</td>
                        <td>{{$ocfpostTithe*0.25}}</td>
                        <td>{{$thanksgiving10*0.25}}</td>
                        <td>{{($ocfpostTithe+$thanksgiving10)*0.25}}</td>
                    </tr>
                    <tr>
                        <th>November</th>
                        <td>{{$novfpostTithe}}</td>
                        <td>{{$thanksgiving11}}</td>
                        <td>{{$novfpostTithe+$thanksgiving11}}</td>
                        <td>{{$novfpostTithe*0.6}}</td>
                        <td>{{$thanksgiving11*0.6}}</td>
                        <td>{{($novfpostTithe+$thanksgiving11)*0.6}}</td>
                        <td>{{$novfpostTithe*0.05}}</td>
                        <td>{{$thanksgiving11*0.05}}</td>
                        <td>{{($novfpostTithe+$thanksgiving11)*0.05}}</td>
                        <td>{{$novfpostTithe*0.1}}</td>
                        <td>{{$thanksgiving11*0.1}}</td>
                        <td>{{($novfpostTithe+$thanksgiving11)*0.1}}</td>
                        <td>{{$novfpostTithe*0.25}}</td>
                        <td>{{$thanksgiving11*0.25}}</td>
                        <td>{{($novfpostTithe+$thanksgiving11)*0.25}}</td>
                    </tr>
                    <tr>
                        <th>December</th>
                        <td>{{$decfpostTithe}}</td>
                        <td>{{$thanksgiving12}}</td>
                        <td>{{($decfpostTithe+$thanksgiving12)}}</td>
                        <td>{{$decfpostTithe*0.6}}</td>
                        <td>{{$thanksgiving12*0.6}}</td>
                        <td>{{($decfpostTithe+$thanksgiving12)*0.6}}</td>
                        <td>{{$decfpostTithe*0.05}}</td>
                        <td>{{$thanksgiving12*0.05}}</td>
                        <td>{{($decfpostTithe+$thanksgiving12)*0.05}}</td>
                        <td>{{$decfpostTithe*0.1}}</td>
                        <td>{{$thanksgiving12*0.1}}</td>
                        <td>{{($decfpostTithe+$thanksgiving12)*0.1}}</td>
                        <td>{{$decfpostTithe*0.25}}</td>
                        <td>{{$thanksgiving12*0.25}}</td>
                        <td>{{($decfpostTithe+$thanksgiving12)*0.25}}</td>
                    </tr>
                    </tbody>
                    @else
                     <tbody>
                    <tr>
                        <th>January</th>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$postTithe}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving1}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$postTithe+$thanksgiving1}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$postTithe*0.92}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving1*0.8}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$postTithe*0.92+$thanksgiving1*0.8}}</td>
                    </tr>
                    <tr>
                        <th>February</th>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$fpostTithe}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving2}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{($fpostTithe+$thanksgiving2)}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$fpostTithe*0.92}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving2*0.8}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$fpostTithe*0.92+$thanksgiving2*0.8}}</td>
                    </tr>
                    <tr>
                        <th>March</th>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$mfpostTithe}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving3}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{($mfpostTithe+$thanksgiving3)}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$mfpostTithe*0.92}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving3*0.8}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$mfpostTithe*0.92+$thanksgiving3*0.8}}</td>
                    </tr>
                    <tr>
                        <th>April</th>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$afpostTithe}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving4}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{($afpostTithe+$thanksgiving4)}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$afpostTithe*0.92}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving4*0.8}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$afpostTithe*0.92+$thanksgiving4*0.8}}</td>
                    </tr>
                    <tr>
                        <th>May</th>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$myfpostTithe}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving5}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{($myfpostTithe+$thanksgiving5)}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$myfpostTithe*0.92}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving5*0.8}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$myfpostTithe*0.92+$thanksgiving5*0.8}}</td>
                    </tr>
                    <tr>
                        <th>June</th>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$jfpostTithe}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving5}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{($jfpostTithe+$thanksgiving5)}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$jfpostTithe*0.92}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving5*0.8}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$jfpostTithe*0.92+$thanksgiving5*0.8}}</td>
                    </tr>
                    <tr>
                        <th>July</th>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$jyfpostTithe}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving6}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{($jyfpostTithe+$thanksgiving6)}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$jyfpostTithe*0.92}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving6*0.8}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$jyfpostTithe*0.92+$thanksgiving6*0.8}}</td>
                    </tr>
                    <tr>
                        <th>August</th>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$aufpostTithe}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving7}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{($aufpostTithe+$thanksgiving7)}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$aufpostTithe*0.92}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving7*0.8}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$aufpostTithe*0.92+$thanksgiving7*0.8}}</td>
                    </tr>
                    <tr>
                        <th>September</th>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$sefpostTithe}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving9}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{($sefpostTithe+$thanksgiving9)}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$sefpostTithe*0.92}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving9*0.8}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$sefpostTithe*0.92+$thanksgiving9*0.8}}</td>
                    </tr>
                    <tr>
                        <th>October</th>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$ocfpostTithe}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving10}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$ocfpostTithe+$thanksgiving10}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$ocfpostTithe*0.92}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving10*0.8}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$ocfpostTithe*0.92+$thanksgiving10*0.8}}</td>
                    </tr>
                    <tr>
                        <th>November</th>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$novfpostTithe}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving11}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$novfpostTithe+$thanksgiving11}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$novfpostTithe*0.92}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving11*0.8}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$novfpostTithe*0.92+$thanksgiving11*0.8}}</td>
                    </tr>
                    <tr>
                        <th>December</th>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$decfpostTithe}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving12}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{($decfpostTithe+$thanksgiving12)}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$decfpostTithe*0.92}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{$thanksgiving12*0.8}}</td>
                        <td>{{Auth::user()->area->currency->symbol??''}} {{($decfpostTithe*0.92+$thanksgiving12*0.8)}}</td>
                    </tr>
                    </tbody>
                    @endif
                   
                </table>
            </div>
        </div>
    </div>
</div>

</div>
@endsection

