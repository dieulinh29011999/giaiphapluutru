@extends('pages.layout.layouts')
@section('title')
Bảng Danh Sách Bệnh Nhân
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1>PATIENT TABLE</h1>
                </div>
                <div class="col-sm-4">
                    <a class="btn btn-success" href="{{route('benhnhan.create')}}"> Create New Patient</a>
                    <button class="btn btn-warning"  data-toggle="modal" data-target="#exportBN">Export</button>
                </div>
                <div class="col-sm-4">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb pink lighten-2 float-sm-right">
                            <li class="breadcrumb-item"><i class="far fa-star mr-2 white-text" aria-hidden="true"></i><a
                                class="white-text" href="{{route('benhnhan.index')}}">Home</a></li>
                            <li class="breadcrumb-item"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i><a
                                class="white-text" href="{{route('benhnhan.index')}}">Patient</a></li>
                            <li class="breadcrumb-item active"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i>Table Patient  </li>
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
                        <form action="{{route('benhnhan.search')}}" method="GET" role="search">
                            <div class="row">
                                <div class=" col-sm-3 col-xs-3">
                                    <input class="form-control" type="text" placeholder="Search"
                                    aria-label="Search" id="key" value="{{ $key }}" name="key" value="" >
                                </div>
                                <div class=" col-sm-3 col-xs-3">
                                    <select class="form-control" name="tenbenhvien">
                                        <option value="">Tên bệnh viện</option>
                                        @foreach($benhvien as $value)
                                            <option value="{{ $value->id }}" {{ ($tenbenhvien == $value->id) ? 'selected' : '' }}>{{ $value->tenbenhvien }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" col-sm-3 col-xs-3">
                                    <input class="form-control" type="text" placeholder="From"
                                    aria-label="Search" id="from" name="from" autocomplete="off" value="{{ ($from) ? Carbon\Carbon::parse($from)->format('d-m-Y') : NULL }}" >
                                </div>
                                <div class=" col-sm-3 col-xs-3">
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
                        <th>STT</th>
                        <th>Tên Bệnh Nhân</th>
                        <th>Ngày Sinh</th>
                        <th>Giới Tính</th>
                        <th>Số Điện Thoại</th>
                        <th>Địa chỉ</th>
                        <th>Email Bệnh Nhân</th>
                        <th>Ngày Khám</th>
                        <th>Tên Bệnh Viện</th>
                        <th>Tên Bác Sĩ</th>
                        <th>Tên Chuyên Khoa</th>
                        <th>Khung Giờ Khám</th>
                        <th width="120px">Action</th>
                    </thead>
                    @foreach ($benhnhan as $key => $b)
                    <tbody>
                        <td>{{ ++$i }}</td>
                        <td>{{ $b->hovaten }}</td>
                        <td>{{ Carbon\Carbon::parse($b->ngaysinh)->format('d/m/Y') }}</td>
                        <td>{{ $b->gioitinh }}</td>
                        <td>{{ $b->sodienthoai }}</td>
                        <td>{{ $b->diachi}}</td>
                        <td>{{ $b->email}}</td>
                        <td>{{ Carbon\Carbon::parse($b->ngaykham)->format('d/m/Y') }}</td>
                        <td>{{ $b->benhvien->tenbenhvien}}</td>
                        <td>{{ $b->bacsi->tenbacsi }}</td>
                        <td>{{ $b->chuyenkhoa->tenchuyenkhoa}}</td>
                        <td>{{ $b->khunggio->khunggio }}</td>
                        <td>
                            {{-- <a class="btn btn-info" href="{{ route('benhnhan.show',$b->id) }}">Show</a> --}}
                            <a href="{{ route('benhnhan.edit',$b->id) }}"><i class="fas fa-edit mr-3"></i></a>
                            <i class="fa fa-trash" data-userid= {{$b->id}} data-toggle="modal" data-target="#myModal{{ $i}}"></i>
                        </td>
                    </tbody>
                    <div class="modal modal-danger fade" id="myModal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                    <h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
                                </div>
                                <form action="{{route('benhnhan.destroy', $b->id)}}" method="post">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <p class="text-center">
                                            Bạn có chắc chắn muốn xóa bệnh nhân <b> {{ $b->hovaten }} </b> này không?
                                        </p>
                                        <input type="hidden" name = "id_benhnhan" id="benhnhan_id" value="">
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
    {!! $benhnhan->links() !!}
    </div>  
    <div class="modal modal-danger fade" id="exportBN" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
    </div>
    @endsection