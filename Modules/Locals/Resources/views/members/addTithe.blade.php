@extends ('layouts.master_table')
@section('dashboard')
    <li>
        <p class="navbar-text">
            Post tithe to individual Account
        </p>
    </li>
@endsection

@section('content')
    @include('includes.form_error')
    @include('includes.alert')
    <div class="row">
        <div class="table-responsive col-md-8 col-md-offset-2">
            <div class="panel shadow animated slideInDown">
                <div class="panel-heading">
                    <ol class="breadcrumb mb0 no-padding">
                        <li>
                            <a href="javascript:;">Post tithe to individual Account</a>
                        </li>
                        <li class="active">Post Data</li>
                    </ol>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                    <span class="pull-left" style="font-size: 12px; font-weight: bold">Select yes for bulk tithe post(
                        {!! Form::label('bulk','Yes',['class'=>'control-label']) !!}
                        <input type="radio" id="bulk" value='1' name="bulk">
                        {!! Form::label('notBult','No',['class'=>'control-label']) !!}
                        <input type="radio" id="notBult" value='2' name="bulk">
                         )
                    </span>
                            <div id="total_amount"  class="pull-right" style="font-size: 12px; font-weight: bold"></div>
                        </div>
                    </div>

                    <div id="form_show" class="col-xs-12">
                        <div class="row">
                            {!! Form::open(['method'=>'POST','action'=>'Locals\SearchTitheController@search','onsubmit' => 'return searchInfo()'])!!}
                            <div class="form-group col-md-3">
                                {!! Form::label('code','Local Code',['class'=>'control-label']) !!}
                                {!! Form::text('code',Auth::user()->local->local_code,['class'=>'form-control','required'=>'required','disabled'=>'disabled']) !!}
                            </div>
                            <div class="form-group col-md-6" id="form-show">
                                {!! Form::label('search','Last Three Digit Of Membership Id/Name/Email',['class'=>'control-label']) !!}
                                {!! Form::text('search',null,['class'=>'form-control','required'=>'required']) !!}
                            </div>

                            <div class="form-group col-md-2" style="padding-top: 20px">
                                {!! Form::submit('Search',['class'=>'btn btn-success']) !!}
                            </div>

                            {!! Form::close() !!}
                        </div>

                        <div class="row" >
                            {!! Form::model($user,['method'=>'POST','action'=>'Locals\PostTitheController@store','onsubmit' => 'return ConfirmDelete()'])!!}

                            <div class="form-group">
                                {!! Form::label('check','Anonymous',['class'=>'control-label']) !!}
                                {!! Form::checkbox('check',1,null,['id'=>'Fictitious']) !!}
                            </div>
                            {{--                  <div class="row">--}}


                            {{--                      <div class="col-md-3">--}}
                            {{--                          {!! Form::label('year','Select Year',['class'=>'control-label']) !!}--}}
                            {{--                          {!! Form::selectYear('year',Carbon\Carbon::now()->year,Carbon\Carbon::now()->year,Carbon\Carbon::now()->year,['class'=>'form-control']) !!}--}}
                            {{--                      </div>--}}
                            {{--                      <div class="col-md-3" id="month1">--}}
                            {{--                          {!! Form::label('month','Select Month',['class'=>'control-label']) !!}--}}
                            {{--                          {!! Form::select('month',[$month1=>$month1,$month2=>$month2],null,['class'=>'form-control']) !!}--}}
                            {{--                      </div>--}}

                            {{--                      <div class="col-md-3">--}}
                            {{--                          {!! Form::label('day','Select Day',['class'=>'control-label']) !!}--}}
                            {{--                          <select name="day" id="step1" class="form-control form-control-lg">--}}
                            {{--                          </select>--}}
                            {{--                      </div>--}}
                            <div class="col-md-12">
                                {!! Form::label('created_at','Select Date',['class'=>'control-label']) !!}
                                {!! Form::date('created_at',Carbon\Carbon::now(),['class'=>'form-control']) !!}
                                {{--                          <select name="day" id="step1" class="form-control form-control-lg">--}}
                                {{--                          </select>--}}
                            </div>
                            {{--                  </div>--}}

                            <div class="form-group bold" id="showFictitious">
                                {!! Form::label('user_id','Account Name',['class'=>'control-label']) !!}
                                <div class="input-group">
                                    <div class="input-group-addon bg-blue"><i class="fa fa-user"></i></div>
                                    {!! Form::select('fictitious',[5=>'UNKNOWN SELECTED TITHE'],5,['class'=>'form-control']) !!}
                                    <div class="input-group-addon bg-blue"><i class="fa fa-user"></i></div>
                                </div>
                            </div>
                            <div class="form-group bold" id="accountName">
                                {!! Form::label('user_id','Account Name',['class'=>'control-label']) !!}
                                <div class="input-group">
                                    <div class="input-group-addon bg-blue"><i class="fa fa-user"></i></div>
                                    {!! Form::select('user_id',[''=>'Select Account Name']+$user,null,['class'=>'form-control accountUser']) !!}
                                    <div class="input-group-addon bg-blue"><i class="fa fa-user"></i></div>
                                </div>
                            </div>
                            <div class="form-group  bold">
                                <div class="">
                                    {!! Form::label('modeOfPayment','Payment Mode',['class'=>'control-label']) !!}
                                    <div class="input-group">
                                        <div class="input-group-addon bg-blue"><i>{{Auth::user()->area->currency->symbol??''}}</i></div>
                                        {!! Form::select('modeOfPayment',[1=>'Cash',2=>'E-Payment',3=>'Cheque'],1,['class'=>'form-control','required'=>'required','id'=>'modeofpayment']) !!}
                                        <div class="input-group-addon bg-blue"><i class="fa fa-money"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group bold" id='dateOfCheque'>
                                {!! Form::label('dateOfCheque','Date Written On the Cheque',['class'=>'control-label']) !!}
                                <div class="input-group">
                                    <div class="input-group-addon bg-blue"><i class="fa fa-calendar"></i></div>
                                    {!! Form::text('dateOfCheque',null,['id'=>'dateOfCheque','class'=>'form-control','placeholder'=>'YY/MM/DD']) !!}
                                    <div class="input-group-addon bg-blue"><i class="fa fa-user"></i></div>
                                </div>
                            </div>
                            <div class="form-group bold" id='checkNo'>
                                {!! Form::label('checkNo','Check Number',['class'=>'control-label']) !!}

                                <div class="input-group">
                                    <div class="input-group-addon bg-blue"><i class="fa fa-check"></i></div>
                                    {!! Form::text('checkNo',null,['id'=>'checkNo','class'=>'form-control']) !!}
                                    <div class="input-group-addon bg-blue"><i class="fa fa-user"></i></div>
                                </div>
                            </div>
                            <div class="form-group" id='bank'>
                                {!! Form::label('bank','Bank',['class'=>'control-label']) !!}
                                <div class="input-group">
                                    <div class="input-group-addon bg-blue"><i class="fa fa-bank"></i></div>
                                    {!! Form::text('bank',null,['id'=>'bank','class'=>'form-control']) !!}
                                    <div class="input-group-addon bg-blue"><i class="fa fa-user"></i></div>
                                </div>
                            </div>

                            <div class="form-group ">
                                {!! Form::label('amount','Amount',['class'=>'control-label']) !!}
                                <div class="input-group">
                                    <div class="input-group-addon bg-blue"><i>{{Auth::user()->area->currency->symbol??''}}</i></div>
                                    {!! Form::number('amount',null,['class'=>'form-control','step'=>'any','required'=>'required']) !!}
                                    <div class="input-group-addon bg-blue"><i class="fa fa-money"></i></div>
                                </div>
                            </div>

                            <div class="form-group ">
                                {!! Form::hidden('local_id','local id',['class'=>'control-label']) !!}
                                {!! Form::hidden('local_id',Auth::user()->local_id,['class'=>'form-control']) !!}
                            </div>

                            <div class="pull-right">
                                {!! Form::submit('submit',['class'=>'btn  btn-primary']) !!}
                            </div>

                        </div>
                        {!! Form::close() !!}
                    </div>

                    <div class="col-md-12">
                        <span style="font-size: 12px;color:#094498; font-weight: bold" id="header">The maximum number you can post is 50.Membership ID is required(only the last 3-digit number).The amount field is required.Only cash deposit is accepted with bulk tithe post</span>
                        <div id="showBulk">
                            <div id="step1">
                                {!! Form::model($user,['method'=>'POST','action'=>'Locals\LocalNoneActiveUsersController@store','class'=>'form-horizontal','onsubmit' => 'return bulkpost()'])!!}
                                <div class="col-md-12">
                                    <div class="col-md-10 p2" id="bulkdate">
                                        {!! Form::label('created_at','Select Date',['class'=>'control-label']) !!}
                                        {!! Form::date('created_at',Carbon\Carbon::now(),['class'=>'form-control']) !!}
                                    </div>
                                    <div id="bulkSubmit" class="shadow"></div>
                                    <div class="pull-right" style="padding-top: 10px; padding-left: 20px">
                                        <div class="pull-left">
                                            <div class="form-group">
                                                {!! Form::submit('submit',['class'=>'btn  btn-success','id'=>'bulksubmitsave']) !!}
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="padding-top:20px">
                            <div class="col-md-2 col-md-offset-1">
                                <button class="btn btn-sm btn-danger pull-left" id="remove">Remove</button>
                            </div>
                            <div class="col-md-">
                                <button class="btn btn-sm btn-primary pull-left" id="send">+Add</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>




    </div>


    <script type="text/javascript">
        // var a,option,s,date,datemonth;
        //    datemonth=document.getElementById('month');
        //    s=document.getElementById('step1');
        //    var days=new Date();
        //        // an=days.getDate();
        //
        //    function f(){
        //         $(document).on("change", '#month', function(e) {
        //
        //             if (datemonth.value==="February") {
        //                  f1(days.getDate()/2);
        //             }else{
        //                 f1(days.getDate());
        //             }
        //
        //         });
        // }
        //
        // function f1(s) {
        //        return s;
        // }
        //
        // function f2() {
        //      f1();
        // }
        //
        //
        //
        //
        // for(a=1; a<=f2(); a+=1)
        // {
        //     option=document.createElement('option');
        //     option.value= option.innerText= a;
        //     s.add(option);
        // }
        //
        //
        //
        //
        //


        //checking anonymous and other things
        var mode=document.getElementById('modeofpayment');

        var dateOfCheque=document.getElementById('dateOfCheque');

        var checkNo=document.getElementById('checkNo');

        var bank=document.getElementById('bank');


        dateOfCheque.style.display="none";
        checkNo.style.display="none";
        bank.style.display="none";


        // mode.addEventListener('click',function (e) {
        $(document).on("change", '#modeofpayment', function(e) {
            if (mode.value==='3') {
                dateOfCheque.style.display="block";
                checkNo.style.display="block";
                bank.style.display="block";

            }else {
                dateOfCheque.style.display="none";
                checkNo.style.display="none";
                bank.style.display="none";
            }
        });

        var showFictitious=document.getElementById('showFictitious');
        showFictitious.style.display='none';
        var Fictitious=document.getElementById('Fictitious');
        Fictitious.onclick=function(e){

            if (Fictitious.checked){
                showFictitious.style.display="block";
                document.getElementById('accountName').style.display="none";
            }else {
                showFictitious.style.display="none";
                document.getElementById('accountName').style.display="block";
            }
        };
        var cl=document.getElementById('send');
        var removechild=document.getElementById('remove');
        var b=document.getElementById('step1');
        var bulkSubmit=document.getElementById('bulkSubmit');

        document.getElementById('send').style.display="none";
        removechild.style.display="none";
        var bulk=document.getElementById('bulk');
        var notBult=document.getElementById('notBult');
        document.getElementById('header').style.display="none";

        bulk.addEventListener('click',function (e) {

            if (bulk.value==='1'){
                document.getElementById('form_show').style.display="none";
                cl.style.display="block";
                document.getElementById('header').style.display="block";
            }else {
                document.getElementById('header').style.display="none";
                document.getElementById('form_show').style.display="block";

            }

        });

        notBult.addEventListener('click',function (e) {
            if (notBult.value==='2'){
                document.getElementById('header').style.display="none";
                document.getElementById('form_show').style.display="block";
                document.getElementById('showBulk').style.display="none";
                removechild.style.display="none";
                cl.style.display="none";
            }else {
                document.getElementById('form_show').style.display="block";
                document.getElementById('showBulk').style.display="block";
                document.getElementById('bulksubmitsave').style.display='block';
                document.getElementById('header').style.display="none";
            }

        });


        var bulkdate=document.getElementById('bulkdate');

        bulkdate.style.display="none";


        $(document).on("click", '#send', function(e) {
            bulkdate.style.display="block";

            document.getElementById('send').style.display="none";
            document.getElementById('remove').style.display="none";
            var div1=document.createElement('div');
            div1.classList.add('row');

            var div2=document.createElement('div');
            div2.classList.add('col-md-4');

            var label1=document.createElement('label');
            label1.classList.add('control-label');
            label1.id='adId';
            label1.for='user_id';
            // label1.innerText='Membership ID(Last 3 Digit Number)';
            div2.append(label1);

            //adding div to the main div which is div1
            div1.append(div2);
            //adding input to the label of div2
            var userId= document.createElement('input');
            userId.type="number";
            userId.name='user_id[]';
            // userId.required='required';
            userId.placeholder='Membership ID(Last 3 Digit Number)',
                userId.classList.add('form-control');
            userId.id='userIss';
            userId.maxLength=3;
            userId.minLength=3;
            div2.append(userId);

            //creating another div
            var div3=document.createElement('div');
            div3.classList.add('col-md-4');
            var label2=document.createElement('label');
            label2.classList.add('control-label');
            label2.id='amount';
            label2.for='amount';
            // label2.innerText='Amount(GHS)';
            //adding label to the div created
            div3.append(label2);
            div1.append(div3);
            //creating input for the div3 label
            var input2=document.createElement('input');
            input2.name='amount[]';
            input2.id='amounts';
            // input2.required='required';
            input2.placeholder='Amount(GHS)';
            input2.step='any';
            input2.type='number';
            input2.classList.add('form-control');
            div3.append(input2);


            var div0=document.createElement('div');
            div0.classList.add('col-md-3');
            // var label3=document.createElement('label');
            // label3.classList.add('control-label');
            // label3.id='amount';
            // label3.for='amount';
            //  label3.innerText='select';
            // // adding label to the div0 created
            // div0.append(label3);

            var option =document.createElement('a');
            option.classList.add('btn');
            option.classList.add('btn-primary')
            option.innerText='Add';
            option.id="send";
            // var options1=document.createElement('option');
            // options1.innerText="Cash";
            // options1.value=1;
            // option.append(options1);

            var buttons=document.createElement('a');
            buttons.classList.add('btn');
            buttons.classList.add('btn-danger');
            buttons.innerText='Remove';
            buttons.id='remove';

            div0.append(buttons);
            div0.append(option);
            div1.append(div0);
            bulkSubmit.append(div1);
        });

        $(document).on('click', '#remove', function(e) {
            e.preventDefault();
            $(this).closest('.row').remove();
        })

        var bulksubmitsave=document.getElementById('bulksubmitsave');
        bulksubmitsave.style.display='none';
        var total_amount=document.getElementById('total_amount');
        total_amount.style.display="none";
        var totals=document.getElementById('amountId');

        cl.addEventListener('click',function () {
            document.getElementById('bulksubmitsave').style.display='block';
            var sums=document.getElementById('amounts');
            removechild.style.display='block';
            var stack =sums.value;
            sum = 0;
            while(stack.length > 0) { sum += stack.pop() };
            total_amount.innerHTML=sum;
            total_amount.style.display="block";
        });

        $(document).ready(function() {
            $('.accountUser').select2({
                placeholder: "Select Account Name",
                allowClear: true,
            });
        });

        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to post?");
            if (x)
                return true;
            else
                return false;
        }

        function searchInfo()
        {
            var x = confirm("Are you ready to search?");
            if (x)
                return true;
            else
                return false;
        }

        function bulkpost()
        {
            var x = confirm("You are about to send bulk tithe to individuals account.Click Ok to proceed Or Cancel to terminate");
            if (x)
                return true;
            else
                return false;
        }
    </script>

@endsection

