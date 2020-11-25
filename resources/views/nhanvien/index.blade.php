@extends('pages.layout.layouts')

@section('content')
<section class="content-header" style="background-color:#dcedc8">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8" >
            <h1>NHÂN VIÊN</h1>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-success" href="{{ route('nhanvien.create') }}"> THÊM NHÂN VIÊN MỚI</a>
          </div>
          <div class="col-sm-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('nhanvien.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Nhân viên</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <p>{{ $message }}</p>
    </div>
    @endif
    <div class="row" style="background-color:#dcedc8">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;" style="background-color:#e0e0e0">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                      <button class="btn btn-navbar" type="submit" style="background-color:#e0e0e0">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead  style="background-color:#b4a647">
                    <tr>
                      <th>ID </th>
                      <th>Mã nhân viên</th>
                      <th>Tên nhân viên</th>
                      <th>giới tính</th>
                      <th>ngày sinh</th>
                      <th>số điện thoại</th>
                      <th>địa chỉ</th>
                      <th>email</th>
                      <th>phòng ban</th>
                      <th>Chi nhánh</th>
                      <th>chức vụ</th>
                      <th>tên user</th>
                      <th>Thao Tác</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($nhanvien as $nhanviens)
                    <tr>
                      <td>{{$nhanviens->id}}</td>
                      <td>{{$nhanviens->manhanvien}}</td>
                      <td>{{$nhanviens->tennhanvien}}</td>
                      <td>{{$nhanviens->gioitinh}}</td>
                      <td>{{$nhanviens->ngaysinh}}</td>
                      <td>{{$nhanviens->sodienthoai}}</td>
                      <td>{{$nhanviens->diachi}}</td>
                      <td>{{$nhanviens->email}}</td>
                      <td>{{$nhanviens->phongban->tenphongban}}</td>
                      <td>{{$nhanviens->phongban->chinhanh->tenchinhanh}}</td>
                      <td>{{$nhanviens->chucvu->tenchucvu}}</td>
                      <td>{{$nhanviens->user->tenuser}}</td>

                      <td>
                        <a class="btn btn-info" href="{{ route('nhanvien.show',$nhanviens->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('nhanvien.edit',$nhanviens->id) }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['nhanvien.destroy', $nhanviens->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {!! $nhanvien->links()!!}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>

@endsection
