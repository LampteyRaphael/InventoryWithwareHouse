@if(Session::has('success1'))
        {{--<div class="alert alert-danger" id="alert">--}}
        {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
            {{--<span aria-hidden="true">&times;</span>--}}
        {{--</button>--}}
        {{--</div>--}}

    <script>
        var notify = $.notify('<strong>{{Session::get("success1")}}</strong> Do not close this page...', {
            allow_dismiss: false,
            showProgressbar: true
        });

        setTimeout(function() {
            notify.update({'type': 'success', 'message': '<strong>Please</strong> Wait...', 'progress': 25});
        }, 4500);
    </script>
@endif



@if(Session::has('success'))
    <script>
        var notify = $.notify('<strong>{{Session::get("success")}}</strong> Do not close this page...', {
            allow_dismiss: false,
            showProgressbar: true
        });

        setTimeout(function() {
            notify.update({'type': 'success', 'message': '<strong>Please </strong> wait...', 'progress': 25});
        }, 4500);
    </script>
@endif


@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif