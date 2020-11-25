@extends('pages.layout.layouts')
@section('title')
Thêm Mới Khung Giờ
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Time Form</h1>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb pink lighten-2 float-sm-right">
                            <li class="breadcrumb-item"><i class="far fa-star mr-2 white-text" aria-hidden="true"></i><a
                                class="white-text" href="{{route('benhnhan.index')}}">Home</a></li>
                            <li class="breadcrumb-item"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i><a
                                class="white-text" href="{{route('khunggio.index')}}" accesskey="t">Time</a></li>
                            <li class="breadcrumb-item active"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i>Create Time Form</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <!-- goi session bao loi -->
        @if($mess=Session::get('error'))
            <div class="alert alert-danger">
                <li>{{ $mess }}</li>
            </div>
        @endif

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
            <!-- general form elements -->
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Thông Tin Khung Giờ</h3>
                        </div>
              <!-- /.card-header -->
              <!-- form start -->
                        <form role="form" action="{{route('khunggio.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleName">Khung Giờ</label>
                                    <input type="text" class="form-control" id="khunggio" placeholder="Khung Giờ" name="khunggio" value="{{old('tenchuyenkhoa')}}">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Bệnh viện</label>
                                            <select name="id_benhvien" class="browser-default custom-select">
                                                <option value="">--Chọn bệnh viện--</option>
                                                @foreach($benhvien as $value)
                                                <option value="{{$value->id}}" >{{$value->tenbenhvien}}</option>  
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Chuyên Khoa</label>
                                                <select name="id_chuyenkhoa" class="browser-default custom-select">
                                                    <option value="">--Chọn chuyên khoa--</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="gioihan"> Giới hạn lượt đặt khám</label>
                                    <input class="form-control" type="text" id="gioihan" placeholder="Số lượng" name="gioihan" value={{old('gioihan')}} >
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