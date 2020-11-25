@extends('pages.layout.layouts')
@section('title')
Báo cáo chi tiết bệnh nhân đã chuyển giao cho bệnh viện Chợ Rẫy
@endsection
@section('content')
<div class="col-12">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-bordered" style="text-align: center">
                <thead class="table-dark" style="text-align: center">
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
                    @can('patient-edit','patient-delete')
                    <th>Danh Số Điện Thoại Viên</th>
                    <th>Chuyển giao</th>
                    @endcan
                </thead>
                @foreach ($get_choraychuyen as $key => $b)
                <tbody>
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
                    @can('patient-edit','patient-delete')
                    <td>{{$b->user->danhso}}</td>
                    <td> Đã chuyển</td>
                    @endcan
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection