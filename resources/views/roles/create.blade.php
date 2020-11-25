@extends('pages.layout.layouts')
@section('title')
Thêm Phân Quyền Người Dùng Mới
@endsection
@section('content')
<section class="content-header" style="">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Role Form</h1>
        </div>
        {{-- <div class="col-sm-2">
            <button class="btn btn-dark"><a href=""></a>Back</button>
        </div> --}}
        <div class="col-sm-6">
          <nav aria-label="breadcrumb ">
            <ol class="breadcrumb pink lighten-2 float-sm-right">
              <li class="breadcrumb-item"><i class="far fa-star mr-2 white-text" aria-hidden="true"></i><a
                  class="white-text" href="{{route('users.index')}}">Home</a></li>
              <li class="breadcrumb-item"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i><a
                  class="white-text" href="{{route('roles.index')}}" accesskey="r">Role</a></li>
              <li class="breadcrumb-item active"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i>Create Role Table</li>
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

<div class="card card-dark"  style="background-color:#e8f5e9">
    <div class="card-header">
      <div class="card-title"> 
        <strong>ROLE</strong>
      </div>
    </div>
    <div class="card-body">
{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
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
                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>
</div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}
</div>
</div>

@endsection
