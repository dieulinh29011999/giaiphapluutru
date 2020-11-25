<p><b>Cộng Hòa Xã Hội Chủ Nghĩa Việt Nam</b></p>
<p><b> Độc lập - Tự do - Hạnh phúc</b></p>
<p> <b>Bệnh nhân đăng kí đặt lịch khám bệnh qua tổng đài 0281068</b></p>
<table>
    <thead>
    <tr>
        <th style="width:25px"><b>Bệnh viện</b></th>
        <th style="width:25px"><b>Tên Bệnh Nhân</b></th>
        <th style="width:20px"><b>Ngày Sinh</b></th>
        <th style="width:10px"><b>Giới Tính</b></th>
        <th style="width:20px"><b>Số Điện Thoại</b></th>
        <th style="width:30px"><b>Email</b></th>
        <th style="width:25px"><b>Tên Bác Sĩ</b></th>
        <th style="width:25px"><b>Tên Chuyên Khoa</b></th>
        <th style="width:20px"><b>Ngày Khám</b></th>
        <th style="width:15px"><b>Khung giờ khám</b></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($benhnhan as $key => $value)
        <tr>
            <td><b> {{$value->benhvien->tenbenhvien}}</b></td>
            <td>{{$value->hovaten}}</td>
            <td>{{ Carbon\Carbon::parse($value->ngaysinh)->format('d/m/Y') }}</td>
            <td>{{ $value->gioitinh }}</td>
            <td>{{ $value->sodienthoai }}</td>
            <td>{{ $value->email}}</td>
            <td>{{ $value->bacsi->tenbacsi }}</td>
            <td>{{ $value->chuyenkhoa->tenchuyenkhoa}}</td>
            <td>{{ Carbon\Carbon::parse($value->ngaykham)->format('d/m/Y') }}</td>
            <td>{{ $value->khunggio->khunggio }}</td>
        </tr>
    @endforeach
    </tbody>
</table>