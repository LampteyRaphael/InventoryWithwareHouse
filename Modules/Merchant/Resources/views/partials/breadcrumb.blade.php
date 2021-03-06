<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3><b class="badge badge-pill badge-light">INVENTORY</b></h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>

          @foreach(Request::segments() as $segment)
          <li class="breadcrumb-item">
              <a href="{{ route('contact') }}">{{$segment}}</a>
          </li>
          @endforeach
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
