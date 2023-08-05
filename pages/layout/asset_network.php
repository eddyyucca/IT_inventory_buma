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
<body class="hold-transition sidebar-mini sidebar-collapse">
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
                <a href="view_radio.php" class="nav-link">
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
                <a href="all_device.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Device</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="all_consumable.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consumable In</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="consumable_out.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consumable Out</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-paste"></i>
              <p>
                Device Active
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Network
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="asset_network.php" class="nav-link active">
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
                <i class="nav-icon fas fa-circle"></i>
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
                <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Radio
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
                <a href="#" class="nav-link">
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
            <h1>Asset Active</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Device Active</a></li>
              <li class="breadcrumb-item active">Data Asset</li>
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
                  <div class="btn-group">
                    <a href="../prosess/excel/excel_asset_radio.php" class="btn btn-success" type="submit" name="filter_tgl"><i class="fa  fa-file-excel"></i>&nbsp;&nbsp;Export</a> 
                  </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                <thead style="background-color:#25253B; color: white;">
                <tr>
                  <th>No</th>
                  <th>NO Asset</th>
                  <th>Device Name</th>
                  <th>Hostname</th>
                  <th>IP Address</th>
                  <th>S/N</th>
                  <th>Actual Location</th>
                  <th>Config</th>
                  <th>Date modified</th>
                  <th>Aksi</th>
                </tr>
                </thead >
                 <?php 
                    $query=mysqli_query($koneksi, "SELECT *
                    FROM tb_asset_network n
                    left join stock s on s.id_brng=n.id_brng
                    left join tb_lokasi2 l on l.id_lok2=n.id_lok where s.asset='Asset' order by id desc  ");
                    $no=0;
                    $no++;
                      while($row=mysqli_fetch_array($query)){
                        $idn=$row['id'];
                        $idb=$row['id_brng'];
                        $asset_hana=$row['asset_hana'];
                        $inventory_number=$row['inventory_number'];
                        $sn=$row['sn'];
                        $foto_perangkat=$row['foto_perangkat'];
                        $actual_location=$row['lokasi'];
                        $detail_location=$row['detail_location'];
                        $hostname=$row['asset_description'];
                        $ip_address=$row['ip_address'];
      
                ?>
              
                <tr>
                  <td width='5%'><?php echo $no; ?></td>
                   
                  <td><?php echo $row['asset_hana'] ?></td>
                  <td><?php echo $row['nma_brng'] ?></td>
                  <td><?php echo $row['asset_description'] ?></td>
                  <td ><?php echo $row['ip_address'] ?></td>
                  <td><?php echo $row['sn'] ?></td>
                  <td><a href="#" data-toggle="modal" data-target="#editlok<?=$idn;?>"><i class="fa fa-edit" style="color: green;"></i></a>  <?php echo $row['lokasi'] ?> <?php echo $row['detail_location'] ?></td>
                  <td style="text-align: center;" width='2%'><a href="#" data-toggle="modal" data-target="#myModal12<?=$idn;?>">
                          <i class="fa fa-upload" ></i>
                    </a>
                  </td>
                  <td width='15%'><?php echo $row['update_at2'] ?></td>
                  <td width='5%'>
                     <div class="tools" style="text-align: center;">
                     <a href="#" data-toggle="modal" data-target="#edit<?=$idn;?>"><i class="fa fa-edit" style="color: green;"></i></a> 
                     <a href="#" data-toggle="modal" data-target="#delete<?=$idn;?>"><i class="fa fa-trash" style="color: red;"></i></a>
                    </div>
                  </td>
                </tr>

                <!-- Modal Delete-->
                <div class="modal fade" id="edit<?=$idn;?>" role="dialog">
                      <div class="modal-dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                          <img src="../../logo.jpg" class="pull-right" style="height:38px; width:95px;">
                           <h4 class="modal-title"><b> Form Edit</b></h4>
                          </div>
                              <div class="modal-body">
                                  <form method="post" role="form" enctype="multipart/form-data" class="form-horizontal">
                                    <!-- text input -->
                                    <div class="form-group">
                                      <label>NO ASSET</label>
                                      <input type="text" class="form-control" name="no_asset" value="<?php echo $row['asset_hana'] ?>" >
                                    </div>
                                    <div class="form-group">
                                      <label>Device Name</label> 
                                      <input type="text" class="form-control" name="Cap_date" value="<?php echo $row['nma_brng'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                      <label>Hostname</label>
                                      <input type="text" class="form-control" name="hostname" value="<?php echo $row['asset_description'] ?>" >
                                    </div>
                                    <div class="form-group">
                                      <label>IP Address</label>
                                      <input type="text" class="form-control" name="ip_address" value="<?php echo $row['ip_address'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                      <label>S/N</label>
                                      <input type="text" class="form-control" name="sn" value="<?php echo $row['sn'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                      <label>Actual Location</label> 
                                      <input 
                                      type="text" class="form-control" name="#" value="<?php echo $row['lokasi'] ?> <?php echo $row['detail_location'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                      <label>Detail location</label>
                                      <input type="text" class="form-control" name="detail" value="<?=$detail_location;?>" >
                                    </div>
                                    <div class="form-group">
                                      <label>Ket</label>
                                      <input type="text" class="form-control" name="ket" value="<?php echo $row['ket'] ?>" >
                                    </div>
                                    <div class="form-group">
                                      <label>Date modified</label>
                                      <input type="text" class="form-control" name="date" value="<?php echo $row['update_at2'] ?>" disabled>
                                    </div>
                                    <input type="hidden" name="idn" value="<?=$idn;?>"> 
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-warning" name="updatebrngassetnetwork">Update</button>
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </form>
                              </div>
                        </div>
                         
                      </div>
                    </div>       
 
                 <!-- Modal Delete-->
                 <div class="modal fade" id="delete<?=$idn;?>" role="dialog">
                      <div class="modal-dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Delete</h4>
                          </div>
                          <form  method="POST">
                          <div class="modal-body">
                            <p>  Apakah Anda yakin ingin menghapus Data ini.??<br> <b><?php echo $row['asset_hana'] ?></p></b>
                          </div>
                          <input type="hidden" class="form-control" name="idn" value="<?=$idn;?>">
                          <input type="hidden" class="form-control" name="idb" value="<?=$idb;?>">
                          <input type="hidden" class="form-control" name="detail_location" value="<?=$detail_location;?>">
                          <input type="hidden" class="form-control" name="actual_location" value="<?=$actual_location;?>">
                          <input type="hidden" class="form-control" name="asset_hana" value="<?=$asset_hana;?>">
                          <input type="hidden" class="form-control" name="inventory_number" value="<?=$inventory_number;?>">
                          <input type="hidden" class="form-control" name="sn" value="<?=$sn;?>">
                          <input type="hidden" class="form-control" name="foto_perangkat" value="<?=$foto_perangkat;?>">
                          <input type="hidden" class="form-control" name="ip_address" value="<?=$ip_address;?>">
                          <input type="hidden" class="form-control" name="hostname" value="<?=$hostname;?>">
                          <div class="modal-footer">
                          <button type="submit" class="btn btn-danger" name="deletebrngassetnetwork">delete</button>
                          </div>
                          </form >
                        </div>
                      </div>
                    </div>   

                     <!-- Modal EDIT LOK -->
                     <div class="modal fade" id="editlok<?=$idn;?>" role="dialog">
                      <div class="modal-dialog modal-md">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Edit Lokasi</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <form  method="post" role="form" enctype="multipart/form-data" class="form-horizontal">
                            <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-2 control-label">Lokasi</label>
                                  <div class="col-sm-12">
                                  <select name="id_lokasi" class="form-control" required>
                                    <option>---</option>
                                    <?php
                                                                            
                                    $query7=mysqli_query($koneksi, "SELECT * FROM tb_lokasi2") or die (mysqli_error($koneksi));
                                    while($data=mysqli_fetch_array($query7)){
                                    echo "<option value=$data[id_lok2]> $data[lokasi] </option>";
                                      }
                                  ?>
                                </select>
                              </div>
                            </div> 
                            </div>
                            <div class="modal-footer">
                            <input type="hidden" class="form-control" name="idn" value="<?=$idn;?>">
                            <button type="submit" class="btn btn-success" name="editlokasilva">Apply</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>  
                     
                    
                    <div class="modal fade" id="myModal12<?=$idn;?>" role="dialog">
                            <div class="modal-dialog modal-lg">
                              <div class="box ">
                                <div class="modal-header">
                                  <img src="../../logo.jpg" class="pull-right" style="height:38px; width:95px;">
                                <h4 class="modal-title"> Upload File Master Untuk <b> <?php echo $row['nma_brng'] ?> / <?php echo $row['ip_address'] ?></b> | Last Update : 15-11-2022 </h4>
                                </div>
                                <div class="modal-body">
                                <!-- membuat form input file -->
                                <form method="post" enctype="multipart/form-data" action="../prosess/import/upload_asset_radio.php">
                                    Upload File:
                                    <input class="form-control" name="fileexcel" type="file" required="required">
                                    <br>
                                    Last Update : 15-11-2022 | <a href="/images/coba.jpg" style="background-color:green; color: white;" download>
                                                                Download
                                                                </a>
                                    <input type="hidden" class="form-control" name="id" value="<?=$id;?>">
                                    <input type="hidden" class="form-control" name="file" value="<?=$file;?>">
                                  <div class="box-footer">
                                      <div class="margin pull-right">
                                      <a type="button" class="btn btn-default pull-right pading" data-dismiss="modal">Cancel</a>
                                          <button class="btn btn-primary pull-right" type="submit" name="updatemasterradio">Submit</button>
                                        
                                      </div>   
                                  </div>
                                </form>
                                </div>  
                              </div>
                            </div>
                          </div>
                    
                 <!-- Modal foto-->
                 <div class="modal fade" id="foto<?=$idn;?>" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title"><b>Foto</b></h4>
                          </div>
                          <form  method="POST">
                          <div class="modal-body">
                            <h3><p>Masih berantakan</p></b></h3>
                            <div class="box-body box-profile">
                              <img  src="../../logo.jpg" alt="User profile picture" style="height: 240px;px; width:250px; ">
                            <br>
                          </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                          </form >
                        </div>
                      </div>
                    </div> 
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