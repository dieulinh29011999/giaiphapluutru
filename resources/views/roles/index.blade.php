@extends('pages.layout.layouts')
{{-- style="background-color:#dcedc8" --}}
@section('title')
Bảng Danh Sách Phân Quyền Người Dùng
@endsection
@section('content')
<section class="content-header" style="">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-5" >
            <h1>ROLE TABLE</h1>
            </div>
            <div class="col-sm-3">
                @can('role-create')
                <a class="btn btn-success" href="{{ route('roles.create') }}" accesskey="c"> Create New Role</a>
                @endcan
            </div>
            <div class="col-sm-4">
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb pink lighten-2 float-sm-right">
                        <li class="breadcrumb-item"><i class="far fa-star mr-2 white-text" aria-hidden="true"></i><a
                            class="white-text" href="{{route('users.index')}}">Home</a></li>
                        <li class="breadcrumb-item"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i><a
                            class="white-text" href="{{route('roles.index')}}">Role</a></li>
                        <li class="breadcrumb-item active"><i class="far fa-star mx-2 white-text" aria-hidden="true"></i>Role table</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
@if ($message = Session::get('success'))
    <div class="alert alert-success">    
        <button type="button" class="close" data-dismiss="alert">x</button>

        <p>{{ $message }}</p>
    </div>
@endif

<div class="col-12">
    <div class="card-tools mb-2">
        <form action="{{route('roles.index')}}" class="form-inline d-flex justify-content-center md-form form-sm" method="GET" role="search">
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
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </theada>
                    @foreach ($roles as $key => $role)
                <tbody>
                    <td>{{ ++$i }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a href="{{ route('roles.show',$role->id) }}"><i class="fas fa-eye mr-3"></i></a>
                        @can('role-edit')
                        <a href="{{ route('roles.edit',$role->id) }}"><i class="fas fa-edit mr-3"></i></a>
                        @endcan
                        @can('role-delete')
                        {{-- {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!} --}}
                        <i class="fa fa-trash"  data-userid= {{$role->id}} data-toggle="modal" data-target="#myModal{{ $i}}"></i>
                        @endcan
                    </td>
                   
                </td>
            </tbody>
            <div class="modal modal-danger fade" id="myModal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                            <h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
                        </div>
                        <form action="{{route('roles.destroy', $role->id)}}" method="post">
                            {{method_field('delete')}}
                            {{csrf_field()}}
                                <div class="modal-body">
                                    <p class="text-center">
                                        Bạn có chắc chắn muốn xóa phân quyền <b> {{ $role->name }} </b> này không?
                                    </p>
                                    <input type="hidden" name = "id_role" id="role_id" p="">

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" data-target="myModal{{ $i }}" >Xóa ngay</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

                {{-- </tbody> --}}
                @endforeach
            </table>
        </div>
    </div>
    {!! $roles->links() !!}
</div>


@endsection
