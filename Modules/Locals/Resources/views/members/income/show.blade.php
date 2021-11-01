@extends ('layouts.master_table')

@section('dashboard')
    <li>
        <p class="navbar-text">
            Income
        </p>
    </li>
@endsection

@section('content')
    @include('includes.form_error')
    @include('includes.alert')
    <div class="panel collapse" id="post">
        <div class="panel-heading border">
            <ol class="breadcrumb mb0 no-padding">
                <li>
                    <a href="javascript:;">Category</a>
                </li>
                <li>
                    <a href="javascript:;">{{$category->name}}</a>
                </li>
            </ol>
        </div>
        <div class="panel-body">
            <table class="table table-bordered mb0">
                <tbody>
                {!! Form::open(['method'=>'POST','action'=>'Locals\IncomeController@store'] ) !!}
                <div class="form-group">
                    {!! Form::label('created_at','Select Date Of Entry',['class'=>'control-label']) !!}
                    {!! Form::date('created_at',Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control']) !!}
                </div>

                <tr>
                    {!! Form::hidden('category_id',$category->id,['class'=>'form-control']) !!}
                    {!! Form::hidden('local_id',$ids,['class'=>'form-control','required'=>'required']) !!}
                    <td>
                        <div class="form-group ">
                            {!! Form::label('amount','Amount '. (Auth::user()->area->currency->symbol??''),['class'=>'control-label']) !!}
                            {!! Form::number('amount',null,['class'=>'form-control','step'=>'any','required'=>'required']) !!}
                        </div>
                    </td>
                    <td>
                        <div class="form-group ">
                            {!! Form::label('description','Description',['class'=>'control-label']) !!}
                            {!! Form::text('description',null,['class'=>'form-control']) !!}
                        </div>
                    </td>
                    <td>
                        {!! Form::submit('submit',['class'=>'btn  btn-info']) !!}
                        {!! Form::button('Close',['class'=>'btn  btn-danger','data-toggle'=>"collapse","data-target"=>"#post"]) !!}
                    </td>
                </tr>
                {!! Form::close() !!}
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel mb25">
            <div class="panel-heading border">
                <ol class="breadcrumb mb0 no-padding">
                    <li>
                        <a href="{{route('category.index')}}">{{$category->name}}</a>
                    </li>
                    <li>
                        <a href="javascript:;">Sub Category Amount</a>
                    </li>
                    <li>
                        <a href="#post" data-toggle="collapse"  class=" btn btn-info btn-xs">Post Amount</a>
                    </li>
                </ol>
            </div>
            <div class="panel-body">
                <table class="table table-striped mb0 mt0">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>{{Auth::user()->area->currency->symbol??''}}</th>
                        <th>Description</th>
                        <th>Error Correction</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($categoryAll)
                        @foreach($categoryAll as $item)
                            <tr>
                                @if($item->amount==0.00)
                                @else
                                <td>{{Carbon\Carbon::parse($item->created_at)->format('jS-F-Y')}}</td>
                                <td>{{Auth::user()->area->currency->symbol??''}}  {{number_format($item->amount,2)}}</td>
                                <td>{{$item->description}}</td>
                                <td><a href="{{route('income.edit',$item->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a></td>
                                @endif
                            </tr>
                        @endforeach
                            <tr>
                            <td>Total</td>
                            <td style="font-size:1em;">
                             {{Auth::user()->area->currency->symbol}}  &nbsp;  {{number_format($categoryAllTotal,2)}}
                            </td>
                            <td colspan="2"></td>
                        </tr>
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
@endsection