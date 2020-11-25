@extends('pages.layout.layouts')
@section('title')
Thêm Mới Bệnh Viện
@endsection
@section('content')
      <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Create Hospital Form</h1>
              </div>
              <div class="col-sm-6">
                <nav aria-label="breadcrumb ">
                  <ol class="breadcrumb pink lighten-2 float-sm-right">
                    <li class="breadcrumb-item"><i class="far fa-star mr-2 white-text" aria-hidden="true"></i><a
                        class="white-text" href="{{route('benhnhan.index')}}">Home</a></li>
                    <li class="breadcrumb-item"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i><a
                        class="white-text" href="{{route('benhvien.index')}}" accesskey="h">Hospital</a></li>
                    <li class="breadcrumb-item active"><i class="far fa-star mx-2 white-text" aria-hidden="true">Create Hospital Form</i></li>
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
    <!-- goi session bao loi -->
        @if($mess=Session::get('error'))
        <div class="alert alert-danger">
        <li>{{ $mess }}</li>
        </div>
        @endif

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-dark">
                  <div class="card-header">
                    <h3 class="card-title">Thông Tin Bệnh Viện</h3>
                </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                <form role="form" action="{{route('benhvien.store')}}" method="post">
                  @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleName">Hospital Name</label>
                        <input type="text" class="form-control" id="hospitalname" placeholder="HospitalName" name="tenbenhvien" value="{{old('tenbenhvien')}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputAddress">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Address" name="diachi" value="{{old('diachi')}}">
                      </div>
                    <!-- /.card-body -->
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </form>
              </div>
                <!-- /.card -->
            </div>
          </div>
        </section>
  @endsection