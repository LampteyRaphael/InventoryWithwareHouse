@extends ('layouts.master_table')

@section('dashboard')
    <li>
        <p class="navbar-text">
            Error Log
        </p>
    </li>
@endsection

@section('content')
@include('includes.form_error')
@include('includes.alert')
    <div class="panel mb25 shadow">
            <div class="panel-heading border">
                <ol class="breadcrumb mb0 no-padding">
                    <li>
                        <a href="javascript:;">Error</a>
                    </li>
                    <li>
                        <a href="javascript:;">Logs</a>
                    </li>
                </ol>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped mb0">
                        <thead>
                        <tr>
                            <th>The Admin</th>
                            <th>Reasons</th>
                            <th>Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($log)

                            @foreach($log as $item)
                                <tr>
                                    <td>{{$item->name ?? ''}}</td>
                                    <td>{{$item->details ?? ''}}</td>
                                    <td>{{$item->created_at ?? ''}}</td>
                                    <td>{{$item->created_at->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    {{$log->links()}}
                </div>
            </div>
        </div>



@endsection