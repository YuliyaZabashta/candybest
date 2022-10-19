<!DOCTYPE html>
<html lang="en">
<?php error_reporting(0);?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="/adminlte/">
  <link rel="shortcut icon" href="/images/star.png" type="image/png"/>
  <?=$this->getMeta();?>
  
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="select2/dist/css/select2.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="my.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <br><br>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=PATH;?>" class="brand-link">
      <img src="/imagescandy/klipartz.com.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CANDIBEST</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <p style="color: #c2c7d0" class="d-block">Администратор:<br><?=$_SESSION['user']['name']?></p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item" style="color: #fff; font-size: 22px;">Меню:</li>
        <li class="nav-item"><a href="<?=ADMIN;?>/" class="nav-link"><span>Главная</span></a></li>
        <li class="nav-item"><a href="<?=ADMIN;?>/order" class="nav-link"><span>Заказы</span></a></li>
        <li class="nav-item">
          <a href="#" class="nav-link"><span>Товары</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item"><a href="<?=ADMIN;?>/product" class="nav-link">Список товаров</a></li>
            <li class="nav-item"><a href="<?=ADMIN;?>/product/add" class="nav-link">Добавить товар</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link"><span>Пользователи</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item"><a href="<?=ADMIN;?>/user" class="nav-link">Список заказчиков</a></li>
            <li class="nav-item"><a href="<?=ADMIN;?>/user/add" class="nav-link">Добавить пользователя</a></li>
          </ul>
        </li>
        <li class="nav-item"><a href="<?=ADMIN;?>/request/index" class="nav-link">Заявки</a></li>
        <li class="nav-item"><a href="<?=ADMIN;?>/review/index" class="nav-link"><span>Отзывы</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php if(isset($_SESSION['error'])): ?>
			<div class="alert alert-danger">
				<?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
			</div>
			<?php endif; ?>
			<?php if(isset($_SESSION['success'])): ?>
				<div class="alert alert-success">
					<?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
				</div>
			<?php endif; ?>
    <?=$content; ?>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>
    var path = '<?=PATH;?>'
        adminpath = '<?=ADMIN;?>'
</script>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="/ajax-upload-master/ajaxupload.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="select2/dist/js/select2.full.js"></script>
<script src="/js/validator.js"></script>

<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<script src="ckfinder/ckfinder.js"></script>
<script src="my2.js"></script>

<script>
  CKEDITOR.replace( 'editor1', {
    filebrowserBrowseUrl: path +'/adminlte/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: path +'/adminlte/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl: path +'/adminlte/ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl: path +'/adminlte/ckfinder/connector?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: path +'/adminlte/ckfinder/connector?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: path + '/adminlte/ckfinder/connector?command=QuickUpload&type=Flash'
} );
</script>


<?php 
$logs = \R::getDatabaseAdapter()
    ->getDatabase()
    ->getLogger();
?>
</body>
</html>