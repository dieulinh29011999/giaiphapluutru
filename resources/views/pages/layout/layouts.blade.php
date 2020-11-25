<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <meta name="csrf-token" content="{{csrf_token()}}">
  <base href="{{asset('')}}"> </base>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="AdminLTE-master/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="AdminLTE-master/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="AdminLTE-master/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="AdminLTE-master/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE-master/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="AdminLTE-master/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="AdminLTE-master/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="AdminLTE-master/plugins/daterangepicker/daterangepicker.js">
  <!-- summernote -->
  <link rel="stylesheet" href="AdminLTE-master/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  {{-- datepicker --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
  
  <style>
    label{
      color:black;
    }
    p{
        /* color:black; */
    }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    @include('pages.patials.header')
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
    @include('pages.patials.menu')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="background-color: rgb(248, 242, 242)">
        <div class="content">


                  @yield('content')


        </div>
      </div>
      <!-- /.content-wrapper -->
    @include('pages.patials.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
@yield('script')
  <!-- jQuery -->
  <script src="AdminLTE-master/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="AdminLTE-master/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="AdminLTE-master/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="AdminLTE-master/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  {{-- <script src="AdminLTE-master/plugins/jqvmap/jquery.vmap.min.js"></script> --}}
  {{-- <script src="AdminLTE-master/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> --}}
  <!-- jQuery Knob Chart -->
  <script src="AdminLTE-master/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="AdminLTE-master/plugins/moment/moment.min.js"></script>
  <script src="AdminLTE-master/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="AdminLTE-master/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="AdminLTE-master/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="AdminLTE-master/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="js/bootstrap-flash-alert.js"></script>
  <!-- AdminLTE App -->
  <script src="AdminLTE-master/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  {{-- <script src="AdminLTE-master/dist/js/pages/dashboard.js"></script> --}}
  <!-- AdminLTE for demo purposes -->
  <script src="AdminLTE-master/dist/js/demo.js"></script>

  {{-- datetimepicker --}}
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

  
  <script type="text/javascript">
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
  }, 5000);
  </script>
  {{-- <script>
    $('#delete').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var user_id = button.data('userid')
        var modal = $(this);
        modal.find('.modal-body #user_id').val(user_id);
    })
  </script>
  <script>
  $('#deletePermission').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget)
      var permission_id = button.data('permissionid')
      var modal = $(this);
      modal.find('.modal-body #permission_id').val(permission_id);
  })
  </script>
  <script>
  $('#deleteRole').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget)
      var role_id = button.data('roleid')
      var modal = $(this);
      modal.find('.modal-body #role_id').val(role_id);
  })
  </script>
  <script>
  $('#deletebenhvien').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget)
      var permission_id = button.data('benhvienid')
      var modal = $(this);
      modal.find('.modal-body #benhvien_id').val(benhvien_id);
  })
  </script>

<script type="text/javascript">
  var urlck = "{{route('show-chuyenkhoainBenhnhan')}}";
  $("select[name='id_benhvien']").change(function(){
      var id_benhvien = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: urlck,
          method: 'POST',
          data: {
              id_benhvien: id_benhvien,
              _token: token
          },
          success: function(data) {
              $("select[name='id_chuyenkhoa']").html('');
              $("select[name='id_chuyenkhoa'").prepend("<option value=''>--chọn --</option>");
              $.each(data, function(key, value){
                  $("select[name='id_chuyenkhoa']").append(
                      "<option value=" + value.id + ">" + value.tenchuyenkhoa + "</option>"
                  );
                  $("select[name='id_bacsi']").html('');
                  $("select[name='id_khunggio']").html('');
              });
          }
      });
  });
</script>
<script type="text/javascript">
  var urlbs = "{{route('show-bacsi')}}";
  $("select[name='id_chuyenkhoa']").change(function(){
      // var id_benhvien = $(this).val();
      var id_chuyenkhoa = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: urlbs,
          method: 'POST',
          data: {
              // id_benhvien: id_benhvien,
              id_chuyenkhoa: id_chuyenkhoa,
              _token: token
          },
          success: function(data) {
              $("select[name='id_bacsi']").html('');
              $.each(data, function(key, value){
                  $("select[name='id_bacsi']").append(
                      "<option value=" + value.id + ">" + value.tenbacsi + "</option>"
                  );
              });
          }
      });
  });
</script> --}}
{{-- <script type="text/javascript">
  $('#id_benhvien').change(function(){
  var id_benhvien = $(this).val();    
  if(id_benhvien){
      $.ajax({
         type:"POST",
         url:"{{url('show-chuyenkhoa')}}?id_benhvien="+id_benhvien,
         success:function(res){               
          if(res){
              $("#id_chuyenkhoa").empty();
              $("#id_chuyenkhoa").append('<option>Select</option>');
              $.each(res,function(key,value){
                  $("#id_chuyenkhoa").append('<option value="'+key+'">'+value+'</option>');
              });
         
          }else{
             $("#id_chuyenkhoa").empty();
          }
         }
      });
  }else{
      $("#id_chuyenkhoa").empty();
      $("#id_bacsi").empty();
  }      
 });
  $('#id_chuyenkhoa').on('change',function(){
  var id_chuyenkhoa = $(this).val();    
  if(id_chuyenkhoa){
      $.ajax({
         type:"POST",
         url:"{{url('show-bacsi')}}?id_chuyenkhoa="+id_chuyenkhoa,
         success:function(res){               
          if(res){
              $("#id_bacsi").empty();
              $.each(res,function(key,value){
                  $("#id_bacsi").append('<option value="'+key+'">'+value+'</option>');
              });
         
          }else{
             $("#id_bacsi").empty();
          }
         }
      });
  }else{
      $("#id_bacsi").empty();
  }
      
 });
</script> --}}

{{-- <script type="text/javascript">
  var urlbs = "{{route('show-bacsi')}}";
  $("select[name='id_benhvien']").change(function(){
      var id_benhvien = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: urlbs,
          method: 'POST',
          data: {
              id_benhvien: id_benhvien,
              _token: token
          },
          success: function(data) {
              $("select[name='id_bacsi']").html('');
              $.each(data, function(key, value){
                  $("select[name='id_bacsi']").append(
                      "<option value=" + value.id + ">" + value.tenbacsi + "</option>"
                  );
              });
          }
      });
  });
</script> --}}
{{-- <script type="text/javascript">
  var urlkg = "{{route('show-khunggio')}}";
  $("select[name='id_chuyenkhoa']").change(function(){
      var id_chuyenkhoa = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: urlkg,
          method: 'POST',
          data: {
              id_chuyenkhoa: id_chuyenkhoa,
              _token: token
          },
          success: function(data) {
              $("select[name='id_khunggio']").html('');
              $.each(data, function(key, value){
                  $("select[name='id_khunggio']").append(
                      "<option value=" + value.id + ">" + value.khunggio + "</option>"
                  );
              });
          }
      });
  });
</script> --}}

<script type="text/javascript">
    $('[data-toggle="datepicker"]').datepicker({
        format:"dd-mm-yyyy",
        endDate:'+0d',
        todayBtn:"linked",
        todayHighlight:true,
        orientation:"left",
        autoclose:true,
        beforeShowDay: function(d)
        {
          var day = d.getDay();
          return [(day!=0)];
        },
      });
      </script>
<script type="text/javascript">
$('#ngaykham').datepicker({
    format:"dd-mm-yyyy",
    minDate:0,
    startDate:'+1d',
    todayBtn:"linked",
    todayHighlight:true,
    orientation:"left",
    autoclose:true,
    daysOfWeekDisabled:[0],
    beforeShowDay: function(d)
    {
        var day = d.getDay();
        return [(day!=0)];
    },
    });
</script>
<script type="text/javascript">
$('#from').datepicker({
    format:"dd-mm-yyyy",
    minDate:0,
    todayBtn:"linked",
    todayHighlight:true,
    orientation:"left",
    autoclose:true,
    });
$('#to').datepicker({
    format:"dd-mm-yyyy",
    minDate:0,
    todayBtn:"linked",
    todayHighlight:true,
    orientation:"left",
    autoclose:true,
    });
    </script>
    <script type="text/javascript">
        $('#start-datebn').datepicker({
            format:"dd-mm-yyyy",
            startDate:'+1d',
            endDate:'+2d',
            todayBtn:"linked",
            todayHighlight:true,
            orientation:"left",
            autoclose:true,
            // daysOfWeekDisabled:[0],
            beforeShowDay: function(d)
            {
                var day = d.getDay();
                return [(day!=0)];
            },
            });
            $('#end-datebn').datepicker({
            format:"dd-mm-yyyy",
            minDate:0,
            startDate:'+1d',
            endDate:'+2d',
            todayBtn:"linked",
            todayHighlight:true,
            orientation:"left",
            autoclose:true,
            daysOfWeekDisabled:[0],
            beforeShowDay: function(d)
            {
                var day = d.getDay();
                return [(day!=0)];
            },
            });
    </script>
  @yield('script')
</body>
</html>
