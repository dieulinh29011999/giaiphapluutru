@extends('pages.layout.layouts')
@section('title')
Sửa Đổi Thông Tin Phân Quyền Người Dùng
@endsection
@section('content')
<section class="content-header" style="">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Edit Role Form</h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb pink lighten-2 float-sm-right">
                        <li class="breadcrumb-item"><i class="far fa-star mr-2 white-text" aria-hidden="true"></i><a
                            class="white-text" href="{{route('users.index')}}">Home</a></li>
                        <li class="breadcrumb-item"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i><a
                            class="white-text" href="{{route('roles.index')}}" accesskey="r">Role</a></li>
                        <li class="breadcrumb-item active"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i>Edit Role Form</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
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
            {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br/>
                            @foreach($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            <br/>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
</section>

@endsection
