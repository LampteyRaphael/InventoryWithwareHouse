@extends ('layouts.master_table')
@section('dashboard')
    <li>
        <p class="navbar-text">
            EDIT MEMBERSHIP DATA
        </p>
    </li>
    <li>
        <p class="navbar-text">
            <a href="{{route('registration.index')}}" class=" btn-info btn-sm">Home</a>
        </p>
    </li>
    <li>
        <p class="navbar-text">
          <a href="{{route('localIndividualT',$user->id)}}" class=" btn-info btn-sm">Tithe</a>
        </p>
    </li>
    <li>
        <p class="navbar-text">
            <a class="btn-success btn-sm" href="{{route('registration.edit',$user->id)}}" onclick="return update()">Edit</a>
        </p>
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @include('includes.form_error')
            @include('includes.alert')
        </div>
        {!! Form::model($user,['method'=>'PATCH','action'=>['Locals\RegisterLocalMembersController@update',$user->id],'files'=>true, 'onsubmit'=>'return ConfirmUpdate()'],['class'=>'form-inline'])!!}
        @include('includes.localFolder.updateHeader')
        @include('includes.updateFolders.personal')
        @include('includes.updateFolders.contact')
        @include('includes.updateFolders.educationProfession')
        @include('includes.updateFolders.churchDetails')
        @include('includes.updateFolders.provisionServices')
        @include('includes.localFolder.updateFooter')
    </div>

    <script>
        function myFunction() {
            var x=document.getElementById('myInput');

            if (x.type==="password"){
                x.type="text";
            }else {
                x.type="password";
            }
        }
        function ConfirmDelete() {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
        function ConfirmUpdate() {
            var x = confirm("Are you sure you want to update?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
@endsection
