@extends ('layouts.master_table')

@section('dashboard')
<li>
    <p class="navbar-text">
        Daily Account Statement
    </p>
</li>
@endsection

@section('content')
        {!! Form::open(['method'=>'POST','action'=>'Locals\PostCurrentController@request','class'=>'modal form-inline','id'=>'date', 'tabindex'=>'-1','aria-hidden'=>'true','role'=>'dialog'] ) !!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    The Apostolic Church-Ghana
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="date" class="control-label">
                            <div class="input-group">
                                <div class="input-group-addon bg-blue"><span class="bold">Date</span></div>
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


        <div class="collapse" id="current">

            <div class="panel">
                <div class="panel-heading">{{$date}} Income Statement</div>
                <div class="panel-body">
                    <div class="table-responsive">
                         <table class="table table-bordered table-hover">
                             <thead>
                             <tr>
                                 <th>INCOME CATEGORIES</th>
                                 <th>BREAKDOWN</th>
                                 <th>{{Auth::user()->area->currency->symbol??''}}</th>
                             </tr>
                             </thead>
                         <tbody>
                         @foreach($incomeCategory as $item)
                             <tr>
                                 <td style="color: blue">{{$item->name}}</td>
                                 <td>
                                   @foreach($a=App\income::where("local_id",Auth::user()->local_id)->where('category_id',$item->id)->whereYear('created_at',$year)->whereMonth('created_at',$month)
                                     ->whereDay('created_at',$day)
                                     ->get(['amount','description','created_at']) as $value)

                                     <ul class="list-inline">
                                         <li class="list-inline-item">
                                             {{$value->created_at->format('jS F,Y') }}
                                         </li>
                                         <li class="list-inline-item">
                                             {{$value->description}}
                                         </li>
                                         <li class="list-inline-item">
                                             {{$value->amount}}
                                         </li>
                                     </ul>

                                       @endforeach
                                 </td>
                                 <td>
                                  {{number_format((App\income::where("local_id",Auth::user() ->local_id)->where('category_id',$item->id)
                                    ->whereYear('created_at',$year)
                                    ->whereMonth('created_at',$month)
                                    ->whereDay('created_at',$day)
                                    ->pluck('amount')->sum()),2)}}
                                 </td>

                             </tr>

                         @endforeach
                         <tr>
                             <td style="color: blue">
                                 Tithe
                             </td>
                             <td></td>

                             <td>
                                 {{number_format($totalTithe,2)}}
                             </td>
                         </tr>

                         <tr>
                             <td style="color: blue">Donation</td>
                             <td></td>
                             <td>{{number_format($donation,2)}}</td>
                         </tr>

                         </tbody>
                         <tfoot>

                         <tr>
                             <td>TOTAL</td>
                             <td></td>
                             <td>{{number_format($total=$incomeCategoryTotal+$totalTithe+$donation,2)}}</td>
                         </tr>
                         </tfoot>
                         </table>
                    </div>
                </div>
            </div>

            {{--ENDING OF INCOME STATEMENT--}}
            <div class="panel">
                <div class="panel-heading">Expenditure Statement</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>EXPENDITURE CATEGORIES</th>
                                <th>BREAKDOWN</th>
                                <th>{{Auth::user()->area->currency->symbol??''}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($expenditureCategory as $item1)

                                <tr>
                                    <td style="color: blue">{{$item1->name}}</td>

                                    <td>
                                        @foreach($a=App\Expenditure::where("local_id",Auth::user()
                                        ->local_id)->where('category_id',$item1->id)
                                        ->whereYear('created_at',$year)
                                        ->whereMonth('created_at',$month)
                                        ->whereDay('created_at',$day)
                                        ->get(['amount','description','created_at']) as $value)

                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    {{$value->created_at->format('jS F,Y') }}
                                                </li>
                                                <li class="list-inline-item">
                                                    {{$value->description}}
                                                </li>
                                                <li class="list-inline-item">
                                                    {{"GHS".$value->amount}}
                                                </li>
                                            </ul>
                                        @endforeach
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li  class="list-inline-item">
                                                {{number_format((App\Expenditure::where("local_id",Auth::user()
                                             ->local_id)->where('category_id',$item1->id)
                                             ->whereYear('created_at',$year)
                                             ->whereMonth('created_at',$month)
                                             ->whereDay('created_at',$day)
                                             ->pluck('amount')->sum()),2)}}
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>

                            <tr>
                                <td>TOTAL</td>
                                <td> </td>
                                <td>{{number_format($totalExpenditure,2)}}</td>
                            </tr>
                            </tfoot>
                        </table>

                        <table class="table table-bordered table-hover">
                            <tbody>
                            <tr>
                                <th>TOTAL INCOME</th>
                                <td hidden></td>
                                <td>{{number_format($total,2)}}</td>
                            </tr>
                            <tr>
                                <th>TOTAL EXPENDITURE</th>
                                <td hidden></td>
                                <td>{{number_format($totalExpenditure,2)}}</td>
                            </tr>

                            <tr>
                                <th>NET INCOME</th>
                                <td hidden></td>
                                <td>{{number_format($total-$totalExpenditure ,2)}}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

       </div>



        <div class="panel shadow animated slideInDown">
            <div class="panel-heading">
                <ol class="breadcrumb mb0 no-padding">
                    <li>
                        <a href="" class="btn btn-success btn-xs" data-toggle="modal" data-target="#date"><i class="fa fa-calendar"></i>Click Here To Change Date</a>
                    </li>
                    <li>
                        {{$date}}
                    </li>
                    <li>
                        <a class="btn btn-primary btn-xs" href="#current" data-toggle="collapse" data-target="#current">Statement</a>
                    </li>
                    <li>
                        <a class="btn btn-danger btn-xs" href="{{route('dailyPdfs',$date1)}}">PDF</a>
                    </li>
                </ol>
            </div>
            <div class="panel-body">
                <div class="">
                    <div class="">
                        @if($incomeCategory)
                            <table class="table table-bordered table-striped table-warning">
                                <thead>
                                <tr>
                                    <th>INCOME</th>
                                    <th>{{Auth::user()->area->currency->symbol??''}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($incomeCategory as $item)
                                    <?php
                                      $sunIncome=App\income::where("local_id",Auth::user()->local_id)->where('category_id',$item->id)->whereYear('created_at',$year)
                                        ->whereMonth('created_at',$month)
                                        ->whereDay('created_at',$day)
                                        ->pluck('amount')->sum();
                                    ?>
                                    <tr>
                                        @if($sunIncome==0)@else
                                            <td>{{$item->name}}</td>
                                            <td>
                                               {{number_format($sunIncome,2)}}
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                @if($donation==0)
                                 @else
                                <tr>
                                    <td>Donation</td>
                                    <td>{{number_format($donation,2)}}</td>
                                </tr>
                                @endif

                                @if($totalTithe==0)
                                @else
                                    <tr>
                                        <td>Tithe</td>
                                        <td>{{number_format($totalTithe,2)}}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>Total</td>
                                    <td>{{number_format($total=$incomeCategoryTotal+$totalTithe+$donation,2)}}</td>
                                </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="">
                        @if($expenditureCategory)
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                <tr>
                                    <th>EXPENDITURE</th>
                                    <th>{{Auth::user()->area->currency->symbol??''}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($expenditureCategory as $item)
                                    <tr>

                                        <?php
                                          $sumExpenditure=App\Expenditure::where("local_id",Auth::user()->local_id)
                                              ->where('category_id',$item->id)
                                              ->whereYear('created_at',$year)
                                              ->whereMonth('created_at',$month)
                                              ->whereDay('created_at',$day)
                                              ->pluck('amount')->sum()
                                        ?>

                                        @if($sumExpenditure===0)
                                         @else
                                        <td>{{$item->name}}</td>
                                        <td>
                                           {{number_format($sumExpenditure,2)}}
                                        </td>

                                            @endif
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>Total</td>
                                    <td>{{number_format($totalExpenditure,2)}}</td>
                                </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>

                    <div class="">
                        <table class="table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <th>TOTAL INCOME</th>
                                <td>{{number_format($total,2)}}</td>
                            </tr>
                            <tr>
                                <th>TOTAL EXPENDITURE</th>
                                <td>{{number_format($totalExpenditure,2)}}</td>
                            </tr>

                            <tr>
                                <th>NET INCOME</th>
                                <td>{{number_format($total-$totalExpenditure ,2)}}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>



                </div>

            </div>
        </div>
@endsection


