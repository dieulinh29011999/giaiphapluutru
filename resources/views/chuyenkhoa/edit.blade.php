@extends('pages.layout.layouts')
@section('title')
Sửa Đổi Thông Tin Chuyên Khoa
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Edit Specialist Form</h1>
        </div>
        <div class="col-sm-6">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb pink lighten-2 float-sm-right">
                    <li class="breadcrumb-item"><i class="far fa-star mr-2 white-text" aria-hidden="true"></i><a
                        class="white-text" href="{{route('benhnhan.index')}}">Home</a></li>
                    <li class="breadcrumb-item"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i><a
                        class="white-text" href="{{route('chuyenkhoa.index')}}" accesskey="s">Specialist</a></li>
                    <li class="breadcrumb-item active"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i>Edit Specialist</li>
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
                    {!! Form::model($chuyenkhoa, ['method' => 'PATCH','route' => ['chuyenkhoa.update', $chuyenkhoa->id]]) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong> Tên chuyên khoa</strong>
                                    {!! Form::text('tenchuyenkhoa', null, array('placeholder' => 'Tên chuyên khoa','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Address:</strong>
                                    <br/>
                                    <select name="id_benhvien" class="browser-default custom-select">
                                        @foreach($benhvien as $bv)
                                        <option value="{{$bv->id}}" {{($chuyenkhoa->id_benhvien == $bv->id) ? 'selected' : ''}} >{{$bv->tenbenhvien}}</option>  
                                        @endforeach
                                    </select>
                                </div>
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