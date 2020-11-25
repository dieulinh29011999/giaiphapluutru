@extends('pages.layout.layouts')
@section('title')
Sửa Đổi Thông Tin Bệnh Nhân
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Patient Form</h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb pink lighten-2 float-sm-right">
                        <li class="breadcrumb-item"><i class="far fa-star mr-2 white-text" aria-hidden="true"></i><a
                            class="white-text" href="{{route('benhnhan.index')}}">Home</a></li>
                        <li class="breadcrumb-item"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i><a
                            class="white-text" href="{{route('benhnhan.index')}}" accesskey="p">Patient</a></li>
                        <li class="breadcrumb-item active"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i>Edit Patient Form</li>
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
                    <div class="card card-dark" style="background-color:#e8f5e9">
                        <div class="card-header">
                            <h3 class="card-title">Information</h3>
                        </div>
                        {!! Form::model($benhnhan, ['method' => 'PATCH','route' => ['benhnhan.update', $benhnhan->id]]) !!}
                        {!! Form::model($benhnhan, ['method' => 'PATCH','route' => ['benhnhan.update', $benhnhan->id]]) !!}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <strong> Tình trạng chuyển giao</strong>
                                        <input class="form-check-input" value="1" name="chuyengiao" id="chuyengiao" style="margin-left: 10px" type="checkbox"  > 
                                    </div>
                                </div>
                                {{-- <div class="col-sm-6">
                                    <div class="form-group">
                                        <strong> Patient Name:</strong>
                                        {!! Form::text('email', null, array('placeholder' => 'email','class' => 'form-control')) !!}
                                    </div>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <strong> Patient Name:</strong>
                                        {!! Form::text('hovaten', null, array('placeholder' => 'Tên bệnh nhân','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <strong>Ngày Sinh:</strong>
                                        <br/>
                                        {!! Form::date('ngaysinh', null, array('placeholder' => 'Ngày Sinh','class' => 'form-control')) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <strong>Giới Tính:</strong>
                                        <br/>
                                        {!! Form::text('gioitinh', null, array('placeholder' => 'Giới Tính','class' => 'form-control', 'readonly')) !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <strong>Số Điện Thoại:</strong>
                                        <br/>
                                        {!! Form::text('sodienthoai', null, array('placeholder' => 'Số Điện Thoại','class' => 'form-control' )) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <strong>Ngày khám:</strong>
                                        <br/>
                                        {!! Form::date('ngaykham', null, array('placeholder' => 'Ngày Khám','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                {{-- <div class="col-sm-6">
                                    <div class="form-group">
                                        <strong>Số Điện Thoại:</strong>
                                        <br/>
                                        {!! Form::text('diachi', null, array('placeholder' => 'Địa chỉ','class' => 'form-control' )) !!}
                                    </div>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bệnh viện</label>
                                            <select name="id_benhvien" class="browser-default custom-select">
                                                <option value="">--Chọn bệnh viện--</option>
                                                    @foreach($benhvien as $value)
                                                        <option value="{{$value->id}}" {{($benhnhan->id_benhvien == $value->id) ? 'selected' : ''}} >{{$value->tenbenhvien}}</option>  
                                                    @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Chuyên Khoa</label>
                                            <select name="id_chuyenkhoa" class="browser-default custom-select">
                                                <option value="">--Chọn chuyên khoa--</option>
                                                    @foreach($chuyenkhoa as $ck)
                                                        <option value="{{$ck->id}}" {{($benhnhan->id_chuyenkhoa == $ck->id) ? 'selected' : ''}} >{{$ck->tenchuyenkhoa}}</option>  
                                                    @endforeach
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bác sĩ</label>
                                            <select name="id_bacsi" class="browser-default custom-select">
                                                <option value="">--Chọn bác sĩ--</option>
                                                    @foreach($bacsi as $bs)
                                                        <option value = "{{$bs->id}}" {{($benhnhan->id_bacsi == $bs->id) ? 'selected' : ''}}>{{$bs->tenbacsi}}</option>
                                                    @endforeach
                                                    </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Khung giờ</label>
                                            <select name="id_khunggio" class="browser-default custom-select">
                                                <option value="">--Chọn khung giờ--</option>
                                                @foreach($khunggio as $kg)
                                            <option value ="{{$kg->id}}" {{($benhnhan->id_khunggio == $kg->id) ? 'selected' : ''}}>{{$kg->khunggio}}</option>
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
                </div>
            </div>
        </div>
    </section>

@endsection