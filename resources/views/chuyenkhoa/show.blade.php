@extends('pages.layout.layouts')

    @section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Hospital</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('benhvien.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tên Chuyên Khoa:</strong>
                {{ $chuyenkhoa->tenchuyenkhoa }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tên Bệnh Viện</strong>
                {{$chuyenkhoa->benhvien->tenbenhvien}}
            </div>
        </div>
    </div>
@endsection