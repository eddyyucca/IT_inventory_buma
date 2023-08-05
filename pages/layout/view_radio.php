<?php
require '../koneksi.php';
require '../function.php';
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
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BUMA-IPR</title>
  <link rel="shortcut icon" href="../../logo.jpg">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse" >
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Hi <?php echo $row3['nama'] ?></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline" action="view_radio.php" method="get">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" name="cari" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit" value="Cari">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-envelope"></i>
          <span class="badge badge-danger navbar-badge">1</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Warning !!!
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">ID Card Zafran Exp 2 Bln Lagi</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>Exp : 25 November 2023</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">1</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">1 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> Stock Consumable < 5
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      </li>
      <li class="nav-item">
      <img src="../../logo.jpg" class="pull-right" style="height:38px; width:95px;">
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-teal elevation-4" style="zoom:85%;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../../dist/img/user8-128x128.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $row3['nik'] ?></span>
    </a>

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
                <a href="dashboard.php" class="nav-link">
                  <p>Network</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dashboard2.php" class="nav-link">
                  <p>Operation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dashboard3.php" class="nav-link">
                  <p>Radio</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">MAIN MENU</li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-eye"></i>
              <p>
                View Device
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="view_network.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Network</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_operation.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Operation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_radio.php" class="nav-link active">
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
                <a href="all_device.php" class="nav-link ">
                <i class="fa  fa-caret-right nav-icon"></i>
                  <p>All Device</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="all_consumable.php" class="nav-link ">
                 <i class="fa  fa-caret-right nav-icon"></i>
                  <p>Consumable In</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="consumable_out.php" class="nav-link">
                    <i class="fa  fa-caret-right nav-icon"></i>
                  <p>Consumable Out</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-paste"></i>
              <p>
                Device Active
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <p>
                    Network
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="asset_network.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Data Asset</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="lva_network.php" class="nav-link">
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
                  <p>
                    Operation
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="asset_operation.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Data Asset</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="lva_operation.php" class="nav-link">
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
                  <p>
                    Network
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="asset_radio.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Data Asset</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="lva_radio.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Data LVA</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
                <a href="ip_address.php" class="nav-link">
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
                <a href="history_network.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Network</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="history_operation.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Operation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="history_radio.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Radio</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">USER</li>
          <li class="nav-item">
                <a href="all_karyawan.php" class="nav-link">
                  <i class="fa fa-table nav-icon"></i>
                  <p>Table All Karyawan</p>
                </a>
           </li>
           <li class="nav-item">
                <a href="table_user.php" class="nav-link">
                  <i class="fa fa-table nav-icon"></i>
                  <p>Table User & Location</p>
                </a>
           </li>
           <li class="nav-item">
                <a href="../share_knowlage/" class="nav-link">
                  <i class="far fa-file nav-icon"></i>
                  <p>Share Knowlage</p>
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
    <section class="content-header">
      
    </section>
   
    <!-- Main content -->
    <section class="content" style="zoom:85%;">
        <div class="container-fluid">
        <div class="row  mb-2">
          <div class="col-sm-12">
                <a href="view_radio_cons.php" class="btn btn-primary btn-sm" style="color:black;"> <i class="fa fa-book"  style="color:white;"></i><b style="font-zise:8px; color:white;"> Consumable</b></a>
          </div>
        </div>
        <?php  
               if(isset($_GET['pesan1'])){
                if($_GET['pesan1']=="berhasil"){
                     echo "<div class='alert' style='background:green; color: white;' >Data berhasil  di Input ;)</div>";
                    }
                  }  ?>
                     <?php 
                      if(isset($_GET['pesan2'])){
                       if($_GET['pesan2']=="gagal"){
                       echo "<div class='alert' style='background:#f5c77e; color:black ;' ><b>!!!</b> IP / Hostname yang anda masukan already</div>";
                         }
                    }?><?php 
                    if(isset($_GET['cari'])){
                      $cari = $_GET['cari'];
                      echo '<b> Hasil Pencarian : ' .$cari. '</b>';
                    }
                    ?>
                      <div class="row">
               <?php
               if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $query=mysqli_query($koneksi, "SELECT  * FROM stock s left join tb_lokasi l on l.id_lokasi=s.id_lokasi  where kategory_b in ('Radio Rig','Radio','Radio HT') and asset in ('Asset','Low Value Asset') and nma_brng like '%".$cari."%'");		
              }else{
                $query=mysqli_query($koneksi, "SELECT  * FROM stock s left join tb_lokasi l on l.id_lokasi=s.id_lokasi  where kategory_b in ('Radio Rig','Radio','Radio HT') and asset in ('Asset','Low Value Asset')   order by kategory_b DESC ");
              }
              while($row=mysqli_fetch_array($query)){
                $idb=$row['id_brng'];
                $namabarang=$row['nma_brng'];
                $deskripsi=$row['deskripsi'];
                $no_po=$row['no_po'];
                $stock=$row['stock'];
           ?>
              <div class="col-md-2 col-sm-2">
                    <!-- Profile Image -->
                    <div class="card">
                        <a href="../uploads/<?php echo$row['image']; ?>" target="_blank">
                           <center><img class="card-img-top" src=" ../uploads/<?php echo$row['image']; ?>" alt="Card image"  style="height: 240px; width:260px; "></center>
                        </a>
                        <center><b style="color:#a6a6a6;">Part Number : <?php echo$row['part_number']; ?></b></center>
                        <div class="card-body">
                          <h4 class="card-title"><b><?php echo substr($row['nma_brng'], 0, 25) ?></b></h4>
                          <p class="card-text">Lokasi : <?php echo substr($row['nama_lokasi'], 0, 25) ?><br>Detail  : <?php echo substr($row['deskripsi'], 0, 25) ?> </p>
                          <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                              <B>Stok Ready</B><b class="float-right"><?php echo substr($row['stock'], 0, 25) ?> <?php echo $row['satuan'] ?></b>
                            </li>
                            <li class="list-group-item">
                            <a href="radio_actv.php?id=<?=$idb;?>" style="color:#008ECC;"><B>Active</B><b class="float-right"><?php echo $row['device_active'] ?></b>
                            </a> 
                            </li>
                        </ul><BR>
                          <a href="#" class="btn btn-primary " data-toggle="modal" data-target="#add<?=$idb;?>"><i class="fa  fa-plus"></i></a>
                          <a href="table2.php?id=<?=$idb;?>" class="btn btn-warning"><i class="fa  fa-book"></i> Ready</a>
                        
                        </div>
                      </div>
                    <!-- /.card -->
                      <!-- The Modal add -->
                      <div class="modal fade" id="add<?=$idb;?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Form Add</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                              <form action="#" method="post">
                                <div class="form-group has-feedback">
                                <center><img src="../uploads/<?php echo $row['image'] ?>"  style="height:320px; width:320px; "></center>
                                </div>
                                <p class="login-box-msg"><?php echo $row['nma_brng'] ?> | <b>Stock:<?php echo $row['stock'] ?></b></p>
                                <input type="hidden" class="form-control" name="id_brng" value="<?php echo $row['id_brng'] ?>" >
                                <div class="form-group has-feedback">
                                <input type="number" name="no_po_m" class="form-control" placeholder="No PO" required>
                                <span class="glyphicon glyphicon-hand-left form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                <input type="number" name="no_asset_m" class="form-control" placeholder="No Asset" required>
                                <span class="glyphicon glyphicon-hand-left form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                <input type="text" name="sn" class="form-control" placeholder="Serial Number" required>
                                <span class="glyphicon glyphicon-hand-left form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                  <textarea type="text" name="ket_m" rows="4" class="form-control" placeholder="Ket.." required></textarea>
                                  <span class="glyphicon glyphicon-edit form-control-feedback"></span>
                                </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                <button type="submit" name="brngassetmasukradio" class="btn btn-success">Add</button>
                              </div>
                              </form>
                          </div>
                        </div>
                      </div>
                  <!-- /The Modal -->
               </div>
               <?php } ?>
               
            </div>
        </div>

    </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
          <b>Version</b> 3.2.0
        </div>
        <strong></strong> PT. BUKITMAKMUR-IPR
      </footer>
    
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["csv", "excel", "pdf", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>
    </body>
    </html>