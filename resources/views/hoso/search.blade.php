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
                <div class="col-md-12 mt-2">
                    <!-- general form elements disabled -->
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Search </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <form action="{{route('homepage')}}" method="GET" role="search">
                            <label> Tìm kiếm chính xác</label>
                            <div class="row">
                                <div class=" col-sm-12 col-xs-12">
                                    <input class="form-control" type="text" placeholder="Search"
                                    aria-label="Search" id="key" value="{{ $key }}" name="key" value="" >
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-sm-6 col-xs-6">
                                    <label class="mt-2"> Tra cứu theo tên loại hồ sơ</label>
                                    <select class="form-control" name="tenloai">
                                        <option value="">---Tên loại hồ sơ---</option>
                                        @foreach($loaihoso as $value)
                                            <option value="{{ $value->id }}" {{ ($tenloai == $value->id) ? 'selected' : '' }}>{{ $value->tenloai }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" col-sm-6 col-xs-6">
                                    <label class="mt-2"> Tra cứu theo nơi lưu trữ ban đầu</label>
                                    <select class="form-control" name="tenphongban">
                                        <option value="">---Nơi lưu trữ hồ sơ ban đầu---</option>
                                        @foreach($phongban as $v)
                                            <option value="{{ $v->id }}" {{ ($tenphongban == $v->id) ? 'selected' : '' }}>{{ $v->tenphongban }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="row">
                                
                            </div> --}}
                            {{-- <div class="row">

                            </div> --}}
                            <div class="row">
                                <div class=" col-sm-6 col-xs-6">
                                    <label class="mt-2"> Tra cứu theo tên người nhập</label>
                                    <select class="form-control" name="tenuser">
                                        <option value="">---Tên người nhập---</option>
                                        @foreach($user as $u)
                                            <option value="{{ $u->id }}" {{ ($tenuser == $u->id) ? 'selected' : '' }}>{{ $u->tenuser }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" col-sm-6 col-xs-6">
                                    <label class="mt-2">Tra cứu theo mức độ  của hồ sơ</label>
                                    <select class="form-control" name="mucdo">
                                        <option value="">---Mức độ---</option>
                                            <option value="THƯỜNG" {{ ($mucdo == 'THƯỜNG') ? 'selected' : '' }}>THƯỜNG</option>
                                            <option value="KHẨN" {{ ($mucdo == 'KHẨN') ? 'selected' : '' }}>KHẨN</option>
                                    </select>
                                </div>
                            </div>
                            <label class="mt-2">Tra cứu theo ngày tạo</label>
                            <div class="row">
                                <div class=" col-sm-6 col-xs-6">
                                    <input class="form-control" type="text" placeholder="From"
                                    aria-label="Search" id="from" name="from" autocomplete="off" value="{{ ($from) ? Carbon\Carbon::parse($from)->format('d-m-Y') : NULL }}" >
                                </div>
                                <div class=" col-sm-6 col-xs-6">
                                    <input class="form-control" type="text" placeholder="To"
                                    aria-label="Search" id="to" autocomplete="off" name="to" value="{{ ($to) ? Carbon\Carbon::parse($to)->format('d-m-Y') : NULL }}" >
                                </div>
                            </div>
                           <button type="submit" class="btn btn-success mt-2">Search</button>
                         </form>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    
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
                    @foreach ($hoso as $key => $hosos)
                    <tbody>
                        <td>{{$hosos->id}}</td>
                      <td>{{$hosos->mahoso}}</td>
                      <td></tdv>{{$hosos->tenhoso}}</td>
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
                @endforeach
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