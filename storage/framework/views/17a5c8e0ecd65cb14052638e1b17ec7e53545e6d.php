<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo e($data['judul']); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/bower_components/Ionicons/css/ionicons.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/dist/css/AdminLTE.min.css')); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/dist/css/skins/_all-skins.min.css')); ?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/bower_components/morris.js/morris.css')); ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/bower_components/jvectormap/jquery-jvectormap.css')); ?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css')); ?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">
   <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/timepicker/bootstrap-timepicker.min.css')); ?>">



  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/bower_components/select2/dist/css/select2.min.css')); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php echo $__env->make('admin.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Content Wrapper. Contains page content -->
    <?php echo $__env->yieldContent('content'); ?>
    <!-- /.content-wrapper -->
    <!-- Footer -->
    <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Footer -->
    <!-- Control Sidebar -->
    <?php echo $__env->make('admin.layouts.sidemenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
  

  
</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="<?php echo e(asset('adminlte/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(asset('adminlte/bower_components/jquery-ui/jquery-ui.min.js')); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo e(asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<!-- Morris.js charts -->
<script src="<?php echo e(asset('adminlte/bower_components/raphael/raphael.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminlte/bower_components/morris.js/morris.min.js')); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo e(asset('adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')); ?>"></script>
<!-- jvectormap -->
<script src="<?php echo e(asset('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo e(asset('adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js')); ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo e(asset('adminlte/bower_components/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<!-- datepicker -->
<script src="<?php echo e(asset('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo e(asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo e(asset('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"></script>
<!-- FastClick -->
<script src="<?php echo e(asset('adminlte/bower_components/fastclick/lib/fastclick.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('adminlte/dist/js/adminlte.min.js')); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo e(asset('adminlte/dist/js/pages/dashboard.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('adminlte/dist/js/demo.js')); ?>"></script>
<!-- DataTables -->
<script src="<?php echo e(asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

<!-- Select2 -->
<script src="<?php echo e(asset('adminlte/bower_components/select2/dist/js/select2.full.min.js')); ?>"></script>
<!-- CK Editor -->
<script src="<?php echo e(asset('adminlte/bower_components/ckeditor/ckeditor.js')); ?>"></script>

<!-- bootstrap time picker -->
<script src="<?php echo e(asset('adminlte/plugins/timepicker/bootstrap-timepicker.min.js')); ?>"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'responsive'  : true
    })
    new $.fn.dataTable.FixedHeader( table );
  })
</script>

<script type="text/javascript">
  $('#jam_buka').timepicker({
    minuteStep: 1,
    //template: 'modal',
    appendWidgetTo: 'body',
    //showSeconds: true,
    showMeridian: false,
    defaultTime: false
  });
</script>

<script type="text/javascript">
  $('#jam_tutup').timepicker({
    minuteStep: 1,
    //template: 'modal',
    appendWidgetTo: 'body',
    //showSeconds: true,
    showMeridian: false,
    defaultTime: false
  });
</script>

<script>  
  function enable_disable() { 
    $("input").prop('disabled', false); 
  } 
</script> 

<script type="text/javascript">
  $(document).ready(function () {
    $('#btn1').click(function () {
      $('input').attr('disabled', 'disabled');
    });
    $('#btn2').click(function () {
     $('input').removeAttr('disabled');
   });
  });
</script>

</body>
</html><?php /**PATH D:\projek\htdocs\pemweb\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>