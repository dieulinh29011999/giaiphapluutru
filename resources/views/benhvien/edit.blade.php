@extends('pages.layout.layouts')
@section('title')
Sửa Đổi Thông Tin Bệnh Viện
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Edit Hospital Form</h1>
        </div>
        <div class="col-sm-6">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb pink lighten-2 float-sm-right">
                    <li class="breadcrumb-item"><i class="far fa-star mr-2 white-text" aria-hidden="true"></i><a
                        class="white-text" href="{{route('benhnhan.index')}}">Home</a></li>
                    <li class="breadcrumb-item"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i><a
                        class="white-text" href="{{route('benhvien.index')}}" accesskey="h">Hospital</a></li>
                    <li class="breadcrumb-item active"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i>Edit Hospital Form</li>
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
                            <h3 class="card-title">Information</h3>
                        </div>
                {!! Form::model($benhvien, ['method' => 'PATCH','route' => ['benhvien.update', $benhvien->id]]) !!}
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong> Hospital Name:</strong>
                                {!! Form::text('tenbenhvien', null, array('placeholder' => 'Hospital Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Address:</strong>
                                <br/>
                                {!! Form::text('diachi', null, array('placeholder' => 'Address','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                {!! Form::close() !!}
                </div>
    <!-- /.card -->
            </div>
        </div>
    </div>
</section>

  @endsection