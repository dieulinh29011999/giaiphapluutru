@extends('pages.layout.layouts')
@section('title')
Thêm Mới Quyền
@endsection
@section('content')
<section class="content-header" style="">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Permission Form</h1>
          </div>
          <div class="col-sm-6">
            <nav aria-label="breadcrumb ">
              <ol class="breadcrumb pink lighten-2 float-sm-right">
                <li class="breadcrumb-item"><i class="far fa-star mr-2 white-text" aria-hidden="true"></i><a
                    class="white-text" href="{{route('users.index')}}">Home</a></li>
                <li class="breadcrumb-item"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i><a
                    class="white-text" href="{{route('permissions.index')}}" accesskey="m">Permission</a></li>
                <li class="breadcrumb-item active"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i> Create Permission Form</li>
              </ol>
            </nav>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>
    @if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif
    <section class="content"   style="">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-dark"  style="background-color:#e8f5e9">
              <div class="card-header">
                <div class="card-title"> 
                  <strong>PERMISSION INFORMATION</strong>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('permissions.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="Name">Permission Name</label>
                          <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{old('name')}}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="guard_name"> Guard_name</label>
                        <input type="text" class="form-control" id="guard_name" placeholder="guard_name" name="guard_name" value="web" readonly>
                      </div>
                    </div>
                  </div>
                <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
         
        </div>
      </div>
    </section>

@endsection
{{-- background-color:#dcedc8 --}}