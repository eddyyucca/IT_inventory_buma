<?php
require '../koneksi.php';
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
  <title>Dashboard</title>
  <link rel="shortcut icon" href="../../logo.jpg">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
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
            <i class="fas fa-file mr-2"></i> Consumable Operation < 5
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> Consumable Network < 5
          </a>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> Consumable Radio < 5
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
      <img src="../../dist/img/user8-128x128.jpg"  class="brand-image img-circle elevation-3" style="opacity: .8">
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
            <a href="#" class="nav-link active">
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
                <a href="inspeksi.php" class="nav-link">
                  <i class="fa fa-wrench nav-icon"></i>
                  <p>Inspeksi</p>
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
            <h1>Dashboard Network</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right"> 
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#network1" style="color:black;"> <i class="fa fa-wrench"></i><b style="font-zise:8px;"> Device Rusak : <?php 
                  $jumlah_teknik = mysqli_query($koneksi,"SELECT * FROM tb_masuk k
                  left join stock s on s.id_brng=k.id_brng where kategory_b in ('Network','Radio Wireless','Switch','cctv' ,'POE','Network') and status_m='Rusak'  ;");
                  echo mysqli_num_rows($jumlah_teknik);
                  ?></b></button>&nbsp;&nbsp;
                  <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#network" style="color:black;"> <i class="fa fa-tags"> </i><b style="font-zise:10px;"> Device Waranty : <?php 
                     $jumlah_teknik = mysqli_query($koneksi,"SELECT * FROM tb_service where kategori='Network' ;");
                     echo mysqli_num_rows($jumlah_teknik);
                     ?></b></button>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <!-- AREA CHART -->
            <div class="card">
              <div class="card-body">
                <div class="chart" >
                  <div id="populasinetwork2" style=" height: 600px;"></div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-7">
            <!-- AREA CHART -->
            <div class="card">
              <div class="card-body">
                <div class="chart" >
                  <div id="populasinetwork1" style=" height: 600px;"></div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-7">
            <!-- AREA CHART -->
            <div class="card">
              <div class="card-body">
                <div class="chart" >
                  <div id="piechartnetwork" style=" height: 600px;"></div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-5">
            <!-- LINE CHART -->
            <div class="card">
              <div class="card-body">
                <div class="chart">
                <div id="populasinetwork3" style=" height: 600px;">
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- The Modal -->
    <div class="modal fade" id="network">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Modal Heading</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
          <table id="example1" class="table table-bordered table-striped">
                                                <thead style="background-color:#25253B; color: white;">
                                                <tr >
                                                  <th>No</th>
                                                  <th>Device Name</th>
                                                  <th>No Asset</th>
                                                  <th>S/N</th> 
                                                  <th>Ket</th>
                                                  <th>Vendor</th>
                                                  <th>Date</th>
                                                  <th>Aksi</th>
                                                </tr>
                                                </thead >
                                                <?php
                                                    $query3=mysqli_query($koneksi, "SELECT *
                                                    FROM  tb_service s
                                                    left join stock k on k.id_brng=s.id_brng
                                                    left join tb_vendor v on v.id_vendor=s.id_vendor where kategori='Network'
                                                    order by id_service desc    ");
                                                    $no=0;
                                                    $no++;
                                                      while($row3=mysqli_fetch_array($query3)){
                                                        $ids=$row3['id_service'];
                                                        $idb=$row3['id_brng'];
                                                        $no_asset=$row3['no_asset'];
                                                        $no_po=$row3['no_po_s'];
                                                        $sn=$row3['sn'];
                                                ?>
                                                <tr >
                                                  <td width='5%'><?php echo $no; ?></td>
                                                  <td><?php echo $row3['nma_brng'] ?></td>
                                                  <td><?php echo $row3['no_asset'] ?></td>
                                                  <td><?php echo $row3['sn'] ?></td>
                                                  <td><?php echo $row3['ket'] ?></td>
                                                  <td><?php echo $row3['nama_vendor'] ?></td>
                                                  <td><?php echo $row3['tanggal'] ?></td>
                                                  <td width='5%'>
                                                    <div class="tools" style="text-align: center;">
                                                    
                                                    <a href="#" data-toggle="modal" data-target="#delete<?=$ids;?>"><i class="fa fa-trash" style="color: red;"></i></a>
                                                    </div>
                                                  </td> 
                                                </tr>
                                                           <!-- Modal Delete-->
                                                            <div class="modal fade" id="delete<?=$ids;?>" role="dialog">
                                                                <div class="modal-dialog">
                                                                  <!-- Modal content-->
                                                                  <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <h4 class="modal-title"> <b> Warning !!!</b></h4>
                                                                    </div>
                                                                    <form  method="POST">
                                                                    <div class="modal-body">
                                                                      <p>  Yakin, barang ini sudah di kembalikan oleh pihak vendor.??</p>
                                                                      <textarea class="form-control" rows="2  " name="deskripsi" placeholder="Kolom input, jika ada ket tambahan ..." required></textarea>
                                                                    <input type="hidden" class="form-control" name="sn" value="<?=$sn;?>">
                                                                    <input type="hidden" class="form-control" name="no_po" value="<?=$no_po;?>">
                                                                    <input type="hidden" class="form-control" name="no_asset" value="<?=$no_asset;?>">
                                                                    <input type="hidden" class="form-control" name="idb" value="<?=$idb;?>">
                                                                    <input type="hidden" class="form-control" name="ids" value="<?=$ids;?>">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-success" name="deletewaranty">Ok</button>
                                                                    </div>
                                                                    </form >
                                                                  </div>
                                                                </div>
                                                              </div>     
                                                <?php $no++; } ?>
                                            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- The end Modal -->

    <!-- The Modal -->
    <div class="modal fade" id="network1">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Device Rusak</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
      <!-- Modal body -->
      <div class="modal-body">
      <table id="example1" class="table table-bordered table-striped">
                                                <thead style="background-color:#25253B; color: white;">
                                                <tr >
                                                  <th>No</th>
                                                  <th>Device Name</th>
                                                  <th>No Asset</th>
                                                  <th>S/N</th> 
                                                  <th>Ket</th>
                                                  <th>Date</th>
                                                  <th>Kirim</th>
                                                </tr>
                                                </thead >
                                                <?php
                                                    $query3=mysqli_query($koneksi, "SELECT *
                                                      FROM tb_masuk k
                                                      left join stock s on s.id_brng=k.id_brng
                                                      left join tb_lokasi l on l.id_lokasi=s.id_lokasi
                                                       where status_m='Rusak'and kategory_b in ('Network','Radio Wireless','Switch','cctv') order by id_masuk desc ;");
                                                    $no=0;
                                                    $no++;
                                                      while($row3=mysqli_fetch_array($query3)){
                                                        $idb=$row3['id_brng'];
                                                         $idm=$row3['id_masuk'];
                                                         $ket_m=$row3['ket_m'];
                                                         $no_po_m=$row3['no_po_m'];
                                                         $no_asset_m=$row3['no_asset_m'];
                                                         $sn=$row3['sn'];
                                                ?>
                                                <tr >
                                                  <td width='5%'><?php echo $no; ?></td>
                                                  <td><?php echo $row3['nma_brng'] ?></td>
                                                  <td><?php echo $row3['no_asset_m'] ?></td>
                                                  <td><?php echo $row3['sn'] ?></td>
                                                  <td><?php echo $row3['ket_m'] ?></td>
                                                  <td><?php echo $row3['tanggal'] ?></td>
                                                  <td width='5%'>
                                                    <div class="tools" style="text-align: center;">
                                                    
                                                    <a href="#" data-toggle="modal" data-target="#deletde<?=$ids;?>"><i class="fa  fa-rocket" style="color: red;"></i></a>
                                                    </div>
                                                  </td> 
                                                </tr><!-- Modal Delete-->
                                                            <div class="modal fade" id="deletde<?=$ids;?>" role="dialog">
                                                                <div class="modal-dialog">
                                                                  <!-- Modal content-->
                                                                  <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <h4 class="modal-title"> <b> Warning !!!</b></h4>
                                                                    </div>
                                                                    <form  method="POST">
                                                                    <div class="modal-body">
                                                                      <p> Apakah Barang ini sudah persipakan untuk di kirim.? </p>
                                                                    <input type="hidden" class="form-control" name="sn" value="<?=$sn;?>">
                                                                    <input type="hidden" class="form-control" name="no_po" value="<?=$no_po_m;?>">
                                                                    <input type="hidden" class="form-control" name="ket_m" value="<?=$ket_m;?>">
                                                                    <input type="hidden" class="form-control" name="no_asset" value="<?=$no_asset_m;?>">
                                                                    <input type="hidden" class="form-control" name="idb" value="<?=$idb;?>">
                                                                    <input type="hidden" class="form-control" name="idm" value="<?=$idm;?>">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-success" name="deviceservice">Ok</button>
                                                                    </div>
                                                                    </form >
                                                                  </div>
                                                                </div>
                                                              </div>       
 
                                                <?php $no++; } ?>
                                            </table>
              </div>
        </div>
      </div>
    </div>
    <!-- The end Modal -->

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong></strong> PT. BUKITMAKMUR-IPR
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-teal">
    <!-- Add Content Here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- page script -->
<script src="../charts/highcharts.js"></script>
<script src="../charts/exporting.js"></script>
<!-- Chart cctv -->
<script>
  Highcharts.chart('populasinetwork2', {
    chart: {
        type: 'column'
    },
    title: {
        text: '<B>CCTV</B>'
    },
    subtitle: {
        text: 'PT. BUMA - IPR'
    },
    xAxis: {
        categories: [
          <?php  $data=mysqli_query($koneksi, "SELECT  * FROM stock where kategory_b in ('cctv') and asset in ('Asset','Low Value Asset') order by kategory_b DESC ; ");
              while($row3=mysqli_fetch_array($data))
              {
                ?>

               '<?php echo substr($row3['nma_brng'], 0, 15 )?>',
                <?php  }?>
           
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:19px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Standby',
        data: [  <?php  $data=mysqli_query($koneksi, "SELECT  * FROM stock where kategory_b in ('cctv') and asset in ('Asset','Low Value Asset') order by kategory_b DESC ; ");
              while($row3=mysqli_fetch_array($data))
              {
                ?>

               [<?php echo $row3['stock'] ?>],
                <?php  }?>],
            dataLabels: {
      enabled: true,
      rotation: 0,
      color: '#FFFFFF',
      align: 'center',
      format: '{point.y:1f}', // one decimal
      y: 1, // 10 pixels down from the top
      style: {
        fontSize: '10px',
        fontFamily: 'Verdana, sans-serif'
      }
    }

    }, {
        name: 'Active',
        data: [   <?php  $data=mysqli_query($koneksi, "SELECT  * FROM stock where kategory_b in ('cctv') and asset in ('Asset','Low Value Asset') order by kategory_b DESC ; ");
              while($row3=mysqli_fetch_array($data))
              {
                ?>

               [<?php echo $row3['device_active'] ?>],
                <?php  }?>],
            dataLabels: {
      enabled: true,
      rotation: 0,
      color: '#FFFFFF',
      align: 'center',
      format: '{point.y:1f}', // one decimal
      y: 1, // 10 pixels down from the top
      style: {
        fontSize: '10px',
        fontFamily: 'Verdana, sans-serif'
      }
    }

    }]
});
</script>

<!-- Chart Switch -->
<script>
  Highcharts.chart('populasinetwork1', {
    chart: {
        type: 'column'
    },
    title: {
        text: '<B>Switch</B>'
    },
    subtitle: {
        text: 'PT. BUMA - IPR'
    },
    xAxis: {
        categories: [
          <?php  $data=mysqli_query($koneksi, "SELECT  * FROM stock where kategory_b in ('Switch') and asset in ('Asset','Low Value Asset','consumable') order by kategory_b DESC ; ");
              while($row3=mysqli_fetch_array($data))
              {
                ?>

               '<?php echo substr($row3['nma_brng'], 0, 25 )?>',
                <?php  }?>
           
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:19px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Standby',
        data: [  <?php  $data=mysqli_query($koneksi, "SELECT  * FROM stock where  kategory_b in ('Switch') and asset in ('Asset','Low Value Asset','consumable') order by kategory_b DESC ; ");
              while($row3=mysqli_fetch_array($data))
              {
                ?>

               [<?php echo $row3['stock'] ?>],
                <?php  }?>],
            dataLabels: {
      enabled: true,
      rotation: 0,
      color: '#FFFFFF',
      align: 'center',
      format: '{point.y:1f}', // one decimal
      y: 1, // 10 pixels down from the top
      style: {
        fontSize: '12px',
        fontFamily: 'Verdana, sans-serif'
      }
    }

    }, {
        name: 'Active',
        data: [   <?php  $data=mysqli_query($koneksi, "SELECT  * FROM stock where  kategory_b in ('Switch') and asset in ('Asset','Low Value Asset','consumable') order by kategory_b DESC ; ");
              while($row3=mysqli_fetch_array($data))
              {
                ?>

               [<?php echo $row3['device_active'] ?>],
                <?php  }?>],
            dataLabels: {
      enabled: true,
      rotation: 0,
      color: '#FFFFFF',
      align: 'center',
      format: '{point.y:1f}', // one decimal
      y: 1, // 10 pixels down from the top
      style: {
        fontSize: '12px',
        fontFamily: 'Verdana, sans-serif'
      }
    }

    }]
});
</script>

<script>
  Highcharts.chart('populasinetwork3', {
    chart: {
        type: 'column'
    },
    title: {
        text: '<B>Radio Wireless</B>'
    },
    subtitle: {
        text: 'PT. BUMA - IPR'
    },
    xAxis: {
        categories: [
          <?php  $data=mysqli_query($koneksi, "SELECT  * FROM stock where kategory_b in ('Radio Wireless') and asset in ('Asset','Low Value Asset') order by kategory_b DESC ; ");
              while($row3=mysqli_fetch_array($data))
              {
                ?>

               '<?php echo substr($row3['nma_brng'], 0, 15 )?>',
                <?php  }?>
           
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:19px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Standby',
        data: [  <?php  $data=mysqli_query($koneksi, "SELECT  * FROM stock where kategory_b in ('Radio Wireless') and asset in ('Asset','Low Value Asset') order by kategory_b DESC ; ");
              while($row3=mysqli_fetch_array($data))
              {
                ?>

               [<?php echo $row3['stock'] ?>],
                <?php  }?>],
            dataLabels: {
      enabled: true,
      rotation: 0,
      color: '#FFFFFF',
      align: 'center',
      format: '{point.y:1f}', // one decimal
      y: 1, // 10 pixels down from the top
      style: {
        fontSize: '10px',
        fontFamily: 'Verdana, sans-serif'
      }
    }

    }, {
        name: 'Active',
        data: [   <?php  $data=mysqli_query($koneksi, "SELECT  * FROM stock where kategory_b in ('Radio Wireless') and asset in ('Asset','Low Value Asset') order by kategory_b DESC ; ");
              while($row3=mysqli_fetch_array($data))
              {
                ?>

               [<?php echo $row3['device_active'] ?>],
                <?php  }?>],
            dataLabels: {
      enabled: true,
      rotation: 0,
      color: '#FFFFFF',
      align: 'center',
      format: '{point.y:1f}', // one decimal
      y: 1, // 10 pixels down from the top
      style: {
        fontSize: '10px',
        fontFamily: 'Verdana, sans-serif'
      }
    }

    }]
});
</script>


<!-- Chart Radio -->
<script>
  Highcharts.chart('populasiradio', {
    chart: {
        type: 'column'
    },
    title: {
        text: '<B>Populasi Device</B>'
    },
    subtitle: {
        text: 'PT. BUMA - IPR'
    },
    xAxis: {
        categories: [
          <?php  $data=mysqli_query($koneksi, "SELECT  * FROM stock where kategory_b in ('Radio Rig','Radio','Radio HT') and asset in ('Asset','Low Value Asset') order by kategory_b DESC ; ");
              while($row3=mysqli_fetch_array($data))
              {
                ?>

               '<?php echo substr($row3['nma_brng'], 0, 25 )?>',
                <?php  }?>
        ],
        crosshair: true
    }, 
    yAxis: {
        min: 0,
        title: {
            text: 'Total'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:19px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Standby',
        data: [  <?php  $data=mysqli_query($koneksi, "SELECT  * FROM stock where  kategory_b in ('Radio Rig','Radio','Radio HT') and asset in ('Asset','Low Value Asset') order by kategory_b DESC ; ");
              while($row3=mysqli_fetch_array($data))
              {
                ?>

               [<?php echo $row3['stock'] ?>],
                <?php  }?>],
            dataLabels: {
      enabled: true,
      rotation: 0,
      color: '#FFFFFF',
      align: 'center',
      format: '{point.y:1f}', // one decimal
      y: 1, // 10 pixels down from the top
      style: {
        fontSize: '12px',
        fontFamily: 'Verdana, sans-serif'
      }
    }

    }, {
        name: 'Active',
        data: [   <?php  $data=mysqli_query($koneksi, "SELECT  * FROM stock where  kategory_b in ('Radio Rig','Radio','Radio HT') and asset in ('Asset','Low Value Asset') order by kategory_b DESC ; ");
              while($row3=mysqli_fetch_array($data))
              {
                ?>

               [<?php echo substr($row3['device_active'], 0, 30) ?>],
                <?php  }?>],
            dataLabels: {
      enabled: true,
      rotation: 0,
      color: '#FFFFFF',
      align: 'center',
      format: '{point.y:1f}', // one decimal
      y: 1, // 10 pixels down from the top
      style: {
        fontSize: '12px',
        fontFamily: 'Verdana, sans-serif'
      }
    }

    }]
});
</script>
<!-- Chart operation1 -->
<script>
  Highcharts.chart('populasioperation1', {
    chart: {
        type: 'column'
    },
    title: {
        text: '<B>Populasi Device</B>'
    },
    subtitle: {
        text: 'PT. BUMA - IPR'
    },
    xAxis: {
        categories: [<?php  $data=mysqli_query($koneksi, "SELECT  * FROM stock where kategory_b in ('PC','UPS','Laptop','Operation') and asset in ('Asset','Low Value Asset') order by kategory_b DESC ; ");
              while($row3=mysqli_fetch_array($data))
              {
                ?>

               '<?php echo substr($row3['nma_brng'], 0, 18 )?>',
                <?php  }?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:19px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Standby',
        data: [<?php  $data=mysqli_query($koneksi, "SELECT  * FROM stock where kategory_b in ('PC','UPS','Laptop','Operation') and asset in ('Asset','Low Value Asset') order by kategory_b DESC ; ");
              while($row3=mysqli_fetch_array($data))
              {
                ?>

              [<?php echo $row3['stock'] ?>],
                <?php  }?>],
            dataLabels: {
      enabled: true,
      rotation: 0,
      color: '#FFFFFF',
      align: 'center',
      format: '{point.y:1f}', // one decimal
      y: 1, // 10 pixels down from the top
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }

    }, {
        name: 'Active',
        data: [<?php  $data=mysqli_query($koneksi, "SELECT  * FROM stock where kategory_b in ('PC','UPS','Laptop','Operation') and asset in ('Asset','Low Value Asset') order by kategory_b DESC ; ");
              while($row3=mysqli_fetch_array($data))
              {
                ?>

                [<?php echo $row3['device_active'] ?>],
                <?php  }?>],
            dataLabels: {
      enabled: true,
      rotation: 0,
      color: '#FFFFFF',
      align: 'center',
      format: '{point.y:1f}', // one decimal
      y: 1, // 10 pixels down from the top
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }

    }]
});
</script>
<!-- page Operation -->
<script>
    Highcharts.chart('populasioperation', {
  chart: {
    type: 'column'
  },
  title: {
    text: '<b>Populasi Device Operation</b>'
  },
  subtitle: {
    text: '<a href="http://10.10.17.155/Inventory_IT/pages/tables/barang_masuk_operation.php" target="_blank">Standby</a> | <a href="http://10.10.17.155/Inventory_IT/pages/tables/data_asset.php" target="_blank">Active</a>'
  },
  xAxis: {
    type: 'category',
    labels: {
      rotation: -45,
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Population'
    }
  },
  legend: {
    enabled: false
  },
  tooltip: {
    pointFormat: 'Total : <b>{point.y:1f}</b>'
  },
  series: [{
    name: 'Population',
    data: [ <?php  $data=mysqli_query($koneksi, "SELECT  * FROM stock where kategory_b in ('PC','UPS','Laptop','Operation') and asset in ('Asset','Low Value Asset') order by id_brng DESC ;");
              while($row3=mysqli_fetch_array($data))
              {
                ?>

               ['<?php echo substr($row3['nma_brng'], 0, 15 )?>',<?php echo $row3['stock'] ?>],
                <?php  }?>
     
    ],
    dataLabels: {
      enabled: true,
      rotation: 0,
      color: '#FFFFFF',
      align: 'right',
      format: '{point.y:1f}', // one decimal
      y: 1, // 10 pixels down from the top
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  }]
});
</script>
<!-- Chart Network -->
<script>
    Highcharts.chart('populasinetwork', {
  chart: {
    type: 'column'
  },
  title: {
    text: '<b>Populasi Device Network</b>'
  },
  subtitle: {
    text: '<a href="http://10.10.17.155/Inventory_IT/pages/tables/barang_masuk_network.php" target="_blank">Standby</a> | <a href="http://10.10.17.155/Inventory_IT/pages/tables/data_asset_network.php" target="_blank">Active</a>'
  },
  xAxis: {
    type: 'category',
    labels: {
      rotation: -45,
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Population'
    }
  }, 
  legend: {
    enabled: false
  }, 
  tooltip: {
    pointFormat: 'Population: <b>{point.y:1f} Unit</b>'
  },
  series: [{ 
    name: 'Population',
    data: [
      <?php  $data=mysqli_query($koneksi, "SELECT  * FROM stock where kategory_b in ('Network','Radio Wireless','Switch','cctv' ,'POE','Network') and asset='Asset' order by kategory_b DESC ; ");
              while($row3=mysqli_fetch_array($data))
              {
                ?>

               ['<?php echo substr($row3['nma_brng'], 0, 15 )?>',<?php echo $row3['stock'] ?>],
                <?php  }?>
     ],
    dataLabels: {
      enabled: true,
      rotation: -0,
      color: '#FFFFFF',
      align: 'right',
      format: '{point.y:1f}', // one decimal
      y: 6, // 10 pixels down from the top
      style: {
        fontSize: '10px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
    
  }]
});
</script> 
<!-- Pie Chart netwokr -->
<script>
Highcharts.chart('piechartnetwork', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: '<b>Stok Consumable</b>'
    },
    accessibility: {
        announceNewData: {
            enabled: true
        },
       
    },

    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y:.f}'
            }
        }
    },
    series: [{
        name: 'Total',
        colorByPoint: true,
        data: [
             <?php  $data=mysqli_query($koneksi, "SELECT  * FROM stock where kategory_b in ('Network','Radio Wireless','Switch','cctv' ,'POE','Network') and asset in ('consumable') order by kategory_b DESC ; ");
              while($row3=mysqli_fetch_array($data))
              {
                ?>
              { 
                name: '<?php echo substr($row3['nma_brng'], 0, 23 )?>',
                y: <?php echo substr($row3['stock'], 0, 15 )?>,
              },
                <?php  }?>
           
         ]
    }]
});
</script> 
<!-- Pie Chart RADIO -->
<script>
Highcharts.chart('piechart1', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null, 
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: '<b>Stok Consumable</b>'
    },
    accessibility: {
        announceNewData: {
            enabled: true
        },
       
    },

    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y:.f}'
            }
        }
    },
    series: [{
        name: 'Total',
        colorByPoint: true,
        data: [ <?php  $data=mysqli_query($koneksi, "SELECT  * FROM stock where kategory_b in ('Radio Rig','Radio') and asset='Consumable' order by kategory_b DESC ; ");
              while($row3=mysqli_fetch_array($data))
              {
                ?>
              { 
                name: '<?php echo substr($row3['nma_brng'], 0, 15 )?>',
                y: <?php echo substr($row3['stock'], 0, 15 )?>,
              },
                <?php  }?>]
    }]
}); 
</script> 
<!-- Pie Chart operation -->
<script>
Highcharts.chart('piechartoperation', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: '<b>Stok Consumable</b>'
    },
    accessibility: {
        announceNewData: {
            enabled: true
        },
       
    },

    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y:.f}'
            }
        }
    },
    series: [{
        name: 'Total',
        colorByPoint: true,
        data: [ <?php  $data=mysqli_query($koneksi, "SELECT  * FROM stock where kategory_b in ('PC','UPS','Laptop','Operation') and asset in('Consumable') order by kategory_b DESC ; ");
              while($row3=mysqli_fetch_array($data))
              {
                ?>
              { 
                name: '<?php echo substr($row3['nma_brng'], 0, 19 )?>',
                y: <?php echo substr($row3['stock'], 0, 15 )?>,
              },
                <?php  }?>]
    }]
});
</script> 

<script>
Highcharts.chart('container5', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'xxxxxx xxxxxxxx xxxxxxx'
    },
    xAxis: {
        categories: ['Q1 2019', 'Q2 2019', 'Q3 2019', 'Q4 2019', 'Q1 2020', 'Q2 2020',
            'Q3 2020', 'Q4 2020', 'Q1 2021', 'Q2 2021', 'Q3 2021']
    },
    yAxis: {
        title: {
            text: 'TWh'
        }
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Total production',
        data: [37.8, 29.3, 30.8, 36.8, 40.5, 35.3, 34.9, 43.6, 45.7, 35.9, 32.7
        ]
    }, {
        name: 'Gross consumption',
        data: [39.9, 29.9, 26.7, 38.1, 39.3, 30.2, 27.5, 36.7, 42.7, 31.4, 27.5
        ]
    }, {
        name: 'Trade surplus',
        data: [-2.2, -0.6, 4.1, -1.3, 1.2, 5.1, 7.4, 6.9, 2.9, 4.5, 5.2]
    }]
});
</script>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</body>
</html>
