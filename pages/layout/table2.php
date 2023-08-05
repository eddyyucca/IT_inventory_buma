<?php
require '../koneksi.php';
require '../function.php';
session_start();
// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:../../../index.php?pesan=gagal");
	}
  $g= $_SESSION['username'];
  $query5=mysqli_query($koneksi, "SELECT *
  FROM tb_user where nik='$g'   ");
   $row3=mysqli_fetch_array($query5);


$idb1= mysqli_real_escape_string($koneksi,$_GET['id']);
$query1=mysqli_query($koneksi, "SELECT * FROM stock s left join tb_lokasi l on l.id_lokasi=s.id_lokasi where id_brng='$idb1'   ");
$row1=mysqli_fetch_array($query1);

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
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
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
                <a href="view_operation.php" class="nav-link ">
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
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Collapsed Sidebar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" style="zoom:85%;">
        <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  <h2><?php echo $row1['kategory_b'] ?>&nbsp;<?php echo $row1['nma_brng'] ?></h2>
                  <b>Location  &nbsp;&nbsp;&nbsp;:</b> <?php echo $row1['nama_lokasi'] ?><br>  
                  <b>Detail &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> <?php echo $row1['deskripsi'] ?>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <?php  
               if(isset($_GET['id'])){
                if($_GET['id']=="sss"){
                     echo "<div class='alert' style='background:green; color: white;' >Data berhasil  di Input ;)</div>";
                    }
                  }  ?>
                   <?php 
               if(isset($_GET['pesan'])){
                if($_GET['pesan']=="gagal"){
                     echo "<div class='alert' style='background:#ea3c53; color: white;' >S/N yang anda masukan already !!</div>";
                    }
                  }  ?>
                     <?php 
                      if(isset($_GET['pesan3'])){
                       if($_GET['pesan3']=="gagal3"){
                       echo "<div class='alert' style='background:#f5c77e; color:white ;' ><b>!!!</b> IP / Hostname yang anda masukan already</div>";
                         }
                    }?>
              <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color:#25253B; color: white;">
                <tr>
                  <th>Nama Barang</th>
                  <th>S/N</th>
                  <th>Status</th>
                  <th>Kondisi</th> 
                  <th>Keterangan</th> 
                  <th>Date Modified</th> 
                  <th>Cek Out</th>
                  <th>Aksi</th>
                </tr> 
                </thead >
                <?php
                   $idba= mysqli_real_escape_string($koneksi,$_GET['id']);
                   $query=mysqli_query($koneksi, "SELECT *
                   FROM tb_masuk k 
                   left join stock s on s.id_brng=k.id_brng
                   left join tb_lokasi l on l.id_lokasi=s.id_lokasi where asset in ('Asset','Low Value Asset') and kategory_b in ('Radio Rig','Radio','Radio HT') and s.id_brng='$idba' order by tanggal desc ;");
                    $no=0;
                    $no++;
                      while($row=mysqli_fetch_array($query)){
                      $idb=$row['id_brng'];
                      $idm=$row['id_masuk'];
                      $nma_brng=$row['nma_brng'];
                      $qty=$row['qty']; 
                      $ket_m=$row['ket_m'];
                      $no_po_m=$row['no_po_m'];
                      $no_asset_m=$row['no_asset_m'];
                      $sn=$row['sn'];
                      $gambar=$row['gambar'];
                ?>
             
                <tr>
                <td><a href="#" data-toggle="modal" data-target="#add1<?=$idb;?>"><i class="fa fa-plus-square" style="color: green;"></i></a> &nbsp;&nbsp;&nbsp; <?php echo $row['nma_brng'] ?></td>
                  <td><?php echo $row['sn'] ?></td>
                  <td><?php echo $row['asset'] ?></td>
                  <td><b><?php echo $row['status_m'] ?></b></td>
                  <td> <?php echo $row['ket_m'] ?></td>
                  <td><?php echo $row['tanggal'] ?></td>
                  <td width='7%'>
                     <div class="tools" style="text-align: center;">
                       <a href="#" data-toggle="modal" data-target="#cekout<?=$idm;?>"><i class="fa fa-share" style="color: #ffa500;"></i></a> 
                    </div>
                  </td>
                  <td >
                     <div class="tools" style="text-align: center;">
                     <a href="#" data-toggle="modal" data-target="#edit<?=$idm;?>"><i class="fa fa-edit" style="color: green;"></i></a>&nbsp;&nbsp;
                      <a href="#" data-toggle="modal" data-target="#delete<?=$idm;?>"><i class="fa fa-trash" style="color: red;"></i></a>
                    </div>
                  </td>
                </tr>

                <!-- Modal edit-->
                <div class="modal fade" id="edit<?=$idm;?>" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                          <h4 class="modal-title"><b> Form Edit</b></h4>
                          <img src="../../logo.jpg" class="pull-right" style="height:38px; width:95px;">
                          </div>
                              <div class="modal-body">
                                  <form method="post" role="form" enctype="multipart/form-data" class="form-horizontal">
                                    <!-- text input -->
                                    <div class="form-group">
                                      <label>Device Name</label>
                                      <input type="text" class="form-control" name="nma_brng" value="<?=$nma_brng;?>" disabled>
                                    </div>
                                    <div class="form-group">
                                      <label>No PO</label>
                                      <input type="text" class="form-control" name="no_po_m" value="<?=$no_po_m;?>">
                                    </div>
                                    <div class="form-group">
                                      <label>No Asset</label>
                                      <input type="text" class="form-control" name="no_asset_m" value="<?=$no_asset_m;?>">
                                    </div>
                                    <div class="form-group">
                                      <label>S/N</label>
                                      <input type="text" class="form-control" name="sn" value="<?=$sn;?>">
                                    </div>
                                    <div class="form-group">
                                      <label>Ket</label>
                                      <input type="text" class="form-control" name="ket_m" value="<?=$ket_m;?>">
                                    </div>
                                    <div class="form-group">
                                      <label>Date Modified</label>
                                      <input type="text" class="form-control" name="tanggal" value="<?php echo $row['tanggal'] ?>" disabled>
                                    </div>
                                    <input type="hidden" name="idb" value="<?=$idb;?>">
                                    <input type="hidden" name="idm" value="<?=$idm;?>"> 
                                    <div class="modal-footer">  
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                                    <button type="submit" class="btn btn-danger" name="devicerusakradio" onclick="return confirm('Anda Yakin, Barang ini Rusak')">Rusak</button> 
                                    <button type="submit" class="btn btn-primary" name="updatebrngassetmasukradio">Update</button>                               
                                    </div>
                                  </form>
                              </div>
                         </div>
                      </div>
                    </div>       
                 <!-- /Modal edit-->
                 <!-- Modal Delete-->
                 <div class="modal fade" id="delete<?=$idm;?>" role="dialog">
                      <div class="modal-dialog">\
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Delete</h4>
                          </div>
                          <form  method="POST">
                          <div class="modal-body">
                            <p>  Apakah Anda yakin ingin menghapus Barang di bawah ? <br><b><?php echo $row['nma_brng'] ?> | S/N: <?=$sn;?></p></b>
                          </div>
                          <input type="hidden" class="form-control" name="qty" value="<?=$qty;?>">
                          <input type="hidden" class="form-control" name="idb" value="<?=$idb;?>">
                          <input type="hidden" class="form-control" name="idm" value="<?=$idm;?>">
                          <input type="hidden" class="form-control" name="no_po_m" value="<?=$no_po_m;?>">
                          <input type="hidden" class="form-control" name="no_asset_m" value="<?=$no_asset_m;?>">
                          <input type="hidden" class="form-control" name="sn" value="<?=$sn;?>">
                          <div class="modal-footer">
                          <button type="submit" class="btn btn-danger" name="hapusdataassetmasukradio">delete</button>
                          </div>
                          </form >
                        </div>
                      </div>
                    </div>    
                    <!-- /Modal Delete-->
                    <!-- Modal Cek Out-->
                     <!-- Modal Cek Out-->
                     <div class="modal fade" id="cekout<?=$idm;?>" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                           <h4 class="modal-title"><b> Form Cek Out</b></h4>
                          <img src="../../logo.jpg" class="pull-right" style="height:38px; width:95px;">
                          </div>
                              <div class="modal-body">
                                 <form method="post" role="form" enctype="multipart/form-data" class="form-horizontal">
                                    <!-- text input -->
                                    <div class="form-group">
                                      <label>Unit / Lokasi</label>
                                      <input type="text" class="form-control" name="Unit">
                                    </div>
                                    <div class="form-group">
                                      <label>Type Unit </label>
                                      <select name="type_unit" class="form-control select2" style="width: 100%;" required>
                                          <option>---</option>
                                          <option>Other</option>
                                          <option>320NGH</option>
                                          <option>345GC</option>
                                          <option>6020B</option>
                                          <option>740C</option>
                                          <option>773E</option>
                                          <option>777D</option>
                                          <option>777E</option>
                                          <option>A40-G</option>
                                          <option>ACTROS4043AK</option>
                                          <option>ATF110G-5</option>
                                          <option>BW219</option>
                                          <option>CS79B</option>
                                          <option>CWE28064R</option>
                                          <option>D10T2</option>
                                          <option>D155A-6</option>
                                          <option>D375A-6R</option>
                                          <option>D6RXL</option>
                                          <option>D85ESS-2</option>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label>Kategori </label>
                                      <select name="kategory" class="form-control" required>
                                          <option>---</option>
                                          <option>Other</option>
                                          <option>Ambulance</option>
                                          <option>Mobile Crane</option>
                                          <option>Tire Handler</option>
                                          <option>Crane Truck</option>
                                          <option>Crane Tadano</option>
                                          <option>Welding Truck</option>
                                          <option>Tire Truck</option>
                                          <option>Fuel Truck</option>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label>type Radio</label>
                                      <input type="text" class="form-control" name="ss" value="<?=$nma_brng;?>">
                                    </div>
                                    <div class="form-group">
                                      <label>S/N</label>
                                      <input type="text" class="form-control" name="SN" value="<?=$sn;?>" disabled>
                                      <input type="hidden" class="form-control" name="SN" value="<?=$sn;?>" >
                                    </div>
                                    <div class="form-group">
                                      <label>No Asset</label>
                                      <input type="text" class="form-control" name="no_asset" value="<?=$no_asset_m;?>" >
                                    </div>
                                    <input type="hidden" name="idb" value="<?=$idb;?>">
                                    <input type="hidden" name="idm" value="<?=$idm;?>">
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-right pading" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-warning pull-right pading" name="insertketableassetradio">Submit</button>
                                    
                                    </div>
                                  </form>
                              </div>
                        </div> 
                      </div>
                    </div>                 
                    <!-- /Modal Cek Out-->
                     <!-- /Modal Add-->
                    <div class="modal fade" id="add1<?=$idb;?>">
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
                      <!-- /Modal Cek Out-->
                       <?php $no++; } ?>
              </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
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
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../../plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../../plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
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
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
    <!-- Page specific script -->
    <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>
    </body>
    </html>