{{--    CONTACT INFORMATION--}}
<div class="col-md-12">
    <div class="panel mb0" id="step2">
        <div class="panel-heading border">
            <ol class="breadcrumb mb0 no-padding">
                <li>
                    <a href="javascript:;">CONTACT INFORMATION</a>
                </li>
            </ol>
        </div>
        <div class="panel-body">
{{--            <ul class="nav">--}}
{{--                <li><span id="name_error2" class="text text-danger bold "></span></li>--}}
{{--            </ul>--}}
            <div class="">
                <div class="col-sm-4">
                    <div class="form-group ">
                        {!! Form::label('digitalAddress','Digital Address',['class'=>'control-label bold']) !!}
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>
                            {!! Form::text('digitalAddress',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-group ">
                            {!! Form::label('houseaddress','House NO',['class'=>'control-label bold']) !!}
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>
                                {!! Form::text('houseaddress',null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group ">
                        {!! Form::label('streetname','Street Name',['class'=>'control-label']) !!}
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            {!! Form::text('streetname',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group ">
                        {!! Form::label('landmark','Landmark',['class'=>'control-label']) !!}
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            {!! Form::text('landmark',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group ">
                    {!! Form::label('mobileNumber1','Mobile Number1',['class'=>'control-label bold']) !!} <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                        {!! Form::text('mobileNumber1',null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group ">
                    {!! Form::label('mobileNumber2','Mobile Number2',['class'=>'control-label']) !!}
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                        {!! Form::text('mobileNumber2',null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group ">
                    {!! Form::label('workNumber','Work Number',['class'=>'control-label']) !!}
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                        {!! Form::text('workNumber',null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group ">
                    {!! Form::label('whatsappNumber','WhatsApp No',['class'=>'control-label']) !!}
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-whatsapp"></i></div>
                        {!! Form::text('whatsappNumber',null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>


            <div class="col-sm-4">
                <div class="form-group ">
                    {!! Form::label('email','Email',['class'=>'control-label']) !!}
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-mail-forward"></i></div>
                        {!! Form::text('email',null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
{{--            <button id="btn4" class="btn btn-primary pull-right" onclick="return step2NextFunction()">Continue</button>--}}
{{--            <button id="btn3" class="btn btn-danger pull-right" onclick="return step2BackFunction()">Back</button>--}}
        </div>
    </div>
</div>