@extends ('layouts.master_table')

@section('dashboard')
    <li>
        <p class="navbar-text">
            CHILDREN DATA FORM
        </p>
    </li>
@endsection

@section('content')
{{--    <script>--}}

    {{--    function ConfirmDelete()--}}
    {{--    {--}}
    {{--        var x = confirm("Are you sure you want to Post?");--}}
    {{--        if (x)--}}
    {{--            return true;--}}
    {{--        else--}}
    {{--            return false;--}}
    {{--    }--}}

    {{--</script>--}}
    <div class="row">
{{--        @include('includes.alert')--}}
{{--        @include('includes.form_error')--}}
        {!! Form::open(['method'=>'POST','action'=>'Locals\ChildrenMinistryAtLocalController@store','files'=>true,'class'=>'form-row', 'onsubmit'=>'return ConfirmDelete()'])!!}
        <div class="panel mb0 hidden">
            <div class="panel-heading border">
                <ol class="breadcrumb mb0 no-padding">
                    <li>
                        <span style="color: red">*</span> is compulsory
                    </li>
                    <li>
                        <a href="javascript:;">LOCATION</a>
                    </li>
                </ol>
            </div>
            <div class="panel-body">
                <div class="col-sm-6">
                    <div class="form-group ">
                        {!! Form::label('region_id','Region',['class'=>'control-label bold']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-area-chart"></i></div>
                            {!! Form::select('region_id',$regions,null,['class'=>'form-control','required'=>'required']) !!}
                        </div>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group ">
                        {!! Form::label('area_id','Area',['class'=>'control-label bold']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-area-chart"></i></div>
                            {!! Form::select('area_id',$areas,null,['class'=>'form-control','required'=>'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group ">
                        {!! Form::label('district_id','District',['class'=>'control-label bold']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-area-chart"></i></div>
                            {!! Form::select('district_id',$districts,null,['class'=>'form-control','required'=>'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('local_id','Local',['class'=>'control-label bold']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-area-chart"></i></div>
                            {!! Form::select('local_id',$locals,null,['class'=>'form-control','required'=>'required']) !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="panel mb0 shadow" id="step1">
            <div class="panel-heading border">
                <ol class="breadcrumb mb0 no-padding">
                    <li>
                        <a href="javascript:;">PERSONAL DETAILS</a>
                    </li>
                    <li>
                        <span style="color: red">*</span> is compulsory
                    </li>
                </ol>
            </div>
            <div class="panel-body">

                <div class="col-sm-4">
                    <div class="form-group ">
                        {!! Form::label('name','Full Name',['class'=>'control-label bold']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            {!! Form::text('name',null,['class'=>'form-control','required'=>'required','placeholder'=>'FirstName/Middle Name/Surname']) !!}
                        </div>

                    </div>
                </div>

                <div class="col-sm-4">
                    <div>
                        <div class="form-group">
                            {!! Form::label('gender','Gender',['class'=>'control-label bold']) !!}
                            <span style="color: red">*</span>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-genderless"></i></div>
                                {!! Form::select('gender',[''=>'--Choose Option--','male'=>'Male','female'=>'Female'],null,['id'=>'gender','class'=>'form-control','required'=>'required']) !!}
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group ">
                        {!! Form::label('birthDate','Date Of Birth',['class'=>'control-label bold']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            {!! Form::date('birthDate',null,['class'=>'form-control','required'=>'required']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('placeOfBirth','Place Of Birth',['class'=>'control-label']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            {!! Form::text('placeOfBirth',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group ">
                        {!! Form::label('hometown','Hometown',['class'=>'control-label bold']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            {!! Form::text('hometown',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
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
                            {!! Form::label('houseaddress','House Number',['class'=>'control-label bold']) !!}
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
                        {!! Form::label('landmark','LandMark',['class'=>'control-label']) !!}
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            {!! Form::text('landmark',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group ">
                        {!! Form::label('parentGuardian','Parent/Guardian a Church Member',['class'=>'control-label']) !!}
                        <div class="input-group">
                           Yes <input type="radio" id="parentGuardian" value='1' name="parent">
                           No  <input type="radio" id="parentGuardian2" value='2' name="parent">
                        </div>
                    </div>
                </div>

                <div class="col-sm-4" id="parent1" >
                    <div class="form-group">
                        {!! Form::label('parentGuardianName','Name of Parent or Guardian',['class'=>'control-label']) !!}
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            {!! Form::text('parentGuardianName',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4" id="parent2">
                    <div class="form-group">
                        {!! Form::label('parentGuardianName2','Name of Parent or Guardian',['class'=>'control-label']) !!}
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            {!! Form::select('parentGuardianName2',[''=>'--Choose Option--']+$parents,null,['class'=>'form-group','id'=>'parents']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group ">
                        {!! Form::label('mobileNumber1','Contact of Parent or Guardian',['class'=>'control-label']) !!}
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            {!! Form::number('mobileNumber1',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group ">
                        {!! Form::label('photo_id','Photo',['class'=>'control-label']) !!}
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-photo"></i></div>
                            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 hidden">
                    <div class="form-group ">
                        {!! Form::label('hometown_region','Home Town Region',['class'=>'control-label bold']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                            {!! Form::text('hometown_region',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 hidden">
                    <div class="form-group hidden">
                        {!! Form::label('nationality','Nationality',['class'=>'control-label bold']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <select id="nationality" name="nationality" class="form-control">
                                <option value="ghanaian">Ghanaian</option>
                                <option value="afghan">Afghan</option>
                                <option value="albanian">Albanian</option>
                                <option value="algerian">Algerian</option>
                                <option value="american">American</option>
                                <option value="andorran">Andorran</option>
                                <option value="angolan">Angolan</option>
                                <option value="antiguans">Antiguans</option>
                                <option value="argentinean">Argentinean</option>
                                <option value="armenian">Armenian</option>
                                <option value="australian">Australian</option>
                                <option value="austrian">Austrian</option>
                                <option value="azerbaijani">Azerbaijani</option>
                                <option value="bahamian">Bahamian</option>
                                <option value="bahraini">Bahraini</option>
                                <option value="bangladeshi">Bangladeshi</option>
                                <option value="barbadian">Barbadian</option>
                                <option value="barbudans">Barbudans</option>
                                <option value="batswana">Batswana</option>
                                <option value="belarusian">Belarusian</option>
                                <option value="belgian">Belgian</option>
                                <option value="belizean">Belizean</option>
                                <option value="beninese">Beninese</option>
                                <option value="bhutanese">Bhutanese</option>
                                <option value="bolivian">Bolivian</option>
                                <option value="bosnian">Bosnian</option>
                                <option value="brazilian">Brazilian</option>
                                <option value="british">British</option>
                                <option value="bruneian">Bruneian</option>
                                <option value="bulgarian">Bulgarian</option>
                                <option value="burkinabe">Burkinabe</option>
                                <option value="burmese">Burmese</option>
                                <option value="burundian">Burundian</option>
                                <option value="cambodian">Cambodian</option>
                                <option value="cameroonian">Cameroonian</option>
                                <option value="canadian">Canadian</option>
                                <option value="cape verdean">Cape Verdean</option>
                                <option value="central african">Central African</option>
                                <option value="chadian">Chadian</option>
                                <option value="chilean">Chilean</option>
                                <option value="chinese">Chinese</option>
                                <option value="colombian">Colombian</option>
                                <option value="comoran">Comoran</option>
                                <option value="congolese">Congolese</option>
                                <option value="costa rican">Costa Rican</option>
                                <option value="croatian">Croatian</option>
                                <option value="cuban">Cuban</option>
                                <option value="cypriot">Cypriot</option>
                                <option value="czech">Czech</option>
                                <option value="danish">Danish</option>
                                <option value="djibouti">Djibouti</option>
                                <option value="dominican">Dominican</option>
                                <option value="dutch">Dutch</option>
                                <option value="east timorese">East Timorese</option>
                                <option value="ecuadorean">Ecuadorean</option>
                                <option value="egyptian">Egyptian</option>
                                <option value="emirian">Emirian</option>
                                <option value="equatorial guinean">Equatorial Guinean</option>
                                <option value="eritrean">Eritrean</option>
                                <option value="estonian">Estonian</option>
                                <option value="ethiopian">Ethiopian</option>
                                <option value="fijian">Fijian</option>
                                <option value="filipino">Filipino</option>
                                <option value="finnish">Finnish</option>
                                <option value="french">French</option>
                                <option value="gabonese">Gabonese</option>
                                <option value="gambian">Gambian</option>
                                <option value="georgian">Georgian</option>
                                <option value="german">German</option>
                                <option value="ghanaian">Ghanaian</option>
                                <option value="greek">Greek</option>
                                <option value="grenadian">Grenadian</option>
                                <option value="guatemalan">Guatemalan</option>
                                <option value="guinea-bissauan">Guinea-Bissauan</option>
                                <option value="guinean">Guinean</option>
                                <option value="guyanese">Guyanese</option>
                                <option value="haitian">Haitian</option>
                                <option value="herzegovinian">Herzegovinian</option>
                                <option value="honduran">Honduran</option>
                                <option value="hungarian">Hungarian</option>
                                <option value="icelander">Icelander</option>
                                <option value="indian">Indian</option>
                                <option value="indonesian">Indonesian</option>
                                <option value="iranian">Iranian</option>
                                <option value="iraqi">Iraqi</option>
                                <option value="irish">Irish</option>
                                <option value="israeli">Israeli</option>
                                <option value="italian">Italian</option>
                                <option value="ivorian">Ivorian</option>
                                <option value="jamaican">Jamaican</option>
                                <option value="japanese">Japanese</option>
                                <option value="jordanian">Jordanian</option>
                                <option value="kazakhstani">Kazakhstani</option>
                                <option value="kenyan">Kenyan</option>
                                <option value="kittian and nevisian">Kittian and Nevisian</option>
                                <option value="kuwaiti">Kuwaiti</option>
                                <option value="kyrgyz">Kyrgyz</option>
                                <option value="laotian">Laotian</option>
                                <option value="latvian">Latvian</option>
                                <option value="lebanese">Lebanese</option>
                                <option value="liberian">Liberian</option>
                                <option value="libyan">Libyan</option>
                                <option value="liechtensteiner">Liechtensteiner</option>
                                <option value="lithuanian">Lithuanian</option>
                                <option value="luxembourger">Luxembourger</option>
                                <option value="macedonian">Macedonian</option>
                                <option value="malagasy">Malagasy</option>
                                <option value="malawian">Malawian</option>
                                <option value="malaysian">Malaysian</option>
                                <option value="maldivan">Maldivan</option>
                                <option value="malian">Malian</option>
                                <option value="maltese">Maltese</option>
                                <option value="marshallese">Marshallese</option>
                                <option value="mauritanian">Mauritanian</option>
                                <option value="mauritian">Mauritian</option>
                                <option value="mexican">Mexican</option>
                                <option value="micronesian">Micronesian</option>
                                <option value="moldovan">Moldovan</option>
                                <option value="monacan">Monacan</option>
                                <option value="mongolian">Mongolian</option>
                                <option value="moroccan">Moroccan</option>
                                <option value="mosotho">Mosotho</option>
                                <option value="motswana">Motswana</option>
                                <option value="mozambican">Mozambican</option>
                                <option value="namibian">Namibian</option>
                                <option value="nauruan">Nauruan</option>
                                <option value="nepalese">Nepalese</option>
                                <option value="new zealander">New Zealander</option>
                                <option value="ni-vanuatu">Ni-Vanuatu</option>
                                <option value="nicaraguan">Nicaraguan</option>
                                <option value="nigerien">Nigerien</option>
                                <option value="north korean">North Korean</option>
                                <option value="northern irish">Northern Irish</option>
                                <option value="norwegian">Norwegian</option>
                                <option value="omani">Omani</option>
                                <option value="pakistani">Pakistani</option>
                                <option value="palauan">Palauan</option>
                                <option value="panamanian">Panamanian</option>
                                <option value="papua new guinean">Papua New Guinean</option>
                                <option value="paraguayan">Paraguayan</option>
                                <option value="peruvian">Peruvian</option>
                                <option value="polish">Polish</option>
                                <option value="portuguese">Portuguese</option>
                                <option value="qatari">Qatari</option>
                                <option value="romanian">Romanian</option>
                                <option value="russian">Russian</option>
                                <option value="rwandan">Rwandan</option>
                                <option value="saint lucian">Saint Lucian</option>
                                <option value="salvadoran">Salvadoran</option>
                                <option value="samoan">Samoan</option>
                                <option value="san marinese">San Marinese</option>
                                <option value="sao tomean">Sao Tomean</option>
                                <option value="saudi">Saudi</option>
                                <option value="scottish">Scottish</option>
                                <option value="senegalese">Senegalese</option>
                                <option value="serbian">Serbian</option>
                                <option value="seychellois">Seychellois</option>
                                <option value="sierra leonean">Sierra Leonean</option>
                                <option value="singaporean">Singaporean</option>
                                <option value="slovakian">Slovakian</option>
                                <option value="slovenian">Slovenian</option>
                                <option value="solomon islander">Solomon Islander</option>
                                <option value="somali">Somali</option>
                                <option value="south african">South African</option>
                                <option value="south korean">South Korean</option>
                                <option value="spanish">Spanish</option>
                                <option value="sri lankan">Sri Lankan</option>
                                <option value="sudanese">Sudanese</option>
                                <option value="surinamer">Surinamer</option>
                                <option value="swazi">Swazi</option>
                                <option value="swedish">Swedish</option>
                                <option value="swiss">Swiss</option>
                                <option value="syrian">Syrian</option>
                                <option value="taiwanese">Taiwanese</option>
                                <option value="tajik">Tajik</option>
                                <option value="tanzanian">Tanzanian</option>
                                <option value="thai">Thai</option>
                                <option value="togolese">Togolese</option>
                                <option value="tongan">Tongan</option>
                                <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                                <option value="tunisian">Tunisian</option>
                                <option value="turkish">Turkish</option>
                                <option value="tuvaluan">Tuvaluan</option>
                                <option value="ugandan">Ugandan</option>
                                <option value="ukrainian">Ukrainian</option>
                                <option value="uruguayan">Uruguayan</option>
                                <option value="uzbekistani">Uzbekistani</option>
                                <option value="venezuelan">Venezuelan</option>
                                <option value="vietnamese">Vietnamese</option>
                                <option value="welsh">Welsh</option>
                                <option value="yemenite">Yemenite</option>
                                <option value="zambian">Zambian</option>
                                <option value="zimbabwean">Zimbabwean</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 hidden">
                    <div class="form-group">
                        {!! Form::label('languagess','Language(s) Spoken',['class'=>'control-label bold']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                            {!! Form::text('languagess',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 hidden">
                    <div class="form-group hidden">
                        {!! Form::label('rightHandOfFellowship','Right Hand Of Fellowship',['class'=>'control-label bold']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group hidden">
                            <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                            {!! Form::select('rightHandOfFellowship',[''=>'Choose Option','yes'=>'Yes','no'=>'No'],'no',['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 hidden">
                    <div class="form-group hidden">
                        {!! Form::label('anySpiritualGift','Any Spiritual Gift(s)',['class'=>'control-label bold']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                            {!! Form::select('anySpiritualGift',[''=>'--Choose Option--','yes'=>'Yes','no'=>'No'],'no',['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 hidden">
                    <div class="form-group hidden">
                        {!! Form::label('communicant','Communicant',['class'=>'control-label bold']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group hidden">
                            <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                            {!! Form::select('communicant',[''=>'--Choose Option--','yes'=>'Yes','no'=>'No'],'no',['class'=>'form-control','required'=>'required']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 hidden">
                    <div class="form-group hidden">
                        {!! Form::label('holySpiritBaptism','Holy Spirit Baptism',['class'=>'control-label bold']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group hidden">
                            <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                            {!! Form::select('holySpiritBaptism',[''=>'--Choose Option--','yes'=>'Yes','no'=>'No'],'no',['class'=>'form-control','required'=>'required']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 hidden">
                    <div class="form-group hidden">
                        {!! Form::label('maritalStatus','Marital Status',['class'=>'control-label bold']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group hidden">
                            <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                            {!! Form::select('maritalStatus',[''=>'Choose Option','married'=>'Married','single'=>'Single',
                            'divorce'=>'Divorce','separated'=>'Separated','widow(er)'=>'Widow(er)'

                            ],'single',['class'=>'form-control','required'=>'required']) !!}
                        </div>
                    </div>
                </div>


                <div class="col-sm-4 hidden">
                    <div class="form-group hidden">
                        {!! Form::label('fathers_name',' Name Of Father',['class'=>'control-label']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            {!! Form::text('fathers_name',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 hidden">
                    <div class="form-group ">
                        {!! Form::label('fathers_hometown','Father\'s Hometown',['class'=>'control-label']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            {!! Form::text('fathers_hometown',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 hidden">
                    <div class="form-group ">
                        {!! Form::label('mothers_name',' Name Of Mother',['class'=>'control-label']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            {!! Form::text('mothers_name',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 hidden">
                    <div class="form-group ">
                        {!! Form::label('mothers_hometown','Mother\'s  Hometown',['class'=>'control-label']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            {!! Form::text('mothers_hometown',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class=" pull-right">
                    <div class="form-group ">
                        {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
        </div>
        {{--Ending of Guardians--}}


        {{--Church Details--}}
        <div class="panel mb0 hidden" id="step4" hidden>
            <div class="panel-heading border">
                <ol class="breadcrumb mb0 no-padding">
                    <li>
                        <a href="javascript:;">CHURCH DETAILS</a>
                    </li>
                </ol>
            </div>
            <div class="panel-body">

                <div class="col-sm-4">
                    <div class="form-group hidden">
                        {!! Form::label('datejoinchurch','Date Join The Church(specifically the year)',['class'=>'control-label bold']) !!}
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            {!! Form::date('datejoinchurch',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('waterBaptism','Water Baptism',['class'=>'control-label bold']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                            {!! Form::select('waterBaptism',[''=>'--Choose Option--', 'yes'=>'Yes','no'=>'No'],null,['class'=>'form-control']) !!}
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
                        {!! Form::label('baptismDate','Date Of Baptism',['class'=>'control-label']) !!}
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            {!! Form::date('baptismDate',null,['class'=>'form-control']) !!}
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

                <div class="col-sm-4 hidden">
                    <div class="form-group">
                        {!! Form::label('officeHeld','Office Held',['class'=>'control-label bold']) !!}
                        <span style="color: red">*</span>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                            {!! Form::select('officeHeld',[''=>'--Choose Option--', 'apostle'=>'Apostle','pastor'=>'Pastor',
                                   'elder'=>'Elder','deacon'=>'Deacon','deaconess'=>'Deaconess','member'=>'Member','children ministry'=>'Children Ministry','new convert'=>'New Convert'
                            ],'children ministry',['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel mb0 hidden" id="step6">
            <div class="panel-heading border">
                <ol class="breadcrumb mb0 no-padding">
                    <li>
                        <a href="javascript:;">OFFICE USE ONLY</a>
                    </li>
                </ol>
            </div>
            <div class="panel-body">
                <div class="col-sm-12">

                    <div class="col-sm-4 hidden">
                        <div class="form-group ">
                            {!! Form::label('role_id','Role',['class'=>'control-label bold']) !!}
                            <span style="color: red">*</span>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                                {!! Form::select('role_id',$roles,null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 hidden">
                        <div class="form-group ">
                            {!! Form::label('is_active','Active Status',['class'=>'control-label bold']) !!}
                            <span style="color: red">*</span>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-wrench"></i></div>
                                {!! Form::select('is_active',[''=>'--Choose Option--',1=>'Active',0=>'Not Active'],1,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>



                    <div class="col-sm-4 hidden">
                        <div class="form-group  hidden">
                            {!! Form::label('password','Password',['class'=>'control-label bold']) !!}
                            <div class="input-group">
                                {!! Form::text('password',Auth::user()->local->local_code,['class'=>'form-control','required'=>'required','id'=>'myInput']) !!}
                                <div class="input-group-addon"><input type="checkbox"  onclick="myFunction()">Show
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-4 hidden">
                        <div class="form-group">
                            {!! Form::label('members_id','Membership ID',['class'=>'control-label bold']) !!}
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user-secret"></i></div>
                                {!! Form::number('members_id',random_int(7000,9999),['class'=>'form-control','required'=>'required', 'placeholder'=>$membershipId . "+3-digit only" ]) !!}
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
        {!! Form::close() !!}
    </div>

    <script>

        var p1=document.getElementById('parent1');
        var p2=document.getElementById('parent2');
        var parentGuardian=document.getElementById('parentGuardian');
        var parentGuardian2=document.getElementById('parentGuardian2');

        p2.style.display="none";

        parentGuardian.addEventListener('click',function (e) {
            if (parentGuardian.value==='1'){
                p2.style.display="block";
                p1.style.display="none";
            }
        });

        parentGuardian2.addEventListener('click',function (e) {
            if (parentGuardian2.value==='2'){
                p1.style.display="block";
                p2.style.display="none";
            }
        });

        $(document).ready(function() {
            $('#parents').select2({
                placeholder: "Select Account Name",
                allowClear: true,
            });
        });

        function myFunction() {

            var x=document.getElementById('myInput');

            if (x.type==="password"){
                x.type="text";
            }else {
                x.type="password";
            }
        }

    </script>
@endsection



