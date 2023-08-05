<?php
require('../koneksi.php');
session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:../../index.php?pesan=gagal");
	}
?>
<!DOCTYPE html>
<html> 
<head>
	<title>FORM SERAH TERIMA</title>
  <link rel="shortcut icon" href="../../logo.jpg">
    <style>
table, th, td {
  border: 1px solid black; 
  border-collapse: collapse;
}
</style>
</head>
<body>
<?php
                    $id    = mysqli_real_escape_string($koneksi,$_GET['id']);
                    $query1=mysqli_query($koneksi, "SELECT *
                     FROM tb_asset a
                    left join stock s on s.id_brng=a.id_brng
                    left join tb_karyawan k on k.nik=a.id_kar where a.id='$id'
                    order by id desc  ");
                    $row1=mysqli_fetch_array($query1);
                    $tgl = date("Y-m-d");
                    $tgl1 = date("l, d F Y");
                    date_default_timezone_set("Asia/Makassar");
                    $time = date(" h:i a");

                    $g= $_SESSION['username'];
                    $query5=mysqli_query($koneksi, "SELECT *
                    FROM tb_user where nik='$g'   ");
                     $row3=mysqli_fetch_array($query5);
                                    
  ?>
<table style="width:100%; ">
   <tr style="height:50px;  border:none;">
    <th colspan="1" style="height:50px;  border:none;" > <img src="../../logo.jpg" class="pull-right" style="height:38px; width:95px;"></th>
    <td colspan="4" style="height:50px;  border:none;"><center><b style="font-size:25px;">TANDA TERIMA</b></center></td>
    <td colspan="1" style="height:50px;  border:none; font-size:11px;"> <center><?=$tgl;?> <br/><B style="font-size:9px;"><?=$time;?></b></center></td>
  </tr>
    <td colspan="6"></td>
  </tr>
  <tr style="font-size:15px;">
    <td>SITE</td>
    <td colspan="2">IPR</td>
    <td width='15%'>Hari/Tanggal</td>
    <td colspan="2"><?=$tgl1;?></td>
  </tr>
  <tr style="font-size:15px;">
    <td width='15%'>Reference <br/> ITR/BAK/PPA </td>
    <td colspan="2"><?php echo $row1['no_asset'] ?></td>
    <td>No. Urut</td>
    <td colspan="2"><?php echo $row1['no_urut'] ?><?php echo $row1['id'] ?></td>
  </tr>
  <tr style="font-size:15px;">
    <td colspan="6"></td>
  </tr>
  <tr style="background-color:#9E9E9E; font-size:14px;">
     <th colspan="3">Perangkat IT</th>
     <th colspan="1">No Regist</th>
     <th colspan="2">Keterangan</th>
  </tr>
  <tr style="font-size:12px; background-color:#9E9E9E; text-align: center;">
    <td>Jenis Barang</td>
    <td>Desk Barang</td>
    <td>Merk</td>
    <td>kode SAP</td>
    <td>SN</td> 
    <td>Kelengkapan</td>
  </tr>
  <?php
                    $id    = mysqli_real_escape_string($koneksi,$_GET['id']);
                    $query=mysqli_query($koneksi, "SELECT *
                    FROM tb_asset a
                    left join stock s on s.id_brng=a.id_brng where a.id='$id'
                    order by id desc ");
                    $no=0;
                    $no++;
                      while($row=mysqli_fetch_array($query)){
  ?>
  <tr style="font-size:12px;">
    <td><?php echo $row['kategory_b'] ?></td>
    <td width='20%'><?php echo $row['nma_brng'] ?></td>
    <td><?php echo $row['no_po'] ?></td>
     <td><?php echo $row['no_asset'] ?></td>
    <td><?php echo $row['sn'] ?></td>
    <td><?php echo $row['ket'] ?></td>
  </tr>
<?php $no++; } ?>
  <tr style="font-size:12px;">
     <td rowspan="5" colspan="4" style="vertical-align : top; border:none;" ><b >Catatan :</b><br/> PENYERAHAN <?php echo $row1['kategory_b'] ?> <?php echo $row1['nma_brng'] ?> SN : <?php echo $row1['sn'] ?>  | Kod.SAP : <?php echo $row1['no_asset'] ?><BR/> PIC : <?php echo $row1['nama'] ?></td>
    <td colspan="1" style="border:none;"><b>Nama Pemilik</b></td>
    <td colspan="1" style="border:none;">: <?php echo $row1['nama'] ?></td>
  </tr>
   <tr style="font-size:12px;"> 
    <td colspan="1" style="border:none;"><b>NIK</b></td>
    <td colspan="1" style="border:none;">: <?php echo $row1['nik'] ?></td>
  </tr>
   <tr style="font-size:12px;"> 
    <td colspan="1" style="border:none;"><b>Section</b></td>
    <td colspan="1" style="border:none;">: <?php echo $row1['section'] ?></td>
  </tr>
   <tr style="font-size:12px;"> 
    <td colspan="1" style="border:none;"><b>Jabatan</b></td> 
    <td colspan="1" style="border:none;">: <?php echo $row1['jabatan'] ?></td>
  </tr>
   <tr style="font-size:12px;"> 
    <td colspan="1" style="border:none;"><b>Location</b></td> 
    <td colspan="1" style="border:none;">: <?php echo $row1['lokasi_kerja'] ?></td>
  </tr>
  <tr style="font-size:12px;"> 
    <td colspan="6" style="border:none;"></td>
  </tr>
   <tr style="font-size:12px;"> 
    <td colspan="6" ><input type="checkbox">  Bersedia mematuhi kebijaksaan IT di lingkungan <b>PT BUMA</b></td>
  </tr>
  <tr style="font-size:12px;"> 
    <td colspan="6"><input type="checkbox"> Bersedia Mengganti jika Asset hilang atau Rusak karena kelalaian saya</td>
  </tr>
   <tr style="font-size:12px;"> 
    <td colspan="6"></td>
  </tr>
  <tr style="font-size:12px;  text-align: center;"> 
    <td colspan="3" width='50%'><b> Di serahkan Oleh</b></td>
     <td colspan="3"> <b>Di terima Oleh</b></td>
  </tr>
  <tr width='50%'  height="80px"  style="font-size:12px; vertical-align : top;"> 
    <td colspan="3" > Ttd</td>
     <td colspan="3"> Ttd</td>
  </tr>
   <tr style="font-size:12px; text-align: center;"> 
    <td colspan="3" width='50%'> IT IPR : <?php echo $row3['nama'] ?> / <?php echo $row3['nik'] ?> </td>
     <td colspan="3"> <?php echo $row1['nama'] ?> / <?php echo $row1['nik'] ?></td>
  </tr>
   <tr style="font-size:12px;"> 
    <td colspan="6"></td>
  </tr>
  <tr style="font-size:12px;"> 
    <td colspan="6" width='50%'> <b>IT/F-013: Revisi 2.0 ; Rel 1 Thn; Tanda Terima</b></td>
  </tr>
  
</table>
	<script>
		window.print();
	</script>
	
</body>
</html>