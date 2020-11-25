<nav class="main-header navbar navbar-expand" style="background:#2b2222 ">
    {{-- <!-- Left navbar links -->   rgba(29, 44, 53, 0.82); --}}
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('homepage')}}" class="nav-link">Home</a>
      </li>
      
    </ul>
    <p style="color: white ;margin:8px 275px">TRA CỨU HỒ SƠ CÔNG TY iDEA</p>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      @if(Auth::check())
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="{{Auth::user()->avatar}}" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline">{{Auth::user()->tenuser}}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header">
            <img src="{{Auth::user()->avatar}}" class="img-circle elevation-2" alt="User Image">
            <p>
              {{Auth::user()->tenuser}}
              <small>Member since {{ (Auth::user()->created_at->isoFormat(' DD/MM/Y'))  }}</small>
            </p>
          </li>
          <!-- Menu Body -->
          
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="{{route('profile')}}" class="btn btn-info btn-flat">Profile</a>
            <a href="logout" class="btn btn-danger btn-flat float-right">Sign out</a>
          </li>
        </ul>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>