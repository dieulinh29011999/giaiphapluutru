@extends('pages.layout.layouts')
@section('title')
Sửa Đổi Thông Tin Quyền
@endsection
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Permission: {{$permissions->name}}</h1>
          </div>
          <div class="col-sm-6">
            <nav aria-label="breadcrumb ">
              <ol class="breadcrumb pink lighten-2 float-sm-right">
                <li class="breadcrumb-item"><i class="far fa-star mr-2 white-text" aria-hidden="true"></i><a
                    class="white-text" href="{{route('users.index')}}">Home</a></li>
                <li class="breadcrumb-item"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i><a
                    class="white-text" href="{{route('permissions.index')}}" accesskey="m">Permission</a></li>
                <li class="breadcrumb-item active"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i> Edit Permission Form</li>
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
            <h3 class="card-title"></h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          {!! Form::model($permissions, ['method' => 'PATCH','route' => ['permissions.update', $permissions->id], 'files'=>true]) !!}
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                      <label for="exampleName">Permission Name</label>
                      <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{$permissions->name}}">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="name">Guard_name</label>
                    <input type="text" class="form-control" id="guard_name" placeholder="guard_name" name="guard_name" value="web" readonly>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-dark ">Submit</button>
            </div>
            {!! Form::close()!!}
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>

@endsection
