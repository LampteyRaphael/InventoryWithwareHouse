@extends ('layouts.master_table')
@section('dashboard')
    <li>
        <p class="navbar-text">
            Expenditure Categories
        </p>
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="table-responsive col-md-8 col-md-offset-2">
    @include('includes.form_error')
    @include('includes.alert')

    <div class="panel shadow animated slideInDown">
        <div class="panel-heading">
            <ol class="breadcrumb mb0 no-padding">
                <li>
                    <a href="javascript:;">Expenditure Category</a>
                </li>
                <li class="active">Post Data</li>
            </ol>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
            <table class="table table-bordered mb0">
                <tbody>
                {!! Form::open(['method'=>'POST','action'=>'Locals\PostYearController@post'] ) !!}
                <tr>
                    <div class="form-group">
                        {!! Form::label('created_at','Select Date Of Entry',['class'=>'control-label']) !!}
                        {!! Form::date('created_at',Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control']) !!}
                    </div>

                    {!! Form::hidden('local_id',$id,['class'=>'form-control']) !!}

                    <div class="form-group">
                        {!! Form::label('category_id','Select Category',['class'=>'control-label']) !!}
                        {!! Form::select('category_id',[''=>'--Choose Option--']+$category,null,['class'=>'form-control expenditure','required'=>'required']) !!}
                    </div>

                    <td>
                        <div class="form-group ">
                            {!! Form::label('amount','Amount',['class'=>'control-label']) !!}
                            {!! Form::number('amount',null,['class'=>'form-control','step'=>'any']) !!}
                        </div>
                    </td>
                    <td>
                        <div class="form-group ">
                            {!! Form::label('description','Description',['class'=>'control-label']) !!}
                            {!! Form::text('description',null,['class'=>'form-control']) !!}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-info pull-right" name="submit" >Submit</button>
                    </td>
                </tr>
                {!! Form::close() !!}

                </tbody>
            </table>
            </div>
        </div>
    </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.expenditure').select2({
                placeholder: "Select Income Category",
                allowClear: true,
            });
        });
    </script>
@endsection