@extends('pages.layout.layouts')

@section('content')
    <section class="content-header" style="">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6" >
                <h1>USERS TABLE</h1>
              </div>
              <div class="col-sm-3">
                <a class="btn btn-success" href="{{ route('users.create') }}" accesskey="c"> Create New User</a>
                <button class="btn btn-danger"  data-toggle="modal" data-target="#import" accesskey="i">Import</button>
                <button class="btn btn-warning"  data-toggle="modal" data-target="#export" accesskey="x">Export</button>
              </div>
              <div class="col-sm-3">
                <nav aria-label="breadcrumb ">
                  <ol class="breadcrumb pink lighten-2 float-sm-right">
                    <li class="breadcrumb-item"><i class="far fa-star mr-2 white-text" aria-hidden="true"></i><a
                        class="white-text" href="{{route('users.index')}}">Home</a></li>
                    <li class="breadcrumb-item"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i><a
                        class="white-text" href="{{route('users.index')}}">User</a></li>
                    <li class="breadcrumb-item active"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i>User table</li>
                  </ol>
                </nav>
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
    <div class="col-12">
      <div class="card-tools mb-2">
        <form action="{{route('users.index')}}" class="form-inline d-flex justify-content-center md-form form-sm" method="GET" role="search">
          <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
            aria-label="Search" id="key" name="key" value="" >
          <i class="fas fa-search" aria-hidden="true"></i>
        </form>
      </div>
      <div class="card">
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
              <table class="table table-bordered" style="text-align: center">
                  <thead class="table-dark" style="text-align: center">
                      <th>ID</th>
                      <th>Tên Tài Khoản</th>
                      <th>email</th>
                      <th>Mã Tài Khoản</th>
                      <th>avatar</th>
                      <th>Roles</th>
                      <th>Thao tác</th>
                  </thead>
                  <tbody>
                      @foreach($data as $datas)
                      <td>{{$datas->id}}</td>
                      <td>{{$datas->tenuser}}</td>
                      <td>{{$datas->email}}</td>
                      <td>{{$datas->mauser}}</td>
                      <td><img src="{{$datas->avatar}}" style="width:60px; height:60px" class="img-circle"></td>
                      <td>
                        @if(!empty($datas->getRoleNames()))
                            @foreach($datas->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                        @endif 
                    </td>
                      <td>
                        <a href="{{ route('users.show',$datas->id) }}"><i class="fas fa-eye mr-3"></i></a>
                        <a href="{{ route('users.edit',$datas->id) }}"><i class="fas fa-edit mr-3"></i></a>
                            {{-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $datas->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!} --}}
                            <i class="fa fa-trash"  data-userid= {{$datas->id}} data-toggle="modal" data-target="#myModal{{ $i}}"></i>
                      </td>
                      <div class="modal modal-danger fade" id="myModal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                    <h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
                                </div>
                                <form action="{{route('users.destroy', $datas->id)}}" method="post">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                        <div class="modal-body">
                                            <p class="text-center">
                                                Bạn có chắc chắn muốn xóa người dùng  <b> {{ $datas->name }} </b> này không?
                                            </p>
                                            <input type="hidden" name = "id_user" id="user_id" p="">
        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger" data-target="myModal{{ $i }}" >Xóa ngay</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                  </tbody>
                  @endforeach
              </table>
            </div>
          </div>
        </div>
                {!! $data->links()!!}
              <!-- /.card-body -->
            <!-- /.card -->
    </div>
    {{-- modal import --}}
    {{-- <div class="modal modal-danger fade" id="import" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                  <h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
              </div>
              <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
              <!-- {{method_field('delete')}} -->
              {{csrf_field()}}
                  <input type="file" name="file" class="form-control">
                  <div class="modal-footer">
                      <button class="btn btn-success">Import User Data</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
  {{-- modal export --}}
  {{-- <div class="modal modal-danger fade" id="export" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                <h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
            </div>
            <form action="{{route('export')}}" method="GET" enctype="multipart/form-data">
            {{csrf_field()}}
                <input type="date" name="start-date" class="form-control">
                <input type="date" name="end-date" class="form-control">
                <div class="modal-footer">
                    <button class="btn btn-success">Export User Data</button>
                </div>
            </form>
        </div>
    </div>
</div>  --}}
@endsection
