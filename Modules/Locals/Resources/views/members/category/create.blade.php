@extends ('layouts.master_table')
@section('dashboard')
<li>
    <p class="navbar-text">
            Income Categories
    </p>
</li>
@endsection

@section('content')
    <div class="row">
        <div class="table-responsive col-md-8 col-md-offset-2">
            @include('includes.form_error')
            @include('includes.alert')
            {{--@include('sweet::alert')--}}
            {!! Form::open(['method'=>'POST','action'=>'Locals\PostYearController@addIncome'] ) !!}
            <div class="panel shadow animated slideInDown">
                <div class="panel-heading">
                    <ol class="breadcrumb mb0 no-padding">
                        <li>
                            <a href="javascript:;">Income Category</a>
                        </li>
                        <li class="active">Post Data</li>
                    </ol>

                </div>
                <div class="panel-body">
                    <div class='table-responsive'>
                        <table class="table table-bordered table-responsive">
                            <tbody>
                            <tr>
                                {!! Form::hidden('local_id',$id,['class'=>'form-control']) !!}

                                    <div class="form-group">
                                        {!! Form::label('created_at','Select Date Of Entry',['class'=>'control-label']) !!}
                                        {!! Form::date('created_at',Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control']) !!}
                                    </div>

                                <div class="form-group">
                                    {!! Form::label('category_id','Select Category',['class'=>'control-label']) !!}
                                    <div class="input-group">
                                        <div class="input-group-addon bg-blue"><i class="glyphicon glyphicon-chevron-down"></i></div>
                                        {!! Form::select('category_id',[''=>'--Choose Option--']+$category,null,['class'=>'form-control income','required'=>'required']) !!}
                                        <div class="input-group-addon bg-blue"><i class="fa fa-search"></i></div>

                                    </div>

                                </div>

                                <td>
                                    <div class="">
                                        {!! Form::label('amount','Amount',['class'=>'control-label']) !!}
                                        <div class="input-group">
                                            <div class="input-group-addon bg-blue">{{Auth::user()->area->currency->symbol??''}}</div>
                                            {!! Form::number('amount',null,['class'=>'form-control','step'=>'any']) !!}
                                            <div class="input-group-addon bg-blue">.00</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="">
                                        {!! Form::label('description','Description',['class'=>'control-label']) !!}
                                        {!! Form::text('description',null,['class'=>'form-control']) !!}
                                    </div>
                                </td>
                            </tr>
                            <tr style="border: none">
                                <td style="border: none">
                                </td>
                                <td colspan="" class="pull-right" style="border: none">
                                    <button type="submit" class="btn btn-info" name="submit" >Submit</button>
                                </td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            {!! Form::close() !!}
        </div>

    </div>

    <script>
        $(document).ready(function() {
            $('.income').select2({
                placeholder: "Select Income Category",
                allowClear: true,
            });
        });
    </script>
@endsection