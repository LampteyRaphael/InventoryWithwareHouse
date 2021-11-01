@extends ('layouts.master_table')
@section('dashboard')
<li>
    <p class="navbar-text">
      Income Categories
    </p>
</li>
@endsection

@section('content')

    @include('includes.form_error')
    @include('includes.alert')
    {{--@include('sweet::alert')--}}
    <script>

        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }

    </script>
    <div class="row">
        <div class="table-responsive col-md-12">
    <div class="panel shadow mb25 collapse" id="i">
        <div class="panel-heading border">
            <ol class="breadcrumb mb0 no-padding">
                <li>
                    <a href="javascript:;">+Add Category</a>
                </li>
            </ol>
        </div>
        <div class="panel-body">
            <table class="table table-striped mb0">
                <tbody>
                {!! Form::open(['method'=>'POST','action'=>'Locals\IncomeCategoryController@store'] ) !!}
                <tr>
                    <td>
                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Category Name','required'=>'required']) !!}
                    </td>
                    <td>{!! Form::hidden('local_id',Auth::user()->local_id,['class'=>'form-control','required'=>'required']) !!}
                    </td>
                    <td>
                        {!! Form::submit('submit',['class'=>'btn  btn-info']) !!}

                        {!! Form::button('Close',['class'=>'btn  btn-danger','data-toggle'=>"collapse","data-target"=>"#i"]) !!}
                    </td>
                </tr>
                {!! Form::close() !!}
                </tbody>
            </table>
        </div>
    </div>
        </div>
    </div>

    <div class="row">
        <div class="table-responsive col-md-12">
    <div class="panel shadow">
        <div class="panel-heading">
            <ol class="breadcrumb mb0 no-padding">
                <li>
                    <a href="javascript:;">Income Category</a>
                </li>
                <li class="active">Data table</li>
                <li>
                    <a href="#i" class="btn btn-primary btn-xs" data-toggle="collapse">+Add new Category</a>
                </li>
            </ol>

        </div>
        <div class="panel-body">
            <div class="table-responsive">
                @if($incomeCategory)

                    <table class="table  table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Categories</th>
                            <th>Total Income</th>
                            <th>Deposit</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($incomeCategory as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                {{--@if($item->name=='Thanksgiving Offering')--}}
                                {{--<td>--}}
                                    {{--{{number_format(((App\income::where("local_id",Auth::user()->local_id)->where('category_id',$item->id)->pluck('amount')->sum())),2)}}--}}
                                {{--</td>--}}
                                    {{--@else--}}
                                    <td>
                                      {{Auth::user()->area->currency->symbol??''}}   {{number_format((App\income::where("local_id",Auth::user()->local_id)->where('category_id',$item->id)->whereYear("created_at",Carbon\Carbon::now()->year)->pluck('amount')->sum()),2)}}
                                    </td>
                                {{--@endif--}}
                                {{--<td>{{$item->created_at->diffForHumans()}}</td>--}}

                                <td>
                                    <a href="{{route('income.show',$item->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                </td>
                                @if($item->local_id==0)
                                <td>
                                    <a href="{{route('category.edit',$item->id)}}" class="btn btn-success btn-xs" disabled="disabled"><i class="fa fa-edit"></i></a>
                                </td>
                                <td>
                                    {!! Form::open(['method'=>'DELETE','action'=>['Locals\IncomeCategoryController@destroy',$item->id],'onsubmit' => 'return ConfirmDelete()'] ) !!}

                                    <button type="submit" name="submit" class="btn btn-danger btn-xs" disabled="disabled"><i class="fa fa-remove"></i></button>
                                    {!! Form::close() !!}
                                </td>
                                    @elseif($item->local_id !==0)
                                    <td>
                                        <a href="{{route('category.edit',$item->id)}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        {!! Form::open(['method'=>'DELETE','action'=>['Locals\IncomeCategoryController@destroy',$item->id],'onsubmit' => 'return ConfirmDelete()'] ) !!}

                                        <button type="submit" name="submit" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></button>
                                        {!! Form::close() !!}
                                    </td>

                                    @endif
                            </tr>
                        @endforeach
                        <tr>
                            <td>Donations</td>
                            <td>{{Auth::user()->area->currency->symbol??''}}  {{number_format($donation,2)}}</td>
                            <td>
                                <a href="{{route('donation/Pledge')}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                            </td>
                            <td>
                                <a href="{{route('category.edit',$item->id)}}" class="btn btn-success btn-xs" disabled="disabled"><i class="fa fa-edit"></i></a>
                            </td>
                            <td>
                                <button type="submit" name="submit" class="btn btn-danger btn-xs" disabled="disabled" ><i class="fa fa-edit"></i></button>
                            </td>
                        </tr>

                        <tr>
                            <td>Tithe</td>
                            <td>{{Auth::user()->area->currency->symbol??''}} {{number_format($t=$tithe,2)}}</td>
                            <td>
                                <a href="{{route('tithe.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                            </td>
                            <td>
                                <a href="{{route('category.edit',$item->id)}}" class="btn btn-success btn-xs" disabled="disabled"><i class="fa fa-edit"></i></a>
                            </td>
                            <td>
                                <button type="submit" name="submit" class="btn btn-danger btn-xs" disabled="disabled" ><i class="fa fa-edit"></i></button>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>Total</td>
                            <td>{{Auth::user()->area->currency->symbol??''}} {{number_format($total+$tithe+$donation,2)}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tfoot>
                    </table>
                @endif
            </div>
        </div>
    </div>

        </div>
    </div>

@endsection