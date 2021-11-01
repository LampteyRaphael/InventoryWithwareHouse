@extends ('layouts.master_table')
@section('dashboard')
    <li>
        <p class="navbar-text">
            <a class="btn-primary btn-sm" href="{{route('registration.index')}}">Home</a>
        </p>
    </li>
@endsection
@section('content')
    @include('includes.form_error')
    @include('includes.alert')
    <div class="table-responsive">
        <div class="panel mb25">
            <div class="panel-heading border">
               Import data from excel
            </div>
            <div class="panel-body">
                <a class="btn btn-success" href="{{route('LocalImport.show',1)}}">Download Template</a>
                {!! Form::open(['method'=>'POST','action'=>'Locals\ExportController@store','files'=>true,'class'=>'form-row'])!!}
                <h4>Import From Excel</h4>
                <header class="text-danger">Download the template and follow the way it has been arranged.<u class="success">Do not edit the heading of the template</u>
    <br>Use the membership Data Form To do the entries. Use the system input form to provide some of the information.
</header>

                <div class="col-md-12">
                    <div class="form-group ">
                        {!! Form::label('file','File Name',['class'=>'control-label bold']) !!}
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-area-chart"></i></div>
                            {!! Form::file('file',null,['class'=>'form-control','required'=>'required']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="row">
        @if(session()->has('failures'))
            <table class="table table-danger">
                <tr>
                    <th>Row</th>
                    <th>Attribute</th>
                    <th>Errors</th>
                    <th>Value</th>
                </tr>

                @foreach(session()->get('failures') as $validation)
                <tr>
                    <td>
                        {{$validation->row()}}
                    </td>
                    <td>
                        {{$validation->attribute()}}
                    </td>
                    <td>
                        <ul>
                            @foreach($error->errors() as $e)
                                <li>{{$e}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        {{$validation->values()[$validation->attribute()]}}
                    </td>
                </tr>
                @endforeach
            </table>
        @endif
    </div>

@endsection