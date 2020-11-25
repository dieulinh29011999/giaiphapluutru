@extends('pages.layout.layouts')
@section('title')
Tra cứu hồ sơ
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1>TRA CỨU HỒ SƠ</h1>
                </div>
                <div class="col-sm-4">
                    <a class="btn btn-success" href="{{route('hoso.create')}}"> Hồ sơ</a>
                    <button class="btn btn-warning"  data-toggle="modal" data-target="#exportBN">Export</button>
                </div>
                <div class="col-sm-4">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb pink lighten-2 float-sm-right">
                            <li class="breadcrumb-item"><i class="far fa-star mr-2 white-text" aria-hidden="true"></i><a
                                class="white-text" href="{{route('hoso.index')}}">Home</a></li>
                            <li class="breadcrumb-item"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i><a
                                class="white-text" href="{{route('hoso.index')}}">Hồ sơ</a></li>
                            <li class="breadcrumb-item active"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i>Tra cứu  </li>
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
             
        </div>
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-bordered" style="text-align: center">
                    <thead class="table-dark" style="text-align: center">
                        <th>ID </th>
                      <th>Mã hồ sơ</th>
                      <th >Tên hồ sơ</th>
                      <th>File đính kèm</th>
                      <th>Tên loại hồ sơ</th>
                      <th>ngày ban hành</th>
                      <th>ngày tạo</th>
                      <th>thời hạn hồ sơ</th>
                      <th>thời hạn lưu trữ</th>
                      <th>tình trạng</th>
                      <th>nơi lưu trữ ban đầu</th>
                      <th>nơi nhận</th>
                      <th>mức độ</th>
                      <th>người phụ trách</th>
                      <th>người tạo</th>
                      <th>số tủ</th>
                      <th>số kệ</th>
                      <th>số ngăn</th>
                      <th width="120px">Thao Tác</th>
                    </thead>
                    {{-- @if($hoso->noiluutrubandau == $phongban->id) --}}
                    @foreach ($hoso as $key => $hosos)
                    @if($hosos->noiluutrubandau == $phongban)
                    <tbody>
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
                      <td>{{$hosos->noinhan}}</td>
                      <td>{{$hosos->mucdo}}</td>
                      <td>{{$hosos->nguoiphutrach}}</td>
                      <td>{{$hosos->user->id}}</td>
                      <td>{{$hosos->vitri->sotu}}</td>
                      <td>{{$hosos->vitri->soke}}</td>
                      <td>{{$hosos->vitri->songan}}</td>
                        <td>
                            {{-- <a class="btn btn-info" href="{{ route('hoso.show',$b->id) }}">Show</a> --}}
                            <a href="{{ route('hoso.edit',$hosos->id) }}"><i class="fas fa-edit mr-3"></i></a>
                            <i class="fa fa-trash" data-userid= {{$hosos->id}} data-toggle="modal" data-target="#myModal{{ $i}}"></i>
                        </td>
                    </tbody>
                    <div class="modal modal-danger fade" id="myModal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                    <h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
                                </div>
                                <form action="{{route('hoso.destroy', $hosos->id)}}" method="post">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <p class="text-center">
                                            Bạn có chắc chắn muốn xóa bệnh nhân <b> {{ $hosos->hovaten }} </b> này không?
                                        </p>
                                        <input type="hidden" name = "id_hoso" id="hoso_id" value="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger" data-target="myModal{{ $i }}" >Xóa ngay</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                {{-- @endif --}}
                </table>
            </div>
        </div>
    {!! $hoso->links() !!}
    </div>  
    {{-- <div class="modal modal-danger fade" id="exportBN" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                    <h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
                </div>
                <form action="{{route('exportBN')}}" method="GET" enctype="multipart/form-data">
                {{csrf_field()}}
                
                   <select name="id_benhvien">
                       @foreach($benhvien as $bv)
                        <option value="{{$bv->id}}">{{$bv->tenbenhvien}}</option>
                       @endforeach
                   </select>
                    <input type="date" name="start-date" class="form-control">
                    <input type="date" name="end-date" class="form-control">
                    <div class="modal-footer">
                        <button class="btn btn-success">Export Patienrs Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    @endsection