<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIG Peta Digital Sarana Transportasi Umum Kota Serang</title>
  <link href="<?php echo base_url().'assets/dist/img/favorit.png' ?>" rel="shortcut icon" type="image/ico" />
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url().'assets/' ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url().'assets/' ?>plugins/select2/select2.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url().'assets/' ?>plugins/datatables/dataTables.bootstrap.css">
  <!-- CKEditor -->
  <script type="text/javascript" src="<?=base_url().'assets/' ?>plugins/ckeditor/ckeditor.js"></script>
  <script type="text/javascript" src="<?=base_url().'assets/' ?>plugins/ckeditor/style.js"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url().'assets/' ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url().'assets/' ?>dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-green sidebar-mini"  onload="initialize()">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?=base_url().'dashboard/' ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>GIS</b> Kota Serang</span>
        </a>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?=base_url().'assets/' ?>dist/img/user.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?=$this->session->userdata('nama') ?></p>
              
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="<?=base_url().'dashboard/index' ?>">
                <span>Dashboard</span>
              </a>
            </li>
          <li class="treeview">
              <a href="<?=base_url().'dashboard/fasilitas' ?>">
              </i> <span>Fasilitas</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">

                <span>Data Lokasi</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?=base_url().'dashboard/lokasi_tambah' ?>"><i class="fa fa-circle-o"></i> Tambah Lokasi</a></li>
                <li><a href="<?=base_url().'dashboard/lokasi' ?>"><i class="fa fa-circle-o"></i> Daftar Lokasi</a></li>
                <li><a href="<?=base_url().'dashboard/lokasi_kategori' ?>"><i class="fa fa-circle-o"></i> Kategori</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <span>Data Trayek Angkot</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?=base_url().'dashboard/trayekangkot_tambah' ?>"><i class="fa fa-circle-o"></i> Tambah Trayek Angkot</a></li>
                <li><a href="<?=base_url().'dashboard/trayekangkot' ?>"><i class="fa fa-circle-o"></i> Daftar Trayek  Angkot</a></li>
              </ul>
            </li>
			<li class="treeview">
              <a href="#">

                <span>Data Trayek Bus</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?=base_url().'dashboard/trayekbus_tambah' ?>"><i class="fa fa-circle-o"></i> Tambah Trayek Bus</a></li>
                <li><a href="<?=base_url().'dashboard/trayekbus' ?>"><i class="fa fa-circle-o"></i> Daftar Trayek Bus</a></li>
              </ul>
            </li>

            <li class="header">Halaman Depan</li>
            <li><a href="<?=base_url() ?>" target="_blank"> <span>Lihat Website</span></a></li>
            <li class="header">A U T H</li>
            <li><a href="<?=base_url().'adminweb/logout' ?>"> <span>Keluar</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <?php echo $contents ?>
    <!-- /.content-wrapper -->
    
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          Beta Version 	
        </div>
        <strong>Copyright &copy; 2017</strong> <a href="<?=base_url() ?>">Peta Digital Sarana Transportasi Umum Kota Serang</a>. All rights
        reserved.
    </footer>



          </div>

		  
    </aside>
    <!-- /.control-sidebar -->
    
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?=base_url().'assets/' ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url().'assets/' ?>bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url().'assets/' ?>plugins/select2/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url().'assets/' ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url().'assets/' ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url().'assets/' ?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url().'assets/' ?>dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
</body>
</html>