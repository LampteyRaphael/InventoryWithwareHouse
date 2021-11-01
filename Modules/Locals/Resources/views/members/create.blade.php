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

  <div class="card shadow ">
{{--        <h5 class="card-header label-success">Featured</h5>--}}
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
{{--            <p class="card-text">--}}
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-users large text-success"></i> Post Individual Tithe</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-users large text-danger"></i>Post Bult Tithe</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-users large text-warning"></i> Deceased Members</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

 
           


        <div id="form_show" class="col-xs-12">
                {{-- <div class="row">
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
                </div> --}}

              
            {!! Form::model($user,['method'=>'POST','action'=>'Locals\PostTitheController@store','onsubmit' => 'return ConfirmDelete()'])!!}
<div class="">
<div class="">
    <div class="row">
        {!! Form::label('check','Anonymous',['class'=>'control-label']) !!}
        {!! Form::checkbox('check',1,null,['id'=>'Fictitious']) !!}
    </div>
    <div class="col">
        {!! Form::label('created_at','Select Date Of Entry Tithe',['class'=>'control-label']) !!}
        {!! Form::date('created_at',$date,['class'=>'form-control form-control-lg','min'=>Carbon\Carbon::parse(date('Y').'-'.(date('m')-1).'-'.'15')->format('Y-m-d'), 'max'=>Carbon\Carbon::parse(date('Y').'-'.(date('m')).'-'.'31')->format('Y-m-d')]) !!}
    </div>
    <div class="col" id="showFictitious">
        {!! Form::label('user_id','Account Name',['class'=>'control-label']) !!}
        {!! Form::select('fictitious',[5=>'UNKNOWN SELECTED TITHE'],5,['class'=>'form-control form-control-lg']) !!}
    </div>
    <div class="col" id="accountName">
        {!! Form::label('user_id','Account Name',['class'=>'control-label']) !!}
        {!! Form::select('user_id',[''=>'Select Account Name']+$user,null,['class'=>'form-control form-control-lg accountUser']) !!}
    </div>
    <div class="col">
        {!! Form::label('modeOfPayment','Payment Mode',['class'=>'control-label']) !!}
        {!! Form::select('modeOfPayment',[1=>'Cash',2=>'E-Payment',3=>'Cheque'],1,['class'=>'form-control form-control-lg','required'=>'required','id'=>'modeofpayment']) !!}
    </div>

    <div class="col" id='dateOfCheque'>
        {!! Form::label('dateOfCheque','Date Written On the Cheque',['class'=>'control-label']) !!}
        {!! Form::text('dateOfCheque',null,['id'=>'dateOfCheque','class'=>'form-control form-control-lg','placeholder'=>'YY/MM/DD']) !!}
    </div>
    <div class="col" id='checkNo'>
        {!! Form::label('checkNo','Check Number',['class'=>'control-label']) !!}
        {!! Form::text('checkNo',null,['id'=>'checkNo','class'=>'form-control form-control-lg']) !!}
    </div>
    <div class="col" id='bank'>
        {!! Form::label('bank','Bank',['class'=>'control-label']) !!}
        {!! Form::text('bank',null,['id'=>'bank','class'=>'form-control form-control-lg']) !!}
    </div>

    <div class="col ">
        {!! Form::label('amount','Amount',['class'=>'control-label']) !!}
        {!! Form::number('amount',null,['class'=>'form-control form-control-lg','step'=>'any','required'=>'required']) !!}
    </div>

    <div class="col ">
        {!! Form::hidden('local_id','local id',['class'=>'control-label']) !!}
        {!! Form::hidden('local_id',Auth::user()->local_id,['class'=>'form-control']) !!}
    </div>

    <div class="pull-right">
        {!! Form::submit('submit',['class'=>'btn  btn-primary']) !!}
    </div>
</div>

</div>


        
            {!! Form::close() !!}
       

            
        </div>

                          
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                
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
                <div class="col-md-12">
                <span style="font-size: 12px;color:#094498; font-weight: bold" id="header">The maximum number you can post is 50.Membership ID is required(only the last 3-digit number).The amount field is required.Only cash deposit is accepted with bulk tithe post</span>
                <div id="showBulk">
                    <div id="step1">
                        {!! Form::model($user,['method'=>'POST','action'=>'Locals\LocalNoneActiveUsersController@store','class'=>'form-horizontal','onsubmit' => 'return bulkpost()'])!!}
                        <div class="col-md-12">
                            <div id="bulkSubmit" class="">
                                <div class="col-md-10 mr10" id="bulkdate">
                                    <div class="form-group" id="bulkdate">
                                        {!! Form::label('created_at','Select Date Of Entry Tithe',['class'=>'control-label']) !!}
                                        {!! Form::date('created_at',$date,['class'=>'form-control form-control-lg','min'=>Carbon\Carbon::parse(date('Y').'-'.(date('m')-1).'-'.'15')->format('Y-m-d'), 'max'=>Carbon\Carbon::parse(date('Y').'-'.(date('m')).'-'.'31')->format('Y-m-d')]) !!}
                                    </div>
                                </div>
                                <span id="count" class="pull-right" style="font-size: 3em; margin-right:80px; margin-top: 50px;"></span>

                            </div>

                            <div id="bulkSubmit" class=""></div>
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
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...4</div>
            </div>
{{--            </p>--}}
            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
        </div>
    </div>



    <script type="text/javascript">
        var count=0;
        //checking anonymous and other things
        var mode=document.getElementById('modeofpayment');

        var dateOfCheque=document.getElementById('dateOfCheque');

        var checkNo=document.getElementById('checkNo');

        var bank=document.getElementById('bank');
        var bulkdate=document.getElementById('bulkdate');

        bulkdate.style.display="none";
        dateOfCheque.style.display="none";
        checkNo.style.display="none";
        bank.style.display="none";


        var bulksubmitsave=document.getElementById('bulksubmitsave');
        bulksubmitsave.style.display='none';
        var total_amount=document.getElementById('total_amount');
        total_amount.style.display="none";
        var totals=document.getElementById('amountId');
        
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

     
          
                cl.style.display="block";
                document.getElementById('header').style.display="block";
            
                document.getElementById('form_show').style.display="block";
            
       

        notBult.addEventListener('click',function (e) {
            if (notBult.value==='2'){
                document.getElementById('header').style.display="block";
                document.getElementById('form_show').style.display="block";
                document.getElementById('showBulk').style.display="block";
                removechild.style.display="none";
                cl.style.display="none";
            }else {
                document.getElementById('form_show').style.display="block";
                document.getElementById('showBulk').style.display="block";
                document.getElementById('bulksubmitsave').style.display='block';
                document.getElementById('header').style.display="block";
            }

        });


        $(document).on("click", '#send', function(e) {
            count=count+1;
            bulksubmitsave.style.display="block";
            bulkdate.style.display="block";
            if(count<=50){
                document.getElementById("count").innerHTML=count;
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

                var option =document.createElement('a');
                option.classList.add('btn');
                option.classList.add('btn-primary')
                option.innerText='Add';
                option.id="send";

                var buttons=document.createElement('a');
                buttons.classList.add('btn');
                buttons.classList.add('btn-danger');
                buttons.innerText='Remove';
                buttons.id='remove';

                div0.append(buttons);
                div0.append(option);
                div1.append(div0);
                bulkSubmit.append(div1);
            }else {
                alert('Maximum to Post is 50');
            }

        });

        $(document).on('click', '#remove', function(e) {
            e.preventDefault();
            $(this).closest('.row').remove();
             count=count-1;
                document.getElementById("count").innerHTML = count;
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

