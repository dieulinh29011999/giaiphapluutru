<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="AdminLTE-master/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="AdminLTE-master/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE-master/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    body{
      margin: 0;
      padding: 0;
    }
    body::before{
      content: '';
      position: fixed;
      width: 100vw;
      height: 100vh;
      background-image: url(/dieulinh/Datlichkham/public/bg/bgfw.jpg);
      background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      -webkit-filter: blur(5px);
      -moz-filter:blur(5px);
      filter:blur(5px);
    }
    .card-body
    {
      position: fixed;
      background: rgba(0,0,0, .8);
      transform: translate(-50%,-50%);
      left: 50%;
      top: 50%;
      width: 350px;
    }
    </style>
</head>
<body>
<div class="hold-transition login-page" >
    <div class="login-box">
      <div class="login-logo">
        <b style="color: white">Admin</b>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg" style="color: white">Sign in to start your session</p>

          <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="input-group mb-3">
              <input id="tenuser" type="text" class="form-control @error('tenuser') is-invalid @enderror" name="tenuser" value="{{ old('tenuser') }}" required autocomplete="tenuser" autofocus placeholder="name">
                  @error('tenuser')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
              @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              <div class="input-group-append">
                <div class="input-group-text">
                <span id="faclose" class="fa fa-eye-slash" style="display: none;" onclick="showHiddenPass()"></span>
                  <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
              </div>
            </div>
            <div id="message" class="form-group">
              <p style="color: #dd2c00"> Caps Lock Is ON</p>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember">
                  <label for="remember"  style="color: white">
                    Remember Me
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                @if (Route::has('reset-password'))
                    <a class="btn btn-link" href="{{ route('reset-password') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>
          {{-- <p class="mb-1">
            <a href="forgot-password">I forgot my password</a>
          </p> --}}
          {{-- @can('user-create') --}}
          <p class="mb-0">
            <a href="register" class="text-center">Register a new membership</a>
          </p>
          {{-- @endcan --}}
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="AdminLTE-master/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="AdminLTE-master/dist/js/adminlte.min.js"></script>

<script>
  $(".toggle-password").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});
</script>
<script>
  $(document).ready(function()
    {
      $('#message').hide();

    }
  )
  $('#password').keypress(function(e)
  {
    var c = String.fromCharCode(e.which);
    if(c.toUpperCase() === c && c.toLowerCase() !== c && !e.shiftkey)
    {
      $('#message').show();
    }
    else
    {
      $('#message').hide();
    }
  });
  </script>
</body>

</html>







