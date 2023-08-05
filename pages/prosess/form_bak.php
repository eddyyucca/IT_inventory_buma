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
	<title  >FORM BAK</title>
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
                     FROM tb_history_operation a
                    left join stock s on s.id_brng=a.id_brng
                    left join tb_karyawan k on k.nik=a.id_kar where a.id='$id'
                    order by id desc  ");
                    $row1=mysqli_fetch_array($query1);
                    $tgl = date("Y-m-d");
                    $tgl1 = date(" d F Y");
                    date_default_timezone_set("Asia/Makassar");
                    $time = date(" h:i a");
                    $g= $_SESSION['username'];
                    $query5=mysqli_query($koneksi, "SELECT *
                    FROM tb_user where nik='$g'   ");
                     $row3=mysqli_fetch_array($query5);
                                    
  ?>
<table style="width:100%; border:none; ">
   <tr style="height:50px;  border:none;">
    <th colspan="1" style="height:50px;  border:none;" > <img src="../../logo.jpg" class="pull-right" style="height:38px; width:95px;"></th>
    <td colspan="4" style="height:50px;  border:none;"><center><b style="font-size:18px; ">BERITA ACARA KERUSAKAN / KEHILANGAN</b><br><b style="font-size:14px;">No. ..../BAK/ITIPR/.../...</b></center></td>
    <td colspan="1" style="height:50px;  border:none; font-size:11px;"> <center><?=$tgl;?> <br/><B style="font-size:9px;"><?=$time;?></b></center></td>
  </tr>
  <td colspan="6" style="border:none;"> <center><hr color="black" height="5px"/></center></td>
  </tr> 
</table>

<table style="width:100%; border:none; ">
  <tr style="font-size:14px; border:none;">
    <td colspan="6" style="border:none;">Saya, selaku Pengguna (Pemegang) Perangkat IT melaporkan bahwa Perangkat IT yang dikuasakan kepada saya telah rusak/ hilang.</td>
  </tr>
    <tr style="height:20px; border:none;"><td colspan="6" style="border:none;"></td></tr>
  <tr style="font-size:15px; border:none;">
    <td width='15%' style="border:none;">Nama Pengguna </td>
    <td colspan="2" style="border:none;">: <?php echo $row1['nama'] ?></td>
    <td colspan="4" style="border:none;">HO, Dept. / Divisi : ...............</td>
  </tr>
  <tr style="font-size:15px; border:none;">
    <td width='15%' style="border:none;">NIK </td>
    <td colspan="2" style="border:none;">: <?php echo $row1['nik'] ?></td>
    <td colspan="4" style="border:none;">Jobsite :  <text style="font-size:13px;">IPR</text> ,&nbsp;&nbsp; Section :  <text style="font-size:12px;"><?php echo $row1['section'] ?> </text>  </td>
  </tr>
  
  <tr style="height:20px; border:none;"><td colspan="6" style="border:none;"></td></tr>

  <tr style="font-size:12px; background-color:#9E9E9E; text-align: center;">
 
    <td>No. Register Aset</td>
    <td>Nama Perangkat IT</td>
    <td>Serial Number Perangkat IT</td> 
    <td colspan="2">Keterangan</td>
  </tr>
  <?php
                    $id    = mysqli_real_escape_string($koneksi,$_GET['id']);
                    $query=mysqli_query($koneksi, "SELECT *
                    FROM tb_history_operation a
                    left join stock s on s.id_brng=a.id_brng where a.id='$id'
                    order by id desc ");
                    $no=0;
                    $no++;
                      while($row=mysqli_fetch_array($query)){
  ?>
  <tr style="font-size:12px; text-align: center;">
    <td width='15%'><?php echo $row['no_asset_r'] ?></td>
    <td width='15%'><?php echo $row['nma_brng'] ?></td>
     <td width='15%'><?php echo $row['sn_s'] ?></td>
    <td colspan="2"><?php echo $row['ket'] ?></td> 
  </tr>
<?php $no++; } ?>
<tr style="height:12x; border:none;"><td colspan="6" style="border:none;"></td></tr>
  <tr style="font-size:13px; height:100px;">
     <td colspan="6" style="vertical-align : top; border:1px solid black;" ><b >Kronologis</b> <text style="font-size:8px;">(bagian ini diisi oleh Pengguna)</text> :</td>
  </tr>
  <tr style="font-size:13px; height:100px;">
     <td colspan="6" style="vertical-align : top; border:1px solid black;" ><b >Analisa</b> <text style="font-size:8px;">(bagian ini diisi oleh IT)</text> :</td>
  </tr>
  <tr style="font-size:13px; height:100px;">
     <td colspan="6" style="vertical-align : top; border:1px solid black;" ><b >Rekomendasi</b> <text style="font-size:8px;">(bagian ini diisi oleh IT)</text> :</td>
  </tr>
  <tr style="height:15px; border:none;"><td colspan="6" style="border:none;"></td></tr>
  <tr style="font-size:14px; border:none;">
    <td colspan="6" style="border:none;">Dengan ini akan menerima segala pertanggung-jawaban atas kerusakan / kehilangan Perangkat IT yang dikuasakan oleh perusahaan kepada saya. Demikian Berita Acara kerusakan / kehilangan ini dibuat dengan sebenarnya</td>
  </tr>
  <tr style="height:15px; border:none;"><td colspan="6" style="border:none;"></td></tr>
   <tr style="font-size:12px;  border:none;"> 
    <td colspan="6" style=" border:none;"><b>Tabang , Tanggal. <?=$tgl1;?></b></td>
  </tr>
   <tr style="font-size:12px;"> 
    <td colspan="6"></td>
  </tr>
  </table>
  <table style="width:100%; border:none; ">
  <tr style="font-size:12px;  text-align: center;"> 
    <td colspan="2"><b>Pengguna,</b></td>
    <td colspan="2"><b>Penganalisa,</b></td>
     <td colspan="4"> <b>Diketahui,</b></td>
  </tr>
  <tr width='50%'  height="80px"  style="font-size:12px; vertical-align : top;"> 
    <td colspan="2" > Ttd</td>
     <td colspan="2"> Ttd</td>
     <td colspan="2" > Ttd</td>
     <td colspan="2"> Ttd</td>
  </tr>
   <tr style="font-size:12px; text-align: left;"> 
    <td colspan="2"><b>Nama :</b> <?php echo $row1['nama'] ?> / <?php echo $row1['nik'] ?> </td>
     <td colspan="2"><b>Nama :</b> </td>
     <td colspan="2"><b>Nama :</b> </td>
     <td colspan="2"><b>Nama :</b> </td>
  </tr>
  <tr style="font-size:12px; text-align: left; borner:none;"> 
    <td colspan="2"><b>Jabatan :</b> <?php echo $row1['jabatan'] ?> </td>
     <td colspan="2"><b>Jabatan :</b> </td>
     <td colspan="2"><b>Jabatan :</b> </td>
     <td colspan="2"><b>Jabatan :</b> </td>
  </tr>
  <tr style="height:15px; border:none;"><td colspan="6" style="border:none;"></td></tr>
  <tr style="font-size:12px; border:none; text-align: left;"> 
    <td colspan="8" style="border:none;"><b>Keterangan,</b> </td>
  </tr>
  <tr style="font-size:12px; border:none; text-align: left;"> 
    <td colspan="2" style="border:none; font-style: oblique;">Penganalisa :  </td>
     <td colspan="2" style="border:none; font-style: oblique;">Jobsite : IT Support</td>
     <td colspan="4" style="border:none; font-style: oblique;">HO : IT Officer</td>
  </tr>
  <tr style="font-size:12px; border:none; text-align: left;"> 
    <td colspan="2" style="border:none; font-style: oblique;">Atasan User  : </td>
     <td colspan="2" style="border:none; font-style: oblique;">Jobsite : Section Head</td>
     <td colspan="4" style="border:none; font-style: oblique;">HO : Dept. / Division Head</td>
  </tr>
  <tr style="font-size:12px; border:none; text-align: left;"> 
    <td colspan="2" style="border:none; font-style: oblique;">Atasan IT &nbsp;&nbsp;&nbsp; : </td>
     <td colspan="2" style="border:none; font-style: oblique;">Jobsite : PM</td>
     <td colspan="4" style="border:none; font-style: oblique;">HO : IT Dept. Head</td>
  </tr>
  <tr style="height:150px; border:none;"><td colspan="6" style="border:none;"></td></tr>
  <tr style="font-size:12px; none:"> 
    <td colspan="8" width='50%' style="border:none;"> <b>IT/F-004 ; Revisi 0.1</b></td>
  </tr>
  
</table>
	<script>
		window.print();
	</script>
</body>

</html>