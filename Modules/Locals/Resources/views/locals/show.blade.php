@extends ('layouts.master_table')
@section('dashboard')
    <li>
        <p class="navbar-text">
            MEMBERSHIP DATA
        </p>
    </li>
    <li>
        <p class="navbar-text">
            <a href="{{route('registration.index')}}" class=" btn-default btn-xs">Home</a>
        </p>
    </li>
    <li>
        <p class="navbar-text">
            <a href="{{route('localIndividualT',$user->id)}}" class=" btn-info btn-xs">Tithe</a>
        </p>
    </li>
    <li>
        <p class="navbar-text">
            <a class="btn-success btn-xs" href="{{route('registration.edit',$user->id)}}" id="submitUpdate">Edit</a>
        </p>
    </li>

@endsection

@section('content')
<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">
        
        
        
        </p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-8">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">
        
                            <ul class="nav nav-divider">
                                <li style="border-bottom: 1px solid black">REGION:</li>
                                <li style="border-bottom: 1px solid black">AREA:</li>
                                <li style="border-bottom: 1px solid black">DISTRICT:</li>
                                <li style="border-bottom: 1px solid black">LOCAL:</li>
                                <li style="border-bottom: 1px solid black">{{$user->region->name}}</li>
                                <li style="border-bottom: 1px solid black">{{$user->area->name}}</li>
                                <li style="border-bottom: 1px solid black">{{$user->district->name}}</li>
                                <li style="border-bottom: 1px solid black">{{$user->local->name}}</li>
                            </ul>

                             <ul class="nav navbar" style="border-bottom: 1px solid black">
                                <li style="border-bottom: 1px solid black">FULL NAME:</li>
                                <li style="border-bottom: 1px solid black">GENDER</li>
                                <li style="border-bottom: 1px solid black">DATE OF BIRTH:</li>
                                <li style="border-bottom: 1px solid black">PLACE OF BIRTH:</li>
                                <li style="border-bottom: 1px solid black">HOME TOWN</li>
                                <li style="border-bottom: 1px solid black">HOME TOWN REGION</li>
                                <li style="border-bottom: 1px solid black">NATIONALITY</li>
                                <li style="border-bottom: 1px solid black">LANGUAGES SPOKEN</li>
                                <li style="border-bottom: 1px solid black">MARITAL STATUS</li>
                                <li style="border-bottom: 1px solid black">MARRIAGE TYPE</li>
                                <li style="border-bottom: 1px solid black">NAME OF SPOUSE</li>
                                <li style="border-bottom: 1px solid black">NUMBER OF CHILDREN</li>
                                <li style="border-bottom: 1px solid black">FATHERS NAME</li>
                                <li style="border-bottom: 1px solid black">FATHERS HOME TOWN</li>
                                <li style="border-bottom: 1px solid black">MOTHERS NAME</li>
                                <li style="border-bottom: 1px solid black">MOTHERS HOME TOWN</li>
                            </ul>

                            <ul class="nav">
                                <li style="border-bottom: 1px solid black">{{$user->name? $user->name:'-'}}</li>
                                <li style="border-bottom: 1px solid black">{{$user->gender? $user->gender:'-'}}</li>
                                <li style="border-bottom: 1px solid black">{{$user->birthDate? $user->birthDate:'-'}}</li>
                                <li style="border-bottom: 1px solid black">{{$user->placeOfBirth? $user->placeOfBirth:'-'}}</li>
                                <li style="border-bottom: 1px solid black">{{$user->hometown? $user->hometown:'-'}}</li>
                                <li style="border-bottom: 1px solid black">{{$user->hometown_region? $user->hometown_region:'-'}}</li>
                                <li style="border-bottom: 1px solid black">{{$user->nationality? $user->nationality:'-'}}</li>
                                <li style="border-bottom: 1px solid black">{{$user->languagess? $user->languagess:'-'}}</li>
                                <li style="border-bottom: 1px solid black">{{$user->maritalStatus? $user->maritalStatus:'-'}}</li>
                                <li style="border-bottom: 1px solid black">{{$user->mariagetype? $user->mariagetype:'-'}}</li>
                                <li style="border-bottom: 1px solid black">{{$user->spouseName? $user->spouseName:'-'}}</li>
                                <li style="border-bottom: 1px solid black">{{$user->numberOfChildren? $user->numberOfChildren:'-'}}</li>
                                <li style="border-bottom: 1px solid black">{{$user->fathers_name? $user->fathers_name:'-'}}</li>
                                <li style="border-bottom: 1px solid black">{{$user->fathers_hometown? $user->fathers_hometown:'-'}}</li>
                                <li style="border-bottom: 1px solid black">{{$user->mothers_name? $user->mothers_name:'-'}}</li>
                                <li style="border-bottom: 1px solid black">{{$user->mothers_hometown? $user->mothers_hometown:'-'}}</li>

                            </ul>
        
        </p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div>

{{-- ending of show page --}}
<div class="col-md-12">
    <div class="table-responsive">
        @include('includes.form_error')
        @include('includes.alert')
        <table class="table  shadow" style="text-transform: uppercase;">
                    <ol class="breadcrumb mb0 no-padding">
                        <li> <a href="{{route('registration.index')}}" class="btn btn-default btn-xs">Home</a></li>
                        <li> <a href="{{route('localIndividualT',$user->id)}}" class="btn btn-default btn-xs">Tithe</a></li>
                        <li> <a class="btn btn-default btn-xs" href="{{route('registration.edit',$user->id)}}" onclick="return update()">Edit</a></li>
                        <li><a class="btn btn-default btn-xs" href="">Pdf</a></li>
                    </ol>
                    <tbody>
                    <tr>
                        <td>
                            <img class="img-circle img-responsive" height="100" width="100" src="{{$user->photo? $user->photo->file :asset('images/placeholder.png')}}" alt="image">
                        </td>
                        <td>
                        
                        </td>
                        <td colspan="2">
                            <ul class="nav active-result">
                                
                            </ul>
                        </td>

                    </tr>
                    <tr>
                        <td style="padding: 0px; margin: 0px;">
                            PERSONAL DETAILS
                        </td>

                        <td>
                           
                        </td>
                        <td>
                            
                        </td>
                    </tr>

                    <tr>
                        <td>CONTACT INFORMATION</td>
                        <td>
                            <ul class="nav">
                                <li>DIGITAL ADDRESS</li>
                                <li>HOUSE NUMBER</li>
                                <li>STREET NAME</li>
                                <li>LANDMARK</li>
                                <li>MOBILE NUMBER 1</li>
                                <li>MOBILE NUMBER 2</li>
                                <li>WORK NUMBER</li>
                                <li>WHATSAPP NUMBER</li>
                                <li>EMAIL</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="nav">
                                <li>{{$user->digitalAddress?$user->digitalAddress:'-'}}</li>
                                <li>{{$user->houseaddress? $user->houseaddress:'-'}}</li>
                                <li>{{$user->streetname? $user->streetname:'-'}}</li>
                                <li>{{$user->landmark? $user->landmark:'-'}}</li>
                                <li>{{$user->mobileNumber1? $user->mobileNumber1:'-'}}</li>
                                <li>{{$user->mobileNumber2? $user->mobileNumber2:'-'}}</li>
                                <li>{{$user->workNumber? $user->workNumber:'-'}}</li>
                                <li>{{$user->whatsappNumber? $user->whatsappNumber:'-'}}</li>
                                <li>{{$user->email? $user->email:'-'}}</li>

                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            EDUCATION & PROFESSION
                        </td>
                        <td>
                            <ul class="nav">
                                <li>EDUCATION</li>
                                <li>COURSE STUDIED</li>
                                <li>EMPLOYMENT TYPE</li>
                                <li>PROFESSION/OCCUPATION</li>
                                <li>PLACE OF WORK</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="nav">
                                <li>{{$user->education? $user->education:'-'}}</li>
                                <li>{{$user->courseStudied? $user->courseStudied:'-'}}</li>
                                <li>{{$user->employmentType? $user->employmentType:'-'}}</li>
                                <li>{{$user->profOccupation? $user->profOccupation:'-'}}</li>
                                <li>{{$user->placeOfWork? $user->placeOfWork:'-'}}</li>
                            </ul>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            CHURCH DETAILS
                        </td>
                        <td>
                            <ul class="nav">
                                <li>DATE JOIN THE CHURCH</li>
                                <li>PREVIOUS DENOMINATION</li>
                                <li>WATER BAPTISM</li>
                                <li>BAPTISED BY</li>
                                <li>DATE OF BAPTISM</li>
                                <li>PLACE OF BAPTISM</li>
                                <li>RIGHT HAND OF FELLOWSHIP</li>
                                <li>COMMUNICANT</li>
                                <li>HOLY SPIRIT BAPTISM</li>
                                <li>ANY SPIRITUAL GIFT(S)</li>
                                <li>OFFICE HELD</li>
                                <li>ORDAINED BY</li>
                                <li>DATE ORDAINED</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="nav">
                                <li>{{$user->datejoinchurch? $user->datejoinchurch:'-'}}</li>
                                <li>{{$user->previousdenomination? $user->previousdenomination:'-'}}</li>
                                <li>{{$user->waterBaptism? $user->waterBaptism:'-'}}</li>
                                <li>{{$user->baptismBy? $user->baptismBy:'-'}}</li>
                                <li>{{$user->baptismDate? $user->baptismDate:'-'}}</li>
                                <li>{{$user->baptismLocality? $user->baptismLocality:'-'}}</li>
                                <li>{{$user->rightHandOfFellowship? $user->rightHandOfFellowship:'-'}}</li>
                                <li>{{$user->communicant? $user->communicant:'-'}}</li>
                                <li>{{$user->holySpiritBaptism? $user->holySpiritBaptism:'-'}}</li>
                                <li>{{$user->anySpiritualGift? $user->anySpiritualGift:'-'}}</li>
                                <li>{{$user->pleaseIndicate? $user->pleaseIndicate:'-'}}</li>
                                <li>{{$user->ordainedBy? $user->ordainedBy:'-'}}</li>
                                <li>{{$user->dateOrdained? $user->dateOrdained:''}}</li>

                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>POSITION/SERVICE IN THE CHURCH</td>
                        <td>
                            <ul class="nav">
                                <li>MOVEMENT/GROUP</li>
                                <li>POSITION/SERVICE IN THE CHURCH</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="nav">
                                <li>{{$user->movementGroup? $user->movementGroup:'-'}}</li>
                                <li>{{$user->position? $user->position:'-'}}</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>OFFICE USE ONLY</td>
                        <td>
                            <ul class="nav">
                                <li style="border-bottom: 1px solid black">ROLE</li>
                                <li style="border-bottom: 1px solid black">MEMBERSHIP ID</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="nav">
                                <li style="border-bottom: 1px solid black">{{$user->role? $user->role->name:'-'}}</li>
                                <li style="border-bottom: 1px solid black">{{$user->members_id? $user->members_id:'-'}}</li>
                            </ul>
                        </td>
                    </tr>
                    </tbody>
                </table>
    </div>
</div>
@endsection