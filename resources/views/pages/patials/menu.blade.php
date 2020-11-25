<aside class="main-sidebar sidebar-dark-primary  elevation-4" style="      background: rgba(248, 248, 248, 0.82);">
    <!-- Brand Logo -->
    <a href="{{route('homepage')}}" class="brand-link" style="background-color:#2b2222; height:56px">
      <img src="logo\logohoasao.jpg" alt="Logo"  class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">BELL24 - HOA SAO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          {{-- @can('user-list','user-create') --}}
          <li class="nav-item has-treeview {{Request::is('users*') ? 'menu-open' : '' }} ">
            <a href="#" class="nav-link {{Request::is('users*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p style="color: black" style="color: black">
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{-- @can('user-list') --}}
              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link {{Request::is('users') ? 'active' : '' }}">
                  <i class="far fa-address-book nav-icon"></i>
                  <p style="color: black" style="color: black">List User</p>
                </a>
              </li>
              {{-- @endcan --}}
              {{-- @can('user-create') --}}
              <li class="nav-item">
                <a href="{{route('users.create')}}" class="nav-link {{Request::is('users/create') ? 'active' : '' }}">
                  <i class="far fa-address-card nav-icon"></i>
                  <p style="color: black" style="color: black">Create User</p>
                </a>
              </li>
              {{-- @endcan --}}
            </ul>
          </li>
          {{-- @endcan --}}
          {{-- @can('role-list','role-create') --}}
          <li class="nav-item has-treeview {{Request::is('roles*')  ? 'menu-open' : '' }} ">
            <a href="#" class="nav-link {{Request::is('roles*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tasks" style="color: black"></i>
              <p style="color: black">
                Roles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{-- @can('role-list') --}}
              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link {{Request::is('roles') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" style="color: black"></i>
                  <p style="color: black">List Roles</p>
                </a>
              </li>
              {{-- @endcan --}}
              {{-- @can('role-create') --}}
              <li class="nav-item">
                <a href="{{route('roles.create')}}" class="nav-link {{Request::is('roles/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" style="color: black"></i>
                  <p style="color: black">Create Roles</p>
                </a>
              </li>
              {{-- @endcan --}}
            </ul>
          </li>
          {{-- @endcan --}}
          {{-- @can('permission-list','permission-create') --}}
          <li class="nav-item has-treeview {{Request::is('permissions*')  ? 'menu-open' : '' }}">
            <a href="{{route('permissions.index')}}" class="nav-link {{Request::is('permissions') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tree" style="color: black"></i>
              <p style="color: black">
                Permissions
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{-- @can('permission-list') --}}
              <li class="nav-item">
                <a href="{{route('permissions.index')}}" class="nav-link {{Request::is('permissions') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" style="color: black"></i>
                  <p style="color: black">List Permissions</p>
                </a>
              </li>
              {{-- @endcan --}}
              {{-- @can('permission-create') --}}
              <li class="nav-item">
                <a href="{{route('permissions.create')}}" class="nav-link {{Request::is('permissions/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" style="color: black"></i>
                  <p style="color: black">Create Permissions</p>
                </a>
              </li>
              {{-- @endcan --}}
            </ul>
          </li>
          {{-- @endcan --}}
          {{-- @can('hospital-list','hospital-create') --}}
          <li class="nav-item has-treeview {{Request::is('chinhanh*')  ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{Request::is('chinhanh*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-hospital" style="color: black"></i>
              <p style="color: black">
                Chi Nhánh
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{-- @can('hospital-list') --}}
              <li class="nav-item">
                <a href="{{route('chinhanh.index')}}" class="nav-link {{Request::is('chinhanh') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" style="color: black"></i>
                  <p style="color: black">List Chi Nhánh</p>
                </a>
              </li>
              {{-- @endcan --}}
              {{-- @can('hospital-create') --}}
              <li class="nav-item">
                <a href="{{route('chinhanh.create')}}" class="nav-link {{Request::is('benhvien/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" style="color: black"></i>
                  <p style="color: black">Create Chi Nhánh</p>
                </a>
              </li>
              {{-- @endcan --}}
            </ul>
          </li>
          {{-- @endcan --}}
            {{-- @can('specialist-list','specialist-create') --}}
            <li class="nav-item has-treeview {{Request::is('phongban*')  ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{Request::is('phongban*')? 'active' : '' }}">
                <i class="nav-icon fas fa-edit" style="color: black"></i>
                <p style="color: black">
                    Phòng Ban
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            <ul class="nav nav-treeview">
              {{-- @can('specialist-list') --}}
              <li class="nav-item">
                <a href="{{route('phongban.index')}}" class="nav-link {{Request::is('phongban') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" style="color: black"></i>
                  <p style="color: black">List Phòng Ban</p>
                </a>
              </li>
              {{-- @endcan --}}
              {{-- @can('specialist-create') --}}
              <li class="nav-item">
                <a href="{{route('phongban.create')}}" class="nav-link {{Request::is('phongban/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" style="color: black"></i>
                  <p style="color: black">Create Phòng Ban</p>
                </a>
              </li>
              {{-- @endcan --}}
            </ul>
          </li>
          {{-- @endcan --}}
          {{-- @can('doctor-list','doctor-create') --}}
          <li class="nav-item has-treeview {{Request::is('chucvu*')  ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{Request::is('chucvu*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-md" style="color: black"></i>
              <p style="color: black">
                Chức vụ
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{-- @can('doctor-list') --}}
              <li class="nav-item">
                <a href="{{route('chucvu.index')}}" class="nav-link {{Request::is('chucvu') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" style="color: black"></i>
                  <p style="color: black">List Chức Vụ </p>
                </a>
              </li>
              {{-- @endcan --}}
              {{-- @can('doctor-create') --}}
              <li class="nav-item">
                <a href="{{route('chucvu.create')}}" class="nav-link {{Request::is('bacsi/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" style="color: black"></i>
                  <p style="color: black">Create Chức Vụ</p>
                </a>
              </li>
              {{-- @endcan --}}
            </ul>
          </li>
            {{-- @endcan --}}
            {{-- @can('time-list','time-create') --}}
              <li class="nav-item has-treeview {{Request::is('nhanvien*')  ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{Request::is('nhanvien*')? 'active' : '' }}">
                  <i class="nav-icon fas fa-clock" style="color: black"></i>
                  <p style="color: black">
                    Nhân Viên
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  {{-- @can('time-list') --}}
                  <li class="nav-item">
                    <a href="{{route('nhanvien.index')}}" class="nav-link {{Request::is('nhanvien') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon" style="color: black"></i>
                      <p style="color: black">List Nhân Viên </p>
                    </a>
                  </li>
                  {{-- @endcan --}}
                  {{-- @can('time-create') --}}
                  <li class="nav-item">
                    <a href="{{route('nhanvien.create')}}" class="nav-link {{Request::is('nhanvien/create') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon" style="color: black"></i>
                      <p style="color: black">Create Nhân Viên</p>
                    </a>
                  </li>
                  {{-- @endcan --}}
                </ul>
              </li>
              {{-- @endcan --}}
              {{-- @can('patient-list','patient-create') --}}
                <li class="nav-item has-treeview {{Request::is('loaihoso*')  ? 'menu-open' : '' }}">
                  <a href="#" class="nav-link {{Request::is('loaihoso*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-frown" style="color: black"></i>
                    <p style="color: black">
                      Loại Hồ Sơ
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    {{-- @can('patient-list') --}}
                    <li class="nav-item">
                      <a href="{{route('loaihoso.index')}}" class="nav-link {{Request::is('loaihoso') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon" style="color: black"></i>
                        <p style="color: black">List Loại Hồ Sơ </p>
                      </a>
                    </li>
                    {{-- @endcan --}}
                    {{-- @can('patient-create') --}}
                    <li class="nav-item">
                      <a href="{{route('loaihoso.create')}}" class="nav-link {{Request::is('loaihoso/create') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon" style="color: black"></i>
                        <p style="color: black">Create Loại Hồ Sơ</p>
                      </a>
                    </li>
                    {{-- @endcan --}}
                  </ul>
                  {{-- @endcan --}}
                  {{-- @can('patient-list','patient-create') --}}
                <li class="nav-item has-treeview {{Request::is('loaiphong*')  ? 'menu-open' : '' }}">
                  <a href="#" class="nav-link {{Request::is('loaiphong*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-frown" style="color: black"></i>
                    <p style="color: black">
                      Loại Hồ Sơ - Phòng Ban
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    {{-- @can('patient-list') --}}
                    <li class="nav-item">
                      <a href="{{route('loaiphong.index')}}" class="nav-link {{Request::is('loaiphong') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon" style="color: black"></i>
                        <p style="color: black">List Loại Hồ Sơ - Phòng Ban</p>
                      </a>
                    </li>
                    {{-- @endcan --}}
                    {{-- @can('patient-create') --}}
                    <li class="nav-item">
                      <a href="{{route('loaiphong.create')}}" class="nav-link {{Request::is('loaiphong/create') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon" style="color: black"></i>
                        <p style="color: black">Tạo Loại Hồ Sơ - Phòng Ban</p>
                      </a>
                    </li>
                    {{-- @endcan --}}
                  </ul>
                  {{-- @endcan --}}
                  {{-- @can('patient-list','patient-create') --}}
                <li class="nav-item has-treeview {{Request::is('hoso*')  ? 'menu-open' : '' }}">
                  <a href="#" class="nav-link {{Request::is('hoso*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-frown" style="color: black"></i>
                    <p style="color: black">
                     Hồ Sơ
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    {{-- @can('patient-list') --}}
                    <li class="nav-item">
                      <a href="{{route('hoso.index')}}" class="nav-link {{Request::is('hoso') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon" style="color: black"></i>
                        <p style="color: black">List Hồ Sơ </p>
                      </a>
                    </li>
                    {{-- @endcan --}}
                    {{-- @can('patient-create') --}}
                    <li class="nav-item">
                      <a href="{{route('hoso.create')}}" class="nav-link {{Request::is('hoso/create') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon" style="color: black"></i>
                        <p style="color: black">Create Hồ Sơ</p>
                      </a>
                    </li>
                    {{-- @endcan --}}
                    {{-- @can('patient-create') --}}
                    <li class="nav-item">
                      <a href="{{route('homepage')}}" class="nav-link {{Request::is('hoso/search') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon" style="color: black"></i>
                        <p style="color: black">Tra Cứu Hồ Sơ</p>
                      </a>
                    </li>
                    {{-- @endcan --}}
                  </ul>
                  {{-- @endcan --}}
                  {{-- @can('patient-list','patient-create') --}}
                <li class="nav-item has-treeview {{Request::is('vitri*')  ? 'menu-open' : '' }}">
                  <a href="#" class="nav-link {{Request::is('vitri*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-frown" style="color: black"></i>
                    <p style="color: black">
                      Vị Trí
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    {{-- @can('patient-list') --}}
                    <li class="nav-item">
                      <a href="{{route('vitri.index')}}" class="nav-link {{Request::is('vitri') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon" style="color: black"></i>
                        <p style="color: black">List Vị Trí </p>
                      </a>
                    </li>
                    {{-- @endcan --}}
                    {{-- @can('patient-create') --}}
                    <li class="nav-item">
                      <a href="{{route('vitri.create')}}" class="nav-link {{Request::is('vitri/create') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon" style="color: black"></i>
                        <p style="color: black">Create Vị Trí</p>
                      </a>
                    </li>
                    {{-- @endcan --}}
                  </ul>
                  {{-- @endcan --}}
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>