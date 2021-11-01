<!doctype html>
<html>
<head>
    <title>The Apostolic Church Ghana</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>

    h2{
        color:darkblue;
    }

    h3{
        color: red;
    }

    #td1{
        border: none;
    }
    #td2{
        text-align: center;
    }

</style>
<body style="background: white">

<h2 class="text-center"><img src="{{url('/photos/logo 2.png')}}" alt="" height="50" width="50"><u>THE APOSTOLIC CHURCH-GHANA</u></h2>

       <p><h3 class="text-center">{{strtoupper(Auth::user()->local->name. ' ' . 'Assembly')}}</h3></p>
       <p class="text-center">{{Carbon\Carbon::parse($date)->format('F,Y')}} Income And Expenditure</p>

@if($incomeCategory)

    <table class="table">
        <thead>
        <tr>
            <th>INCOME</th>
            <th>{{Auth::user()->area->currency->symbol}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($incomeCategory as $item)
            <?php
            $sunIncome=App\income::where("local_id",Auth::user()
                ->local_id)->where('category_id',$item->id)
                ->whereMonth('created_at',$month)
                ->whereYear('created_at',$year)
                ->pluck('amount')->sum();
            ?>
            @if($sunIncome===0)
            @else
                <tr>
                    <td id="td1">{{$item->name}}</td>
                    <td id="td2">
                        {{$sunIncome}}
                    </td>
                </tr>
            @endif
        @endforeach
        @if($donation==0)
        @else
            <tr>
                <td id="td1">Donation</td>
                <td id="td2">{{$donation}}</td>
            </tr>
        @endif

        @if($totalTithe==0)
        @else
            <tr>
                <td id="td1">Tithe</td>
                <td id="td2">{{$totalTithe}}</td>
            </tr>
        @endif

        <tr>
            <td id="td1">Total</td>
            <td id="td2">{{$totals=$incomeCategoryTotal+$totalTithe+$donation}}</td>
        </tr>
        </tbody>
    </table>
@endif

<br>
@if($expenditureCategory)

    <table class="table">
        <thead>
        <tr>
            <th>EXPENDITURE</th>
            <th>{{Auth::user()->area->currency->symbol}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($expenditureCategory as $item)

            <?php
            $sumExpenditure= App\Expenditure::where("local_id",Auth::user()->local_id)
                ->where('category_id',$item->id)
                ->whereMonth('created_at',$month)
                ->whereYear('created_at',$year)
                ->pluck('amount')->sum();
            ?>

            @if($sumExpenditure===0)
            @else
                <tr>
                    <td id="td1">{{$item->name}}</td>
                    <td id="td2">
                        {{$sumExpenditure}}
                    </td>
                </tr>
            @endif

        @endforeach
        @if($totalExpenditure==0)
        @else
            <tr>
                <td id="td1">Total</td>
                <td id="td2">{{$totalExpenditure}}</td>
            </tr>

        @endif
        </tbody>
    </table>
@endif

<table class="table">
    <tbody>
    <tr>
        <td id="td1">INCOME</td>
        <td id="td2">{{$totals}}</td>
    </tr>
    <tr>
        <td id="td1">EXPENDITURE</td>
        <td id="td2">{{$totalExpenditure}}</td>
    </tr>

    <tr>
        <td id="td1">NET INCOME</th>
        <td id="td2">{{$totals-$totalExpenditure}}</td>
    </tr>
    </tbody>
</table>

</body>
</html>


