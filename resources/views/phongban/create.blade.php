@extends('pages.layout.layouts')

@section('content')
<section class="content-header" style="background-color:#dcedc8">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>TẠO PHÒNG BAN</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('phongban.index')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('phongban.index')}}">Phòng ban</a> </li>
              <li class="breadcrumb-item active">Tạo phòng ban</li>
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
              <form role="form" action="{{route('phongban.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                 <div class="form-group">
                    <label for="exampleName">Mã Phòng Ban</label>
                    <input type="text" class="form-control" id="maphongban" placeholder="Mã phòng ban" name="maphongban" value="{{old('maphongban')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên Phòng Ban</label>
                    <input type="text" class="form-control" id="tenphongban" placeholder="Tên phòng ban" name="tenphongban" value="{{old('tenphongban')}}">
                  </div>                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên Chi Nhánh</label>
                    <select name="id_chinhanh" class="browser-default custom-select">
                      <option>--- Chọn chi nhánh---</option>
                      @foreach($chinhanh as $value)
                        <option value="{{$value->id}}" >{{$value->tenchinhanh}}</option>  
                      @endforeach
                    </select>
                  </div>
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
