<div class="col-md-12">
    <div class="panel mb0" id="step4">
        <div class="panel-heading border">
            <ol class="breadcrumb mb0 no-padding">
                <li>
                    <a href="javascript:;">CHURCH DETAILS</a>
                </li>
            </ol>
        </div>
        <div class="panel-body">
            <ul class="nav">
                <li><span id="name_error4" class="text text-danger bold "></span></li>
            </ul>
            <div class="col-sm-4">
                <div class="form-group ">
                    {!! Form::label('datejoinchurch','Date Join The Church(specifically the year( YY-mm-dd))',['class'=>'control-label bold']) !!}
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        {!! Form::date('datejoinchurch',null,['class'=>'form-control','placeholder'=>'YY-mm-dd)']) !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group ">
                    {!! Form::label('previousdenomination','Previous Denomination',['class'=>'control-label']) !!}
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>
                        {!! Form::text('previousdenomination',null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('waterBaptism','Water Baptism',['class'=>'control-label bold']) !!}
                    <span style="color: red">*</span>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                        {!! Form::select('waterBaptism',[''=>'--Choose Option--', 'yes'=>'Yes','no'=>'No'],null,['class'=>'form-control','required'=>'required']) !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group ">
                    {!! Form::label('baptismBy','Baptised By',['class'=>'control-label']) !!}
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        {!! Form::text('baptismBy',null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group ">
                    {!! Form::label('baptismDate','Date Of Baptism (YY-mm-dd)',['class'=>'control-label']) !!}
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        {!! Form::date('baptismDate',null,['class'=>'form-control','placeholder'=>'YY-mm-dd)']) !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group ">
                    {!! Form::label('baptismLocality','Place Of Baptism',['class'=>'control-label']) !!}
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>
                        {!! Form::text('baptismLocality',null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>


            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('rightHandOfFellowship','Right Hand Of Fellowship',['class'=>'control-label bold']) !!}
                    <span style="color: red">*</span>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                        {!! Form::select('rightHandOfFellowship',[''=>'Choose Option','yes'=>'Yes','no'=>'No'],null,['class'=>'form-control','required'=>'required']) !!}
                    </div>
                </div>
            </div>


            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('communicant','Communicant',['class'=>'control-label bold']) !!}
                    <span style="color: red">*</span>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                        {!! Form::select('communicant',[''=>'--Choose Option--','yes'=>'Yes','no'=>'No'],null,['class'=>'form-control','required'=>'required']) !!}
                    </div>
                </div>
            </div>


            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('holySpiritBaptism','Holy Spirit Baptism',['class'=>'control-label bold']) !!}
                    <span style="color: red">*</span>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                        {!! Form::select('holySpiritBaptism',[''=>'--Choose Option--','yes'=>'Yes','no'=>'No'],null,['class'=>'form-control','required'=>'required']) !!}
                    </div>
                </div>
            </div>


            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('anySpiritualGift','Any Spiritual Gift(s)',['class'=>'control-label bold']) !!}
                    <span style="color: red">*</span>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                        {!! Form::select('anySpiritualGift',[''=>'--Choose Option--','yes'=>'Yes','no'=>'No'],null,['class'=>'form-control','required'=>'required']) !!}
                    </div>
                </div>
            </div>


            <div class="col-sm-4">
                <div class="form-group ">
                    {!! Form::label('pleaseIndicate','Please Indicate Any Spiritual Gift(s)',['class'=>'control-label']) !!}
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                        {!! Form::text('pleaseIndicate',null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>



            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('officeHeld','Office Held',['class'=>'control-label bold']) !!}
                    <span style="color: red">*</span>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                        {!! Form::select('officeHeld',[''=>'--Choose Option--', 'apostle'=>'Apostle','pastor'=>'Pastor','entrant'=>'Entrant',
                               'elder'=>'Elder','presiding elder'=>'Presiding Elder','deacon'=>'Deacon','deaconess'=>'Deaconess','member'=>'Member','new convert'=>'New Convert'
                        ],null,['class'=>'form-control','required'=>'required']) !!}
                    </div>
                </div>
            </div>


            <div class="col-sm-4">
                <div class="form-group ">
                    {!! Form::label('ordainedBy','Ordained By',['class'=>'control-label']) !!}
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        {!! Form::text('ordainedBy',null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group ">
                    {!! Form::label('dateOrdained','Date Ordained (YY-mm-dd)',['class'=>'control-label']) !!}
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        {!! Form::date('dateOrdained',null,['class'=>'form-control','placeholder'=>'YY-mm-dd)']) !!}
                    </div>
                </div>
            </div>

{{--            <button id="btn7" class="btn btn-primary pull-right" onclick="step4NextFunction()">Continue</button>--}}
{{--            <button id="btn8" class="btn btn-danger pull-right" onclick="step4BackFunction()">Back</button>--}}

        </div>
    </div>
</div>