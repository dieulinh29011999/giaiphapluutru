@extends('pages.layout.layouts')

@section('content')
<section class="content-header" style="background-color:#dcedc8">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>TẠO CHI NHÁNH</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('vitri.index')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('vitri.index')}}">Loại sách</a> </li>
              <li class="breadcrumb-item active">Tạo loại sách</li>
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
              <form role="form" action="{{route('vitri.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                 <div class="form-group">
                    <label for="exampleName">Mã vị trí</label>
                    <input type="text" class="form-control" id="mavitri" placeholder="Mã vị trí" name="mavitri" value="{{old('mavitri')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Số dãy</label>
                    <input type="text" class="form-control" id="soday" placeholder="số dãy" name="soday" value="{{old('soday')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Số Tủ</label>
                    <input type="text" class="form-control" id="sotu" placeholder="số tủ" name="sotu" value="{{old('sotu')}}">
                  </div>                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Số Kệ </label>
                    <input type="text" class="form-control" id="soke" placeholder="Số kệ" name="soke" value="{{old('soke')}}">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Số Ngăn</label>
                    <input type="text" class="form-control" id="songan" placeholder="Số ngăn" name="songan" value="{{old('songan')}}">
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
