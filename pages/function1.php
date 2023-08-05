<?php
//menambah lokasi ==============================================================================================================================================
if(isset($_POST['lokasi1']))
{
    $lokasi1=$_POST['lokasi1'];
   
    $addtomasuk=mysqli_query($koneksi,"insert into tb_lokasi2 (lokasi) values('$lokasi1')");
   
    if($addtomasuk){ 
        header("location:table_user.php");
    }else{
        echo 'gagal';
    }
}
//Delete data lokasi==============================================================================================================================================
if(isset($_POST['deletelokasi2']))
{
    $id_lokasi=$_POST['id_lokasi'];
  
    $qhapus=mysqli_query($koneksi,"delete from tb_lokasi2 where id_lok2='$id_lokasi' ") or die($conn->error);
    
    if($qhapus)
    {
        header("location:table_user.php");
    } else {
        echo "Gagal";
    }

}
//menambah lokasi ==============================================================================================================================================
if(isset($_POST['lokasi3']))
{
    $lokasi=$_POST['lokasi3'];
   
    $addtomasuk=mysqli_query($koneksi,"insert into tb_lokasi (nama_lokasi) values('$lokasi')");
   
    if($addtomasuk){ 
        header("location:table_user.php");
    }else{
        echo 'gagal';
    }
}
//Delete data lokasi==============================================================================================================================================
if(isset($_POST['deletelokasi1']))
{
    $id_lokasi=$_POST['id_lokasi'];
  
    $qhapus=mysqli_query($koneksi,"delete from tb_lokasi where id_lokasi='$id_lokasi' ") or die($conn->error);
    
    if($qhapus)
    {
        header("location:table_user.php");
    } else {
        echo "Gagal";
    }

}
//menambah data karyawan ==============================================================================================================================================
if(isset($_POST['addkaryawan']))
{
    $nik=$_POST['nik'];
    $nama=$_POST['nama'];
    $section=$_POST['section'];
    $level=$_POST['level'];
    $lokasi=$_POST['lokasi'];
    $no_telp=$_POST['no_telp'];
 
    $addtomasuk=mysqli_query($koneksi,"insert into tb_karyawan (nik, nama, section, jabatan, lokasi_kerja, no_telp) values('$nik','$nama','$section','$level',' $lokasi','$no_telp')");
   
    if($addtomasuk){ 
        header("location:all_karyawan.php");
    }else{
        echo 'gagal';
    }
}
//Delete data kar==============================================================================================================================================
if(isset($_POST['deletekar']))
{
    $id_kar=$_POST['id_kar'];
  
    $qhapus=mysqli_query($koneksi,"delete from tb_karyawan where id_kar='$id_kar' ") or die($conn->error);
    
    if($qhapus)
    {
        header("location:all_karyawan.php");
    } else {
        echo "Gagal";
    } 

}

//menambah user log in ==============================================================================================================================================
if(isset($_POST['adduserlogin']))
{
    $nik=$_POST['nik'];
    $nama=$_POST['nama'];
    $password=$_POST['password'];
    $level=$_POST['level'];
 
    $addtomasuk=mysqli_query($koneksi,"insert into tb_user (nama, nik, password, level) values('$nama','$nik','$password','$level')");
   
    if($addtomasuk){
        header("location:table_user.php");
    }else{
        echo 'gagal';
    }
}
//Delete data kar==============================================================================================================================================
if(isset($_POST['deleteuserlog']))
{
    $id_karyawan=$_POST['id_karyawan'];
  
    $qhapus=mysqli_query($koneksi,"delete from tb_user where nik='$id_karyawan' ") or die($conn->error);
    
    if($qhapus)
    {
        header("location:table_user.php");
    } else {
        echo "Gagal";
    }

}



//Delete data waranty Network==============================================================================================================================================
if(isset($_POST['deletewaranty']))
{
    $ids=$_POST['ids'];
    $idb=$_POST['idb'];
    $no_asset=$_POST['no_asset'];
    $no_po=$_POST['no_po'];
    $sn=$_POST['sn']; 
    $deskripsi=$_POST['deskripsi'];  
    
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
    
    $stockskarang1=$ambildatanya1['stock'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1+1;
    
    $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1' where id_brng='$idb' ");
    $add=mysqli_query($koneksi,"insert into tb_masuk (id_brng, no_po_m, no_asset_m, sn, ket_m, status_m) values('$idb','$no_po','$no_asset','$sn','$deskripsi','Bekas')") or die($conn->error);
    $qhapus=mysqli_query($koneksi,"delete from tb_service where id_service='$ids' ") or die($conn->error);
    
    if($qhapus)
    {
        header("location:barang_masuk_network.php");
    } else {
        echo "Gagal";
    }

}
//Delete data waranty operation==============================================================================================================================================
if(isset($_POST['deletewarantyopr']))
{
    $ids=$_POST['ids'];
    $idb=$_POST['idb'];
    $no_asset=$_POST['no_asset'];
    $no_po=$_POST['no_po'];
    $sn=$_POST['sn']; 
    $deskripsi=$_POST['deskripsi'];  
    
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
    
    $stockskarang1=$ambildatanya1['stock'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1+1;
    
    $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1' where id_brng='$idb' ");
    $add=mysqli_query($koneksi,"insert into tb_masuk (id_brng, no_po_m, no_asset_m, sn, ket_m, status_m) values('$idb','$no_po','$no_asset','$sn','$deskripsi','Bekas')") or die($conn->error);
    $qhapus=mysqli_query($koneksi,"delete from tb_service where id_service='$ids' ") or die($conn->error);
    
    if($qhapus)
    {
        header("location:barang_masuk_operation.php");
    } else {
        echo "Gagal";
    }

}
//Delete data waranty radio==============================================================================================================================================
if(isset($_POST['deletewarantyradio']))
{
    $ids=$_POST['ids'];
    $idb=$_POST['idb'];
    $no_asset=$_POST['no_asset'];
    $no_po=$_POST['no_po'];
    $sn=$_POST['sn']; 
    $deskripsi=$_POST['deskripsi'];  
    
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
    
    $stockskarang1=$ambildatanya1['stock'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1+1;
    
    $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1' where id_brng='$idb' ");
    $add=mysqli_query($koneksi,"insert into tb_masuk (id_brng, no_po_m, no_asset_m, sn, ket_m, status_m) values('$idb','$no_po','$no_asset','$sn','$deskripsi','Bekas')") or die($conn->error);
    $qhapus=mysqli_query($koneksi,"delete from tb_service where id_service='$ids' ") or die($conn->error);
    
    if($qhapus)
    {
        header("location:barang_masuk_radio.php");
    } else {
        echo "Gagal";
    }

}

//Device service==============================================================================================================================================
if(isset($_POST['deviceservice']))
{
    $idm=$_POST['idm'];
    $idb=$_POST['idb'];
    $no_asset=$_POST['no_asset'];
    $no_po=$_POST['no_po'];
    $sn=$_POST['sn']; 
    $deskripsi=$_POST['ket_m'];  
    
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
    
    $stockskarang1=$ambildatanya1['stock'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1-1;
    
    $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1' where id_brng='$idb' ");
    $add=mysqli_query($koneksi,"insert into tb_service (id_brng, no_po_s, no_asset, sn, id_vendor, kategori, ket) values('$idb','$no_po','$no_asset','$sn','1','Network','$deskripsi')") or die($conn->error);
    $qhapus=mysqli_query($koneksi,"delete from tb_masuk where id_masuk='$idm' ") or die($conn->error);
    
    if($qhapus)
    {
        header("location:form_barang.php");
    } else {
        echo "Gagal";
    }

}

//Device serviceopr==============================================================================================================================================
if(isset($_POST['deviceserviceopr']))
{
  
    $idm=$_POST['idm'];
    $idb=$_POST['idb'];
    $no_asset=$_POST['no_asset'];
    $no_po=$_POST['no_po'];
    $sn=$_POST['sn']; 
    $deskripsi=$_POST['ket_m'];   
    
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
    
    $stockskarang1=$ambildatanya1['stock'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1-1;
    
    $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1' where id_brng='$idb' ");
    $add=mysqli_query($koneksi,"insert into tb_service (id_brng, no_po_s, no_asset, sn, id_vendor, kategori, ket) values('$idb','$no_po','$no_asset','$sn','1','Operation','$deskripsi')") or die($conn->error);
    $qhapus=mysqli_query($koneksi,"delete from tb_masuk where id_masuk='$idm' ") or die($conn->error);
    
    if($qhapus)
    {
        header("location:form_barang.php");
    } else {
        echo "Gagal";
    }

}

//Device serviceRadio==============================================================================================================================================
if(isset($_POST['deviceserviceradio']))
{
  
    $idm=$_POST['idm'];
    $idb=$_POST['idb'];
    $no_asset=$_POST['no_asset'];
    $no_po=$_POST['no_po'];
    $sn=$_POST['sn']; 
    $deskripsi=$_POST['ket_m'];   
    
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
    
    $stockskarang1=$ambildatanya1['stock'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1-1;
    
    $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1' where id_brng='$idb' ");
    $add=mysqli_query($koneksi,"insert into tb_service (id_brng, no_po_s, no_asset, sn, id_vendor, kategori, ket) values('$idb','$no_po','$no_asset','$sn','1','Radio','$deskripsi')") or die($conn->error);
    $qhapus=mysqli_query($koneksi,"delete from tb_masuk where id_masuk='$idm' ") or die($conn->error);
    
    if($qhapus)
    {
        header("location:form_barang.php");
    } else {
        echo "Gagal";
    }

}
//Update master radio==============================================================================================================================================
if(ISSET($_POST['updatemasterradio'])){
    $user_id = $_POST['id'];
    $previous = $_POST['file'];

     // upload file
     $nama_file = $_FILES['gambar']['name'];
     $source = $_FILES['gambar']['tmp_name'];
     $folder='./../uploads/';
     //batas upload file
    $allowed_ext = array("pdf", "jpg", "jpeg", "png");

    $tgl = date("Y-m-d");
    if(in_array($end, $allowed_ext)){
        if(unlink($previous)){
            if(move_uploaded_file($image_temp, $path)){
                mysqli_query($conn, "UPDATE tb_asset_radio set `file` = '$nama_file', `file_master_at` = '$tgl' WHERE `user_id` = '$user_id'") or die(mysqli_error());
                echo "<script>alert('User account updated!')</script>";
                header("location: index.php");
            }
        }		
    }else{
        echo "<script>alert('Image only')</script>";
    }
}
//Update status==============================================================================================================================================

if(isset($_POST['devicerusaknetwork']))
{
    $idm1=$_POST['idm'];
    $idb=$_POST['idb'];

    $cekstockskarang=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya=mysqli_fetch_array($cekstockskarang);

    $stockskarang=$ambildatanya['stock'];
    $tambahkanstocksekarangdengnqty=$stockskarang-1;

    $updatenya=mysqli_query($koneksi,"update tb_masuk set status_m='Rusak'  where id_masuk='$idm1'") or die($koneksi->error);
    $updatestockmasuk=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty' where id_brng='$idb' ");
    if($updatenya&&$updatestockmasuk)
    {
        header("location:barang_masuk_network.php");
    } else {
        echo "Gagal";
    }
} 


//Update status==============================================================================================================================================

if(isset($_POST['devicerusakopr']))
{
    $idm3=$_POST['idm'];

    $updatenya=mysqli_query($koneksi,"update tb_masuk set status_m='Rusak'  where id_masuk='$idm3'") or die($koneksi->error);
    if($updatenya)
    {
        header("location:barang_masuk_operation.php");
    } else {
        echo "Gagal";
    }
} 
//Update status==============================================================================================================================================

if(isset($_POST['devicerusakradio']))
{
    $idm2=$_POST['idm'];

    $updatenya=mysqli_query($koneksi,"update tb_masuk set status_m='Rusak'  where id_masuk='$idm2'") or die($koneksi->error);
    if($updatenya)
    {
        header("location:barang_masuk_radio.php");
    } else {
        echo "Gagal";
    }
} 


//Update ip address_0==============================================================================================================================================

if(isset($_POST['addip0']))
{
    $id_ip=$_POST['id_ip'];
    $device_name=$_POST['device_name'];
    $hostname=$_POST['hostname'];
    $ket=$_POST['ket'];
    $lokasi=$_POST['lokasi'];
    $detail_location=$_POST['detail_location'];

    $updatenya=mysqli_query($koneksi,"update  ip_address_0 set device_name='$device_name', hostname1='$hostname', lokasi1='$lokasi', detail_location1='$detail_location', ket1='$ket', status_='1'   where id_masuk='$id_ip'") or die($koneksi->error);
    if($updatenya)
    {
        header("location:ip_address.php");
    } else {
        echo "Gagal";
    }
} 

//Uplaod config==============================================================================================================================================

if(ISSET($_POST['masterqq'])){
    $user_id = $_POST['id'];
    // upload gambar
    $nama_file = $_FILES['photo']['name'];
    $source = $_FILES['photo']['tmp_name'];
    $folder='./../uploads/Master_radio/'.$nama_file;
    //batas upload gambar
    $previous = $_POST['previous'];
		$exp = explode(".", $nama_file);
		$end = end($exp);
		$name = time().".".$end;
    $allowed_ext = array("icf");
    move_uploaded_file($source, $folder.$nama_file);
    if(in_array($end, $allowed_ext)){
                mysqli_query($koneksi, "UPDATE `tb_asset_radio` set  `file` = '$nama_file' WHERE `id` = '$user_id'") or die(mysqli_error());
                echo "<script>alert('User account updated!')</script>";
                header("location:barang_lva_radio.php");
    
    }else{
        echo "<script>alert('File harus Ext.icf')</script>";
    }
}

?>