@extends('pages.layout.layouts')

@section('content')
<section class="content-header" style="background-color:#dcedc8">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>THÊM CHI NHÁNH</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('chinhanh.index')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('chinhanh.index')}}">Chi nhánh</a> </li>
              <li class="breadcrumb-item active">Thêm chi nhánh</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>
    @if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif
    <section class="content"   style="background-color:#dcedc8">
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary"  style="background-color:#e8f5e9">
              <div class="card-header">
                <div class="card-title"> 
                  <strong>INFORMATION</strong>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('chinhanh.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                 <div class="form-group">
                    <label for="exampleName">Mã chi nhánh</label>
                    <input type="text" class="form-control" id="machinhanh" placeholder="Mã chi nhánh" name="machinhanh" value="{{old('machinhanh')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên chi nhánh</label>
                    <input type="text" class="form-control" id="tenchinhanh" placeholder="Tên chi nhánh" name="tenchinhanh" value="{{old('tenchinhanh')}}">
                  </div>                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ</label>
                    <input type="text" class="form-control" id="diachi" placeholder="Địa chỉ" name="diachi" value="{{old('diachi')}}">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>

@endsection
