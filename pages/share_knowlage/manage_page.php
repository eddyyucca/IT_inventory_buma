<?php
require '../koneksi.php';
 session_start(); 
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:../../index.php?pesan=gagal");
}
$g= $_SESSION['username'];
$query5=mysqli_query($koneksi, "SELECT *
FROM tb_user where nik='$g'   ");
 $row3=mysqli_fetch_array($query5);
 ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BUMA-IPR</title>
  <link rel="shortcut icon" href="../../logo.jpg">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
 
</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="../../dist/img/user8-128x128.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo $row3['nama'] ?></span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
        <img src="../../logo.jpg" class="pull-right" style="height:38px; width:95px;">
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="zoom:85%;">
    <!-- Brand Logo -->
  

    <!-- Sidebar -->
    <div class="sidebar">
       <!-- SidebarSearch Form -->
      <div class="form-inline">
       
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="../layout/dashboard.php" class="nav-link">
                    <p>Network</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../layout/dashboard2.php" class="nav-link">
                    <p>Operation</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../layout/dashboard3.php" class="nav-link">
                    <p>Radio</p>
                    </a>
                </li>
                </ul>
          </li>
          <li class="nav-header">MAIN MENU</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-eye"></i>
              <p>
                View Device
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../layout/view_network.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Network</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/view_operation.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Operation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/view_radio.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Radio</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                All Device/Consumable
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../layout/all_device.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Devise</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/all_consumable.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consumable In</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/consumable_out.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consumable Out</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-paste"></i>
              <p>
                Device Active
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Network
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../layout/asset_network.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Data Asset</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../layout/lva_network.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Data LVA</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Operation
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../layout/asset_operation.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Data Asset</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../layout/lva_operation.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Data LVA</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Radio
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../layout/asset_radio.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Data Asset</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../layout/lva_radio.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Data LVA</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
                <a href="../layout/ip_address.php" class="nav-link">
                  <i class="fa fa-sitemap nav-icon"></i>
                  <p>Ip Address</p>
                </a>
           </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                History Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../layout/history_network.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Network</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/history_operation.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Operation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/history_radio.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Radio</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">USER</li>
          <li class="nav-item">
                <a href="../layout/all_karyawan.php" class="nav-link">
                  <i class="fa fa-table nav-icon"></i>
                  <p>Table All Karyawan</p>
                </a>
           </li>
           <li class="nav-item">
                <a href="../layout/table_user.php" class="nav-link">
                  <i class="fa fa-table nav-icon"></i>
                  <p>Table User & Location</p>
                </a>
           </li>
           <li class="nav-item">
                <a href="../login/log_out.php" class="nav-link">
                  <i class="fa fa-bed nav-icon"></i>
                  <p>Sign Out</p>
                </a>
           </li>
        </ul>   
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Knowlage</a></li>
              <li class="breadcrumb-item active">Add</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> 
    <!-- /.content-header -->
 
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
          <div class="card-body p-0">
          <div class="col-12 my-2">
            <a href="./" class="btn btn-info text-light text-decoration-none"> Back to List</a>
              </div>
              <div class="mailbox-read-message">
              <div class="card card-primary card-outline">
              <?php 
                if(isset($_SESSION['msg'])):
                ?>
                <div class="alert alert-<?php echo $_SESSION['msg']['type'] ?>">
                    <div class="d-flex w-100">
                        <div class="col-11"><?php echo $_SESSION['msg']['text'] ?></div>
                        <div class="col-1"><button class="btn-close" onclick="$(this).closest('.alert').hide('slow')"></button></div>
                    </div>
                </div>
                <?php 
                    unset($_SESSION['msg']);
                endif;
                ?>
                      <div class="card-header">
                <h3 class="card-title">Create New</h3>
              </div>
              <form action="save_page.php" id="content-form" method="POST">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <input class="form-control" placeholder="Judul" type="hidden" name="filename" value="<?php echo isset($_SESSION['POST']['filename']) ? $_SESSION['POST']['filename'] : (isset($_GET['page']) ? str_replace('.html','',$_GET['page']) : '')  ?>">
                  <label for="fname" class="control-label">Judul : <span class="text-info"></span></label>
                  <input class="form-control" type="text" pattern="[a-z0-9A-Z_-]+" name="fname" id="fname" autofocus autocomplete="off" class="form-control form-control-sm border-0 border-bottom rounded-0" value="<?php echo isset($_SESSION['POST']['fname']) ? $_SESSION['POST']['fname'] : (isset($_GET['page']) ? str_replace('.html','',$_GET['page']) : '')  ?>" required>
                </div>
                <div class="form-group">
                    <textarea  name="content" id="compose-textarea" class="form-control" style="height: 300px">
                    <?php echo isset($_SESSION['POST']['content']) ? $_SESSION['POST']['content'] : (isset($_GET['page']) ? file_get_contents("./pages/{$_GET['page']}") : '')  ?>
                    </textarea>
                </div>
              </div>
              <!-- /.card-body -->
              </form>
              <div class="card-footer">
                <div class="float-right">
                  <a class="btn btn-sm rounded-0 btn-light" href="./"><i class="fas fa-out"></i> Cencel</a>
                  <button class="btn btn-sm rounded-0 btn-primary" type="submit" form="content-form"><i class="far fa-save"></i> Save</button>
                </div>
              </div>
              <!-- /.card-footer -->
            </div>
                
            </div>
              <!-- /.mailbox-read-message -->
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
    <b>Version</b> 3.2.0
    </div>
    <!-- Default to the left -->
    <strong></strong> PT. BUKITMAKMUR-IPR
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>
</body>
</html>
