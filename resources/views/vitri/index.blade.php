@extends('pages.layout.layouts')

@section('content')
<section class="content-header" style="background-color:#dcedc8">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8" >
            <h1>VỊ TRÍ</h1>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-success" href=""> THÊM VỊ TRÍ MỚI</a>
          </div>
          <div class="col-sm-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('vitri.index')}}">Home</a></li>
              <li class="breadcrumb-item active">VỊ TRÍ</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <p>{{ $message }}</p>
    </div>
    @endif
    <div class="row" style="background-color:#dcedc8">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;" style="background-color:#e0e0e0">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                      <button class="btn btn-navbar" type="submit" style="background-color:#e0e0e0">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead  style="background-color:#b4a647">
                    <tr>
                      <th>ID</th>
                      <th>Mã Vị Trí</th>
                      <th>Số dãy</th>
                      <th>Số Tủ</th>
                      <th>Số kệ</th>
                      <th>Số Ngăn</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($vitri as $vitris)
                    <tr>
                      <td>{{$vitris->id}}</td>
                      <td>{{$vitris->mavitri}}</td>
                      <td>{{$vitris->soday}}</td>
                      <td>{{$vitris->sotu}}</td>
                      <td>{{$vitris->soke}}</td>
                      <td>{{$vitris->songan}}</td>
                      <td>
                        <a class="btn btn-info" href="{{ route('users.show',$vitris->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('users.edit',$vitris->id) }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $vitris->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {!! $vitri->links()!!}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>

@endsection
