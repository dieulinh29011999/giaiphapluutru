@extends('pages.layout.layouts')
@section('title')
Bảng Danh Sách Khung Giờ
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>TIME TABLE</h1>
                </div>
                <div class="col-sm-2">
                    @can('time-create')
                    <a class="btn btn-success" href="{{route('khunggio.create')}}" accesskey="c"> Create New Time</a>
                    @endcan
                </div>
                <div class="col-sm-4">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb pink lighten-2 float-sm-right">
                            <li class="breadcrumb-item"><i class="far fa-star mr-2 white-text" aria-hidden="true"></i><a
                                class="white-text" href="{{route('benhnhan.index')}}">Home</a></li>
                            <li class="breadcrumb-item"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i><a
                                class="white-text" href="{{route('khunggio.index')}}">Time</a></li>
                            <li class="breadcrumb-item active"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i> Time Table</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
    <p>{{ $message }}</p>
    </div>
    @endif
    <div class="col-12">
        <div class="card-tools mb-2">
            <form action="{{route('khunggio.index')}}" class="form-inline d-flex justify-content-center md-form form-sm" method="GET" role="search">
              <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                aria-label="Search" id="key" name="key" value="" >
              <i class="fas fa-search" aria-hidden="true"></i>
            </form>
          </div>
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-bordered" style="text-align: center">
                <thead class="table-dark" style="text-align: center">
                    <th>STT</th>
                    <th>Khung giờ</th>
                    <th>Tên Bệnh Viện</th>
                    <th>Tên chuyên khoa</th>
                    <th>Giới hạn lượt đặt</th>
                    @can('time-edit','time-delete')
                    <th width="120px">Action</th>
                    @endcan
                </thead>
                @foreach ($khunggio as $key => $value)
                <tbody>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $value->khunggio }}</td>
                    <td>{{ $value->benhvien->tenbenhvien}}</td>
                    <td>{{ $value->chuyenkhoa->tenchuyenkhoa}}</td>
                    <td>{{ $value->gioihan}}</td>
                    @can('time-edit','time-delete')
                    <td>
                        <a href="{{ route('khunggio.edit',$value->id) }}"><i class="fas fa-edit mr-3"></i></a>
                        <i class="fa fa-trash"  data-userid= {{$value->id}} data-toggle="modal" data-target="#myModal{{ $i}}"></i>
                    </td>
                    @endcan
                </tbody>
                <div class="modal modal-danger fade" id="myModal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                <h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
                            </div>
                            <form action="{{route('khunggio.destroy', $value->id)}}" method="post">
                                {{method_field('delete')}}
                                {{csrf_field()}}
                                    <div class="modal-body">
                                        <p class="text-center">
                                            Bạn có chắc chắn muốn xóa khung giờ <b> {{ $value->khunggio }} </b> này không?
                                        </p>
                                        <input type="hidden" name = "id_khunggio" id="khunggio_id" value="">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger" data-target="myModal{{ $i }}" >Xóa ngay</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
              </table>
            </div>
        </div>
        {!! $khunggio->links() !!}
    </div>
@endsection