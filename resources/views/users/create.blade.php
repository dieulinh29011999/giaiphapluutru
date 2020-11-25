@extends('pages.layout.layouts')

@section('content')
<section class="content-header" style="">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create User Form</h1>
          </div>
          <div class="col-sm-6">
            <nav aria-label="breadcrumb ">
              <ol class="breadcrumb pink lighten-2 float-sm-right">
                <li class="breadcrumb-item"><i class="far fa-star mr-2 white-text" aria-hidden="true"></i><a
                    class="white-text" href="{{route('users.index')}}">Home</a></li>
                <li class="breadcrumb-item"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i><a
                    class="white-text" href="{{route('users.index')}}">User</a></li>
                <li class="breadcrumb-item active"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i>Crete user form</li>
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
                  <strong>INFORMATION</strong>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleName">Tên tài khoản</label>
                        <input type="text" class="form-control" id="tenuser" placeholder="Tên tài khoản" name="tenuser" value="{{old('tenuser')}}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{old('email')}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="confirmPassword" name="confirm-password">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleDanhso">Mã người dùng</label>
                        <input type="text" class="form-control" id="mauser" placeholder="Mã người dùng" name="mauser" value="{{old('mauser')}}">
                      </div>
                    </div>
                    {{-- <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleTen">Họ tên</label>
                        <input type="text" class="form-control" id="hoten" placeholder="" name="hoten" value="{{old('hoten')}}">
                      </div>
                    </div> --}}
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="exampleInputFile">Input avatar</label>
                            <input type="file" class="form-control" name="avatar" value="{{old('avatar')}}">
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <strong>Role:</strong>
                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
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
