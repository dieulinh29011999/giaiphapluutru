@extends('pages.layout.layouts')
@section('title')
Bảng Danh Sách Quyền
@endsection
@section('content')
<section class="content-header" style="">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" >
            <h1>PERMISSION TABLE</h1>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-success" href="{{ route('permissions.create') }}" accesskey="c"> Create New Permission</a>
          </div>
          <div class="col-sm-4">
            <nav aria-label="breadcrumb ">
              <ol class="breadcrumb pink lighten-2 float-sm-right">
                <li class="breadcrumb-item"><i class="far fa-star mr-2 white-text" aria-hidden="true"></i><a
                    class="white-text" href="{{route('users.index')}}">Home</a></li>
                <li class="breadcrumb-item"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i><a
                    class="white-text" href="{{route('permissions.index')}}">Permission</a></li>
                <li class="breadcrumb-item active"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i>Permission table</li>
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
          <form action="{{route('permissions.index')}}" class="form-inline d-flex justify-content-center md-form form-sm" method="GET" role="search">
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
                  <th>name</th>
                  <th>guard_name</th>
                  <th>Thao tác</th>
              </thead>
              <tbody>
                  @foreach($permissions as $p)
                  <td>{{$p->id}}</td>
                  <td>{{$p->name}}</td>
                  <td>{{$p->guard_name}}</td>
                  <td>
                    <a href="{{ route('permissions.show',$p->id) }}"><i class="fas fa-eye mr-3"></i></a>
                    <a href="{{ route('permissions.edit',$p->id) }}"><i class="fas fa-edit mr-3"></i></a>
                        {{-- {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $p->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'fa fa-trash']) !!}
                        {!! Form::close() !!} --}}
                  {{-- </td> --}}

                  <i class="fa fa-trash"  data-userid= {{$p->id}} data-toggle="modal" data-target="#myModal{{ $i}}"></i>
                    </td>
                </tbody>
                <div class="modal modal-danger fade" id="myModal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                <h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
                            </div>
                            <form action="{{route('permissions.destroy', $p->id)}}" method="post">
                                {{method_field('delete')}}
                                {{csrf_field()}}
                                    <div class="modal-body">
                                        <p class="text-center">
                                            Bạn có chắc chắn muốn xóa quyền <b> {{ $p->name }} </b> này không?
                                        </p>
                                        <input type="hidden" name = "id_permission" id="permission_id" p="">

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
              </tbody>
            </table>
          </div>
        </div>
            {!! $permissions->links()!!}
      </div>
              <!-- /.card-body -->

            <!-- /.card -->



@endsection
