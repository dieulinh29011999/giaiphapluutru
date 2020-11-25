@extends('pages.layout.layouts')
@section('title')
Sủa Đổi Thông Tin Khung Giờ
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2>Edit Time</h2>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb pink lighten-2 float-sm-right">
                        <li class="breadcrumb-item"><i class="far fa-star mr-2 white-text" aria-hidden="true"></i><a
                            class="white-text" href="{{route('benhnhan.index')}}">Home</a></li>
                        <li class="breadcrumb-item"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i><a
                            class="white-text" href="{{ route('khunggio.index') }}" accesskey="t">Time</a></li>
                        <li class="breadcrumb-item active"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i>Edit Time</li>
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

                    {!! Form::model($khunggio, ['method' => 'PATCH','route' => ['khunggio.update', $khunggio->id]]) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <strong> Tên chuyên khoa</strong>
                                    {!! Form::text('khunggio', null, array('placeholder' => 'Khung giờ','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <strong>Address:</strong>
                                    <br/>
                                    <select name="id_benhvien" class="browser-default custom-select">
                                        @foreach($benhvien as $value)
                                        <option value="{{$value->id}}" {{($khunggio->id_benhvien == $value->id)? 'selected' : ''}}>{{$value->tenbenhvien}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chuyên Khoa</label>
                                        <select name="id_chuyenkhoa" class="browser-default custom-select">
                                            <option value="">--Chọn chuyên khoa--</option>
                                                @foreach($chuyenkhoa as $ck)
                                                    <option value="{{$ck->id}}" {{($khunggio->id_chuyenkhoa == $ck->id) ? 'selected' : ''}} >{{$ck->tenchuyenkhoa}}</option>  
                                                @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <strong> Giới hạn số lượng đặt khám</strong>
                                    {!! Form::text('gioihan', null, array('placeholder' => 'Số lượng','class' => 'form-control')) !!}
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