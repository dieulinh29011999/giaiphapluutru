
@extends('pages.layout.layouts')
@section('title')
Bảng Danh Sách Bệnh Nhân
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <h1>PATIENT EXPORT</h1>
            </div>
        </div>
    </div>
</section>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-dark">
                                    <div class="card-header">
                                        <h3 class="card-title">Export Patient</h3>
                                    </div>
                                    <form action="{{route('exportBN')}}" method="GET" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row">
                                        <div class="col-sm-4">
                                            <select name="id_benhvien" class="browser-default custom-select">
                                                @foreach($benhvien as $bv)
                                                    <option value="{{$bv->id}}">{{$bv->tenbenhvien}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" name="start-datebn" id="start-datebn" data-provide="datepicker" class="form-control" placeholder="Từ ngày " autocomplete="off">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" name="end-datebn" id="end-datebn" data-provide="datepicker" class="form-control" placeholder="Đến ngày" autocomplete="off">
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-success" >Export Patient Data</button>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <h5><strong> Lưu ý: Giám sát viên xuất File và gửi cho Bệnh viện vào mỗi sáng thứ 2 thứ 4 và thứ 6 và thứ 7 và đánh dấu tích vào Tình trạng chuyển giao</strong></h5>
                    </div>
                </section>
                
    @endsection