@extends('pages.layout.layouts')

@section('content')
<section class="content-header" style="background-color:#dcedc8">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> THÊM NHÂN VIÊN MỚI</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('nhanvien.index')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('nhanvien.index')}}">Nhân viên</a> </li>
              <li class="breadcrumb-item active">Thêm nhân viên</li>
            </ol>
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
    <section class="content"   style="background-color:#dcedc8">
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary"  style="background-color:#e8f5e9">
              <div class="card-header">
                <div class="card-title"> 
                  <strong>INFORMATION</strong>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('nhanvien.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleid">Mã nhân viên </label>
                    <input type="text" class="form-control" id="manhanvien" placeholder="Nhập mã nhân viên" name="manhanvien" value="{{old('manhanvien')}}">
                  </div>
                 <div class="form-group">
                    <label for="exampleName">Tên nhân viên</label>
                    <input type="text" class="form-control" id="tennhanvien" placeholder="Nhập tên nhân viên" name="tennhanvien" value="{{old('tennhanvien')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ngày Sinh</label>
                    <input type="date" class="form-control" id="ngaysinh" placeholder="Nhập ngày sinh" name="ngaysinh" value="{{old('ngaysinh')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">địa chỉ</label>
                    <input type="text" class="form-control" id="diachi" placeholder="Nhập địa chỉ" name="diachi" value="{{old('diachi')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Số điện thoại</label>
                    <input type="text" class="form-control" id="sodienthoai" placeholder="Nhập số điện thoại" name="sodienthoai" value="{{old('sodienthoai')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Nhập email" name="email" value="{{old('email')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleName">Giới Tính</label>
                      <select name="gioitinh" id="gioitinh" class="form-control">
                          <option value="1">Nam</option>
                          <option value="0">Nữ</option>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">phòng ban</label>
                    <select name="id_phongban" class="browser-default custom-select">
                      <option value="">--Chọn phòng ban--</option>
                      @foreach($phongban as $value)
                        <option value="{{$value->id}}" >{{$value->tenphongban}}</option>  
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">chức vụ</label>
                    <select name="id_chucvu" class="browser-default custom-select">
                      <option value="">--Chọn chức vụ--</option>
                      @foreach($chucvu as $value)
                        <option value="{{$value->id}}" >{{$value->tenchucvu}}</option>  
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Chọn tài khoản</label>
                    <select name="id_user" class="browser-default custom-select">
                      <option value="">--Chọn tài khoản--</option>
                      @foreach($user as $value)
                        <option value="{{$value->id}}" >{{$value->tenuser}}</option>  
                        @endforeach
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
         
        </div>
      </div>
    </section>

@endsection
