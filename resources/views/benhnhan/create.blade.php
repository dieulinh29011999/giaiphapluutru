@extends('pages.layout.layouts')
@section('title')
Thêm Mới Bệnh Nhân
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Patient Form</h1>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb pink lighten-2 float-sm-right">
                            <li class="breadcrumb-item"><i class="far fa-star mr-2 white-text" aria-hidden="true"></i><a
                                class="white-text" href="{{route('benhnhan.index')}}">Home</a></li>
                            <li class="breadcrumb-item"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i><a
                                class="white-text" href="{{route('benhnhan.index')}}" accesskey="p">Patient</a></li>
                            <li class="breadcrumb-item active"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i>Create Patient Form </li>
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
                            <h3 class="card-title">Thông Tin Bệnh Nhân</h3>
                        </div>
              <!-- /.card-header -->
              <!-- form start -->
                        <form role="form" action="{{route('benhnhan.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleName">Tên Bệnh Nhân</label>
                                            <input type="text" class="form-control" id="hovaten" 
                                            placeholder="Họ Và Tên Bệnh Nhân" name="hovaten" value="{{old('hovaten')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleName">Ngày Sinh</label>
                                            <input class="form-control" data-provide="datepicker" 
                                            placeholder="dd-mm-yyyy" name="ngaysinh" data-toggle="datepicker" 
                                            autocomplete="off" id="ngaysinh" required /  value="{{old('ngaysinh')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleName">Giới Tính</label>
                                                <select name="gioitinh" id="gioitinh" class="form-control">
                                                    <option value="Male">Nam</option>
                                                    <option value="Female">Nữ</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Số điện thoại</label>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input name="sodienthoai" type="text" id="sodienthoai" 
                                                class="form-control" placeholder="Nhập Số điện thoại"  
                                                value="{{old('sodienthoai')}}">
                                            </div>
                                            
                                        </div>
                                        <p id="demo"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleName"> Địa chỉ</label>
                                        <input type="text" class="form-control" id="diachi" 
                                        placeholder="Địa chỉ" name="diachi" value="{{old('diachi')}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email Bệnh Nhân</label>
                                        <input type="email" class="form-control" id="email" 
                                        name="email" placeholder="Email bệnh nhân" value="{{old('email')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleName">Ngày Khám</label>
                                        <input type="" class="form-control" id="ngaykham" placeholder="dd-mm-yyyy" data-provide="datepicker" name="ngaykham" value="{{old('ngaykham')}}" name="ngaykham" autocomplete="off"  >
                                    </div>                 
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bệnh viện</label>
                                            <select name="id_benhvien"  class="form-control input-lg dynamic" 
                                            data-dependent="id_chuyenkhoa">
                                                <option value="">--Chọn bệnh viện--</option>
                                                    @foreach($benhvien as $value)
                                                        <option value="{{$value->id}}" >{{$value->tenbenhvien}}</option>  
                                                    @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Chuyên Khoa</label>
                                            <select name="id_chuyenkhoa"  class="form-control input-lg dynamic" 
                                            data-dependent="id_bacsi">
                                                <option value="">--Chọn chuyên khoa--</option>
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bác sĩ</label>
                                            <select name="id_bacsi" class="form-control input-lg">
                                                <option value="">--Chọn bác sĩ--</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Khung giờ</label>
                                            <select name="id_khunggio" class="browser-default custom-select">
                                                <option value="">--Chọn khung giờ--</option>
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button  type="submit" class="btn btn-dark" >Submit</button>
                            </div>
                        </form>
                    </div>
            <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById("myBtn").onclick = PhoneNumberValidation;
        function PhoneNumberValidation() {
    
            var sodienthoai = document.getElementById("sodienthoai").value;
            var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
            var mobileno = /^((\\+91-?)|0)?[0-9]{10}$/;
            if ((sodienthoai.match(phoneno)) || (sodienthoai.match(mobileno))) {
                document.getElementById("demo").innerHTML = "Valid";
            }
            else {
                document.getElementById("demo").innerHTML = "Not Valid";
            }
        
        }
        </script>
@endsection