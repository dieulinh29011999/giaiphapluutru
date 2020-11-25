@extends('pages.layout.layouts')

@section('content')
<section class="content-header" style="background-color:#dcedc8">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8" >
            <h1>HỒ SƠ</h1>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-success" href="{{ route('hoso.create') }}"> THÊM HỒ SƠ MỚI</a>
          </div>
          <div class="col-sm-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('hoso.index')}}">Home</a></li>
              <li class="breadcrumb-item active">HỒ SƠ</li>
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
                      <th>Mã hồ sơ</th>
                      <th>Trích yếu nội dung </th>
                      <th>File đính kèm</th>
                      <th>Tên loại hồ sơ</th>
                      <th>ngày ban hành</th>
                      <th>ngày tạo</th>
                      <th>thời hạn hồ sơ</th>
                      <th>thời hạn lưu trữ</th>
                      <th>tình trạng</th>
                      <th>nơi lưu trữ ban đầu</th>
                      <th>Tên chi nhánh</th>
                      <th>nơi nhận</th>
                      <th>mức độ</th>
                      <th>người phụ trách</th>
                      <th>người tạo</th>
                      <th>Số dãy</th>
                      <th>số tủ</th>
                      <th>số kệ</th>
                      <th>số ngăn</th>
                      <th>Thao Tác</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($hoso as $hosos)
                    <tr>
                      <td>{{$hosos->id}}</td>
                      <td>{{$hosos->mahoso}}</td>
                      <td>{{$hosos->tenhoso}}</td>
                      <td>{{$hosos->filedinhkem}}</td>
                      <td>{{$hosos->loaihoso->tenloai}}</td>
                      {{-- <td>{{$hosos->ngaybanhanh}}</td> --}}
                      <td>{{ Carbon\Carbon::parse($hosos->ngaybanhanh)->format('d/m/Y') }}</td>
                      <td>{{ Carbon\Carbon::parse($hosos->ngaytao)->format('d/m/Y') }}</td>
                      {{-- <td>{{$hosos->ngaytao}}</td> --}}
                      <td>{{ Carbon\Carbon::parse($hosos->thoihanhoso)->format('d/m/Y') }}</td>
                      {{-- <td>{{$hosos->thoihanhoso}}</td> --}}
                      <td>{{$hosos->thoihanluutru}}</td>
                      <td>{{$hosos->tinhtrang}}</td>
                      <td>{{$hosos->phongban->tenphongban}}</td>
                      <td>{{$hosos->phongban->chinhanh->tenchinhanh}}</td>
                      <td>{{$hosos->noinhan}}</td>
                      <td>{{$hosos->mucdo}}</td>
                      <td>{{$hosos->nguoiphutrach}}</td>
                      <td>{{$hosos->user->id}}</td>
                      <td>{{$hosos->vitri->soday}}</td>
                      <td>{{$hosos->vitri->sotu}}</td>
                      <td>{{$hosos->vitri->soke}}</td>
                      <td>{{$hosos->vitri->songan}}</td>
                      <td>
                        <a class="btn btn-info" href="{{ route('hoso.show',$hosos->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('hoso.edit',$hosos->id) }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['hoso.destroy', $hosos->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {!! $hoso->links()!!}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>

@endsection
