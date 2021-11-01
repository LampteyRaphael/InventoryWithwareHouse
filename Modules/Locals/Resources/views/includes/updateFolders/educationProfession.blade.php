{{--     EDUCATION AND PROFESSION--}}

<div class="col-md-12">
    <div class="panel mb0" id="step3">
        <div class="panel-heading border">
            <ol class="breadcrumb mb0 no-padding">
                <li>
                    <a href="javascript:;">EDUCATION & PROFESSION</a>
                </li>
            </ol>
        </div>
        <div class="panel-body">
{{--            <ul class="nav">--}}
{{--                <li><span id="name_error3" class="text text-danger bold "></span></li>--}}
{{--            </ul>--}}
            <div class="col-sm-4">
                <div class="form-group ">
                    {!! Form::label('education','Level Of Education',['class'=>'control-label bold']) !!}
                    <span style="color: red">*</span>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                        {!! Form::select('education',[''=>'--Choose Option--',
                        'non'=>'Non',
                        'basic'=>'Basic',
                        'vocational'=>'Vocational',
                        'secondary'=>'Secondary',
                        'o level'=>'O Level',
                        'tertiary'=>'Tertiary'],null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group ">
                    {!! Form::label('courseStudied','Course Studied',['class'=>'control-label']) !!}
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                        {!! Form::text('courseStudied',null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group ">
                    {!! Form::label('employmentType','Employment Type',['class'=>'control-label bold']) !!}
                    <span style="color: red">*</span>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                        {!! Form::select('employmentType',
                        [''=>'--Choose Option--',
                         'self employed'=>'Self Employed',
                         'government'=>'Government',
                         'private sector'=>'Private Sector',
                         'student'=>'Student',
                         'unemployed'=>'Unemployed',
                         'retired'=>'Retired'
                        ],null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group ">
                    {!! Form::label('profOccupation','Profession/Occupation',['class'=>'control-label']) !!}
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                        {!! Form::text('profOccupation',null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group ">
                    {!! Form::label('placeOfWork','Place Of Work',['class'=>'control-label']) !!}
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>
                        {!! Form::text('placeOfWork',null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

{{--            <div class="col-md-12">--}}
{{--                <button id="btn5" class="btn btn-primary pull-right" onclick="return step3NextFunction()">Continue</button>--}}
{{--                <button id="btn6" class="btn btn-danger pull-right" onclick="return step3BackFunction()">Back</button>--}}
{{--            </div>--}}
        </div>
    </div>
</div>