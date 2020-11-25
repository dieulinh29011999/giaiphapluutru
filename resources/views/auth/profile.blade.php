@extends('pages.layout.layouts')
@section('title')
|Profile
@endsection
@section ('content')
<section class="content-header"  style="background-color:#dcedc8">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb pink lighten-2 float-sm-right">
                    <li class="breadcrumb-item"><i class="far fa-star mr-2 white-text" aria-hidden="true"></i><a
                        class="white-text" href="{{route('homepage')}}">Home</a></li>
                        <li class="breadcrumb-item"><i class="far fa-star mr-2 white-text" aria-hidden="true"></i><a
                          class="white-text" href="">User Profile</a></li>
                </ol>
            </nav>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content"  style="background-color:#dcedc8">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3" >

            <!-- Profile Image -->
            <div class="card card-dark card-outline">
              <div class="card-body box-profile" style="background-color:#e8f5e9">
                <div class="text-center">
                  @if($profile->avatar)
                <img src="{{$profile->avatar}}" width="150px" class="img-circle">
                  @else
                  <img scr="upload/avatar/defaul.jpg" class="img-reponsive" alt="">
                  @endif
                </div>

                <h3 class="profile-name text-center"> {{ $profile->tenuser }}</h3>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-dark"  style="background-color:#e8f5e9">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"> Mã người dùng: {{$profile->mauser}}</i></strong>
              <!-- Phone number -->
                <p class="text-muted">
                  
                </p>

                <hr>
              <!-- Location -->
                <strong><i class="fas fa-map-marker-alt mr-1"></i> CÔNG TY iDEA</strong>

                <p class="text-muted"></p>

                <hr>
              <!-- Notes -->
                <strong><i class="far fa-file-alt mr-1"></i></strong>

                <p class="text-muted">
                  
                </p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-dark" style="background-color:#e8f5e9">
              @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <strong>Có lỗi!</strong> Bạn chưa nhập đầy đủ thông tin hoặc sai định dạng.<br><br>
                  <ul>
                     @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                     @endforeach
                  </ul>
                </div>
              @endif
              @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
              @endif
              @if ($message = Session::get('error'))
              <div class="alert alert-danger">
                <p>{{ $message }}</p>
              </div>
              @endif
              <div class="card-header p-2"  >
                <ul class="nav nav-pills">
                <strong>Update</strong>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-pane" id="settings">
                  <form role="form" action="{{route('profile-update')}}" method="post" enctype="multipart/form-data">
                  @csrf

                     <div class="form-group">
                        <label for="exampleName">User Name</label>
                        <input type="text" class="form-control" id="tenuser" placeholder="name" name="tenuser" value="{{$profile->tenuser}}"readonly="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{$profile->email}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="confirmPassword" name="confirm-password">
                      </div>
                      {{-- <div class="form-group">
                        <label for="exampleDanhso">Danh số</label>
                        <input type="text" class="form-control" id="danhso" placeholder="" name="danhso" value="{{$profile->danhso}}">
                      </div> --}}
                      {{-- <div class="form-group">
                        <label for="exampleTen">Mã Người dùng</label>
                        <input type="text" class="form-control" id="mauser" placeholder="" name="mauser" value="{{$profile->mauser}}">
                      </div> --}}
                      {{-- <div class="form-group">
                        <strong>Role:</strong>
                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                      </div> --}}
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection