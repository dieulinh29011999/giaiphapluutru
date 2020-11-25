@extends('pages.layout.layouts')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit User: {{$user->name}}</h1>
          </div>
          <div class="col-sm-6">
            <nav aria-label="breadcrumb ">
              <ol class="breadcrumb pink lighten-2 float-sm-right">
                <li class="breadcrumb-item"><i class="far fa-star mr-2 white-text" aria-hidden="true"></i><a
                    class="white-text" href="{{route('users.index')}}">Home</a></li>
                <li class="breadcrumb-item"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i><a
                    class="white-text" href="{{route('users.index')}}">User</a></li>
                <li class="breadcrumb-item active"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i>Edit user</li>
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
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-dark" style="background-color:#e8f5e9">
          <div class="card-header">
            <h3 class="card-title">Information</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id], 'files'=>true]) !!}
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleName">User Name</label>
                    <input type="text" class="form-control" id="tenuser" placeholder="name" name="tenuser" value="{{$user->tenuser}}">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{$user->email}}">
                  </div>
                </div>
                </div>
                {{-- <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Confirm Password</label>
                      <input type="password" class="form-control" id="confirmPassword" placeholder="confirmPassword" name="confirm-password">
                    </div>
                  </div>
                </div> --}}
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleDanhso">Mã user</label>
                      <input type="text" class="form-control" id="mauser" placeholder="Number" name="mauser" value="{{$user->mauser}}">
                    </div>
                    </div>
                    {{-- <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleTen"></label>
                        <input type="text" class="form-control" id="hoten" placeholder="Full Name" name="hoten" value="{{$user->hoten}}">
                      </div>
                    </div> --}}
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputFile">Input avatar</label>
                          <input type="file" class="form-control" name="avatar" >
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <strong>Role:</strong>
                      {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                    </div>
                  </div>
                </div>
            </div>
            <div class="card-footer">
              <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-dark align-content-center">Submit</button>
              </div>
            </div>
          {!! Form::close()!!}
        </div>
        <!-- /.card -->
      </div>
     
    </div>
  </div>
</section>

@endsection
