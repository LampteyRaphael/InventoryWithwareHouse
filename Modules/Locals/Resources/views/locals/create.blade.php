@extends ('locals::layouts.locals')
@section('content')
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i></i>Personal Info</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Contact Info</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Educational Info</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="contact1-tab" data-toggle="tab" href="#contact1" role="tab" aria-controls="contact1" aria-selected="false">Church Details</a>
    </li>
    <li class="nav-item" role="presentation">
    <a class="nav-link" id="contact2-tab" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact2" aria-selected="false">Position/Service In The Church</a>
    </li>
    <li class="nav-item" role="presentation">
       <a class="nav-link" id="contact3-tab" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact3" aria-selected="false">Office</a>
    </li>
  </ul>
  {!! Form::open(['method'=>'POST','route'=>'registration.store','files'=>true, 'onsubmit'=>'return ConfirmDelete()'])!!}
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        @include('locals::includes.registrationFolder.personal')</div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        @include('locals::includes.registrationFolder.contact')</div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        @include('locals::includes.registrationFolder.educationProfession')</div>
    <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact1-tab">
        @include('locals::includes.registrationFolder.churchDetails')
    </div>
    <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact2-tab">
        @include('locals::includes.registrationFolder.provisionService')
    </div>
    <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact3-tab">
        @include('locals::includes.localFolder.localFooter')
    </div>
</div>
  {!! Form::close() !!}






    @include('locals::includes.form_error')
    @include('locals::includes.alert')
    @include('locals::includes.form_js')



@endsection



