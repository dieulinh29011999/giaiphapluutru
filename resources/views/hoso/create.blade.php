@extends('pages.layout.layouts')

@section('content')
<section class="content-header" style="background-color:#dcedc8">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>THÊM HỒ SƠ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('hoso.index')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('hoso.index')}}">User</a> </li>
              <li class="breadcrumb-item active">Thêm hồ sơ</li>
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
              <form role="form" action="{{route('hoso.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleid">Mã hồ sơ</label>
                    <input type="text" class="form-control" id="mahoso" placeholder="Nhập mã hồ sơ" name="mahoso" value="{{old('mahoso')}}">
                  </div>
                 <div class="form-group">
                    <label for="exampleName">TÊN HỒ SƠ</label>
                    <input type="text" class="form-control" id="tenhoso" placeholder="Nhập tên nhân viên" name="tenhoso" value="{{old('tenhoso')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">NGÀY TẠO</label>
                    <input type="date" class="form-control" id="ngaytao" placeholder="Nhập ngày tao" name="ngaytao" value="{{old('ngaytao')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">NGÀY BAN HÀNH</label>
                    <input type="date" class="form-control" id="ngaybanhanh" placeholder="Nhập ngày banhanh" name="ngaybanhanh" value="{{old('ngaybanhanh')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">THỜI HẠN HỒ SƠ</label>
                    <input type="date" class="form-control" id="thoihanhoso" placeholder="Nhập ngày sinh" name="thoihanhoso" value="{{old('thoihanhoso')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">THỜI HẠN LƯU TRỮ</label>
                    <input type="text" class="form-control" id="thoihanluutru" placeholder="Nhập ngày sinh" name="thoihanluutru" value="{{old('thoihanluutru')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleName">Giới Tính</label>
                      <select name="tinhtrang" id="tinhtrang" class="form-control">
                          <option value="Đang xử lý">Đang xử lý</option>
                          <option value="Đã xử lý">Đã xử lý</option>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleName">MỨC ĐỘ</label>
                      <select name="mucdo" id="mucdo" class="form-control">
                          <option value="KHẨN">KHẨN</option>
                          <option value="THƯỜNG">THƯỜNG</option>
                      </select>
                  </div>
                  {{-- <div class="form-group">
                    <label for="exampleInputEmail1">địa chỉ</label>
                    <input type="text" class="form-control" id="noiluutrubandau" placeholder="Nhập địa chỉ" name="noiluutrubandau" value="{{old('noiluutrubandau')}}">
                  </div> --}}
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nơi lưu trữ hồ sơ ban đầu</label>
                    <select name="noiluutrubandau" class="browser-default custom-select">
                      <option value="">--chọn nơi lưu trữ--</option>
                      @foreach($phongban as $value)
                        <option value="{{$value->id}}" >{{$value->tenphongban}}</option>  
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">file đính kèm</label>
                    <input type="file" class="form-control" id="filedinhkem" placeholder="Nhập địa chỉ" name="filedinhkem" value="{{old('filedinhkem')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nơi nhận</label>
                    <input type="text" class="form-control" id="noinhan" placeholder="Nhập số điện thoại" name="noinhan" value="{{old('noinhan')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Người phụ trách</label>
                    <input type="text" class="form-control" id="nguoiphutrach" placeholder="Nhập nguoiphutrach" name="nguoiphutrach" value="{{old('nguoiphutrach')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Loại hồ sơ</label>
                    <select name="id_loai" class="browser-default custom-select">
                      <option value="">--Chọn loại hồ sơ--</option>
                      @foreach($loaihoso as $value)
                        <option value="{{$value->id}}" >{{$value->tenloai}}</option>  
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">chọn phòng ban</label>
                    <select name="nguoiphutrach" class="browser-default custom-select">
                      <option value="">--Nhân viên phụ trách--</option>
                      @foreach($nhanvien as $value)
                        <option value="{{$value->id}}" >{{$value->tennhanvien}}</option>  
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">vị trí tủ</label>
                    <select name="id_vitri" class="browser-default custom-select">
                      <option value="">--Chọn vị trí tủ--</option>
                      @foreach($vitri as $value)
                        <option value="{{$value->id}}" >{{$value->mavitri}}</option>  
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
