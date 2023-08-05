<?php

//KODENKSI
$koneksi=mysqli_connect("localhost","root","","db_inventori_itbuma");

//menambah stock ==================================================================================================================================
if(isset($_POST['addnewbarang']))
{
    $nma_brng=$_POST['nma_brng'];
    $type=$_POST['type'];
    $Merek=$_POST['Merek'];
    $asset=$_POST['asset'];
    $deskripsi=$_POST['deskripsi'];
    $satuan=$_POST['satuan'];

    $id_lokasi=$_POST['id_lokasi'];
    // upload gambar
    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder='./../uploads/';
    //batas upload gambar
    move_uploaded_file($source, $folder.$nama_file);
    $addtotable=mysqli_query($koneksi, "insert into stock (nma_brng, kategory_b, no_po, asset, deskripsi, stock, image, id_lokasi, satuan) values('$nma_brng','$type','$Merek','$asset','$deskripsi','NULL','$nama_file','$id_lokasi','$satuan')");
  
    if($addtotable){
        header('location:all_device.php'); 
    }else 
    {
       echo 'gagal'; 
    }
  
}

//menambah barang masuk ==============================================================================================================================================
if(isset($_POST['brngmasuk']))
{
    $id_brng=$_POST['id_brng'];
    $no_po=$_POST['no_po_m'];
    $no_asset_m=$_POST['no_asset_m'];
    $deskripsi=$_POST['deskripsi'];
   
    $qty=$_POST['qty'];
    

    $cekstockskarang=mysqli_query($koneksi,"select * from stock where id_brng='$id_brng' ");
    $ambildatanya=mysqli_fetch_array($cekstockskarang);

    $stockskarang=$ambildatanya['stock'];
    $tambahkanstocksekarangdengnqty=$stockskarang+$qty;

    $addtomasuk=mysqli_query($koneksi,"insert into tb_masuk (id_brng, no_po_m, no_asset_m, ket_m, qty) values('$id_brng','$no_po','$no_asset_m','$deskripsi',' $qty')");
    $updatestockmasuk=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty' where id_brng='$id_brng' ");
    if($addtomasuk&&$updatestockmasuk){
        header("location:view_network_cons.php");
    }else{
        echo 'gagal';
    }
}
//menambah barang masuk ==============================================================================================================================================
if(isset($_POST['brngmasuk1']))
{
    $id_brng=$_POST['id_brng'];
    $no_po=$_POST['no_po_m'];
    $no_asset_m=$_POST['no_asset_m'];
    $deskripsi=$_POST['deskripsi'];
   
    $qty=$_POST['qty'];
    

    $cekstockskarang=mysqli_query($koneksi,"select * from stock where id_brng='$id_brng' ");
    $ambildatanya=mysqli_fetch_array($cekstockskarang);

    $stockskarang=$ambildatanya['stock'];
    $tambahkanstocksekarangdengnqty=$stockskarang+$qty;

    $addtomasuk=mysqli_query($koneksi,"insert into tb_masuk (id_brng, no_po_m, no_asset_m, ket_m, qty) values('$id_brng','$no_po','$no_asset_m','$deskripsi',' $qty')");
    $updatestockmasuk=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty' where id_brng='$id_brng' ");
    if($addtomasuk&&$updatestockmasuk){
        header("location:view_operation_cons.php");
    }else{
        echo 'gagal';
    }
}
//Add to table asset Radio Active ==============================================================================================================================================
if(isset($_POST['insertketableassetradio']))
{
    $idm=$_POST['idm'];
    $Unit=$_POST['Unit'];
    $type_unit=$_POST['type_unit']; 
    $kategory=$_POST['kategory'];
    $id_brng=$_POST['idb'];
    $SN=$_POST['SN'];
    $no_asset=$_POST['no_asset'];

    $cekstockskarang=mysqli_query($koneksi,"select * from stock where id_brng='$id_brng' ");
    $ambildatanya=mysqli_fetch_array($cekstockskarang);

    $stockskarang=$ambildatanya['stock'];
    $tambahkanstocksekarangdengnqty=$stockskarang-1;

    $stockskarang1=$ambildatanya1['device_active'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1+1;

    $addtomasuk=mysqli_query($koneksi,"insert into tb_asset_radio (unit, type_unit, kategori, id_brng, SN, no_asset) values('$Unit','$type_unit','$kategory','$id_brng','$SN','$no_asset')");
    $updatestockmasuk=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty', device_active='$tambahkanstocksekarangdengnqty1' where id_brng='$id_brng' ");
    $qhapus=mysqli_query($koneksi,"delete from tb_masuk where id_masuk='$idm' ") or die($conn->error);

    if($addtomasuk&&$updatestockmasuk&&$qhapus){
        header("location:view_radio.php?pesan1=berhasil");
    }else{
        header("location:view_radio.php?pesan2=gagal");
    }
} 

//Add to table asset Radio Active ==============================================================================================================================================
if(isset($_POST['insertketableassetnetwork']))
{
    $idm=$_POST['idm'];
    $no_po=$_POST['no_po'];
    $no_asset=$_POST['no_asset']; 
    $asset_descrip=$_POST['asset_descrip'];
    $id_brng=$_POST['idb'];
    $SN=$_POST['sn']; 
    $ket=$_POST['ket']; 
    $ip=$_POST['ip']; 
    $lokasi=$_POST['lokasi1'];
    $detail_location=$_POST['detail_location'];
    $gambar=$_POST['gambar'];
    // upload gambar
    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder='./../uploads/Network/'; 
    //batas upload gambar
    move_uploaded_file($source, $folder.$nama_file); 
    $tgl = date("Y-m-d h:i:sa");
    
 
    $qc=mysqli_query($koneksi, "SELECT *  FROM tb_asset_network WHERE ip_address='$ip'");
    $qc1=mysqli_num_rows($qc);
    $qc2=mysqli_query($koneksi, "SELECT *  FROM tb_asset_network WHERE asset_description='$asset_descrip'");
    $qc2=mysqli_num_rows($qc2);
    if($qc1==0&&$qc2==0){
        $cekstockskarang=mysqli_query($koneksi,"select * from stock where id_brng='$id_brng' ");
        $ambildatanya=mysqli_fetch_array($cekstockskarang);
    
        $stockskarang=$ambildatanya['stock'];
        $tambahkanstocksekarangdengnqty=$stockskarang-1;
    
        $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$id_brng' ");
        $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
    
        $stockskarang1=$ambildatanya1['device_active'];
        $tambahkanstocksekarangdengnqty1=$stockskarang1+1;
        $addtomasuk=mysqli_query($koneksi,"insert into tb_asset_network (asset_hana, id_brng, asset_description, ip_address, sn, inventory_number, id_lok, detail_location, foto_perangkat, ket, create_at2) values('$no_asset','$id_brng','$asset_descrip','$ip','$SN','$no_po','$lokasi','$detail_location','$nama_file','$ket','$tgl')") or die($conn->error);
        $ipaddress1=mysqli_query($koneksi,"update ip_address_0 set status_='1' where ip_address_0='$ip' ");
        $ipaddress2=mysqli_query($koneksi,"update ip_address_2 set status_='1' where ip_address_2='$ip' ");
        $ipaddress3=mysqli_query($koneksi,"update ip_address_17 set status_='1' where ip_address_17='$ip' ");
        $ipaddress3=mysqli_query($koneksi,"update ip_address_40 set status_='1' where ip_address_40='$ip' ");
        $qhapus=mysqli_query($koneksi,"delete from tb_masuk where id_masuk='$idm' ") or die($conn->error);
        $updatestockmasuk=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty', device_active='$tambahkanstocksekarangdengnqty1' where id_brng='$id_brng' ");
        if($addtomasuk&&$qhapus&&$updatestockmasuk){header('location:view_network.php?pesan1=berhasil');}
    }else{
        header("location:view_network.php?pesan3=gagal3");
    }
}



//menambah barang Asset masuk radio ==============================================================================================================================================
if(isset($_POST['brngassetmasukradio']))
{ 
    $id_brng=$_POST['id_brng'];
    $no_po=$_POST['no_po_m'];
    $no_asset_m=$_POST['no_asset_m'];
    $deskripsi=$_POST['ket_m'];
    $sn=$_POST['sn'];
  
    $qc=mysqli_query($koneksi, "SELECT *  FROM tb_masuk WHERE sn='$sn'");
    $qc1=mysqli_num_rows($qc);
    
    if($qc1==0){
        $cekstockskarang=mysqli_query($koneksi,"select * from stock where id_brng='$id_brng' ");
        $ambildatanya=mysqli_fetch_array($cekstockskarang);
        $stockskarang=$ambildatanya['stock'];
        $tambahkanstocksekarangdengnqty=$stockskarang+1;
        $updatestockmasuk=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty' where id_brng='$id_brng' ");
        $addtomasuk=mysqli_query($koneksi,"insert into tb_masuk (id_brng, no_po_m, no_asset_m, sn, ket_m, qty, status_m) values('$id_brng','$no_po','$no_asset_m','$sn','$deskripsi','1','Baru')");
        if($updatestockmasuk&&$addtomasuk){header("location:table2.php?id=$id_brng");}
       
    }else{
        echo'
            <script>
                alert("S/N Ready");
                window.location.href="view_radio.php";
            </script>';
    }
}
//menambah barang Asset masuk radio ==============================================================================================================================================
if(isset($_POST['brngassetmasukoperation']))
{
    $id_brng=$_POST['id_brng'];
    $no_po=$_POST['no_po_m'];
    $no_asset_m=$_POST['no_asset_m'];
    $deskripsi=$_POST['ket_m']; 
    $sn=$_POST['sn'];
    

     $qc=mysqli_query($koneksi, "SELECT *  FROM tb_masuk WHERE sn='$sn'");
    $qc1=mysqli_num_rows($qc);
    $qc2=mysqli_query($koneksi, "SELECT *  FROM tb_asset WHERE sn='$sn'");
    $qc2=mysqli_num_rows($qc2);


    if($qc1==0&&$qc2==0){
        $cekstockskarang=mysqli_query($koneksi,"select * from stock where id_brng='$id_brng' ");
        $ambildatanya=mysqli_fetch_array($cekstockskarang);
    
        $stockskarang=$ambildatanya['stock'];
        $tambahkanstocksekarangdengnqty=$stockskarang+1;
        $updatestockmasuk=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty' where id_brng='$id_brng' ");
        $addtomasuk=mysqli_query($koneksi,"insert into tb_masuk (id_brng, no_po_m, no_asset_m, sn, ket_m, qty, status_m) values('$id_brng','$no_po','$no_asset_m','$sn','$deskripsi','1','Baru')");
        if($updatestockmasuk&&$addtomasuk){ header("location:table1.php?id=$id_brng");}
       
    }else{
        header("location:view_operation.php?pesan=gagal");
    }
}

//menambah barang Asset masuk network ==============================================================================================================================================
if(isset($_POST['brngassetmasuknetwork']))
{ 
    $id_brng=$_POST['id_brng']; 
    $no_po=$_POST['no_po_m'];
    $no_asset_m=$_POST['no_asset_m'];
    $deskripsi=$_POST['ket_m'];
    $sn=$_POST['sn'];
   

    $qc=mysqli_query($koneksi, "SELECT *  FROM tb_masuk WHERE sn='$sn'");
    $qc1=mysqli_num_rows($qc);
    $qc2=mysqli_query($koneksi, "SELECT *  FROM tb_asset_network WHERE sn='$sn'");
    $qc2=mysqli_num_rows($qc2);
    if($qc1==0&&$qc2==0){
        $cekstockskarang=mysqli_query($koneksi,"select * from stock where id_brng='$id_brng' ");
        $ambildatanya=mysqli_fetch_array($cekstockskarang);
    
        $stockskarang=$ambildatanya['stock'];
        $tambahkanstocksekarangdengnqty=$stockskarang+1;
        $updatestockmasuk=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty' where id_brng='$id_brng' ");

        $addtomasuk=mysqli_query($koneksi,"insert into tb_masuk (id_brng, no_po_m, no_asset_m, sn, ket_m, qty, status_m) values('$id_brng','$no_po','$no_asset_m','$sn','$deskripsi','1','Baru')");
        if($updatestockmasuk&&$addtomasuk){header("location:table.php?id=$id_brng");}
       
    }else{ 
        header("location:view_network.php?pesan=gagal");
    }
}

//menambah barang keluar ==============================================================================================================================================
if(isset($_POST['brngkeluar']))
{
    $id_brng=$_POST['id_brng'];
    $deskripsi=$_POST['deskripsi'];
    $qty=$_POST['qty'];

    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$id_brng' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);

    $stockskarang1=$ambildatanya1['stock'];

    if($stockskarang1 >= $qty){
            $tambahkanstocksekarangdengnqty1=$stockskarang1-$qty;

            $addtokeluar=mysqli_query($koneksi,"insert into tb_keluar (id_brng_k, no_po_k, deskripsi1, qty_k) values('$id_brng','-','$deskripsi',' $qty')") or die($koneksi->error);
            $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1' where id_brng='$id_brng' ");
            if($addtokeluar&&$updatestockkeluar){
                header('location:view_network.php');
            }else{
                echo 'gagal';
            }
        } else {
            echo'
            <script>
                alert("Stock Ini tidak mencukupi");
                window.location.href="view_network.php";
            </script>';
        }
} 

//menambah barang keluar ==============================================================================================================================================
if(isset($_POST['brngkeluar1']))
{
    $id_brng=$_POST['id_brng'];
    $deskripsi=$_POST['deskripsi'];
    $qty=$_POST['qty'];

    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$id_brng' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);

    $stockskarang1=$ambildatanya1['stock'];

    if($stockskarang1 >= $qty){
            $tambahkanstocksekarangdengnqty1=$stockskarang1-$qty;

            $addtokeluar=mysqli_query($koneksi,"insert into tb_keluar (id_brng_k, no_po_k, deskripsi1, qty_k) values('$id_brng','-','$deskripsi',' $qty')") or die($koneksi->error);
            $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1' where id_brng='$id_brng' ");
            if($addtokeluar&&$updatestockkeluar){
                header('location:view_operation.php');
            }else{
                echo 'gagal';
            }
        } else {
            echo'
            <script>
                alert("Stock Ini tidak mencukupi");
                window.location.href="view_operation.php";
            </script>';
        }
} 

//menambah barang keluar ==============================================================================================================================================
if(isset($_POST['brngkeluar2']))
{
    $id_brng=$_POST['id_brng'];
    $deskripsi=$_POST['deskripsi'];
    $qty=$_POST['qty'];

    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$id_brng' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);

    $stockskarang1=$ambildatanya1['stock'];

    if($stockskarang1 >= $qty){
            $tambahkanstocksekarangdengnqty1=$stockskarang1-$qty;

            $addtokeluar=mysqli_query($koneksi,"insert into tb_keluar (id_brng_k, no_po_k, deskripsi1, qty_k) values('$id_brng','-','$deskripsi',' $qty')") or die($koneksi->error);
            $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1' where id_brng='$id_brng' ");
            if($addtokeluar&&$updatestockkeluar){
                header('location:view_radio.php');
            }else{
                echo 'gagal';
            }
        } else {
            echo'
            <script>
                alert("Stock Ini tidak mencukupi");
                window.location.href="view_radio.php";
            </script>';
        }
} 
 
//menambah data asset==============================================================================================================================================
if(isset($_POST['insertassetoperation']))
{
    require '../koneksi.php';
    $idm=$_POST['idm'];
    $id_kar=$_POST['id_kar'];
    $id_brng=$_POST['idb'];
    $no_po=$_POST['no_po'];
    $no_asset=$_POST['no_asset'];
    $sn=$_POST['sn'];
    $ket=$_POST['ket'];
    $lokasi=$_POST['lokasi'];
    $penyerah=$_POST['penyerah'];
    $detail_location=$_POST['detail_location'];

    $tgl = date("Y-m-d h:i:sa"); 
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$id_brng' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
  
    $stockskarang1=$ambildatanya1['stock'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1-1;

    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$id_brng' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
  
    $stockskarang2=$ambildatanya2['device_active'];
    $tambahkanstocksekarangdengnqty2=$stockskarang2+1;
  
    $addtokeluar=mysqli_query($koneksi,"insert into tb_asset (no_urut, id_kar, id_brng, no_po_a, no_asset, sn, ket, lokasi, detail_location, doc, penyerah, create_at1) values ('IPR/IT/TT/22/XII/','$id_kar','$id_brng','$no_po','$no_asset','$sn','$ket','$lokasi','$detail_location','0', '$penyerah','$tgl')") or die($koneksi->error);
    $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1', device_active='$tambahkanstocksekarangdengnqty2' where id_brng='$id_brng' ");
    $qhapus=mysqli_query($koneksi,"delete from tb_masuk where id_masuk='$idm' ") or die($conn->error);

    if($addtokeluar&&$updatestockkeluar){
        header('location:view_operation.php?pesan1=berhasil');
    }else{
        header("location:view_operation.php?pesan3=gagal3");
    }
  
}

//menambah data asset==============================================================================================================================================
if(isset($_POST['insertassetoperation1']))
{
    require '../koneksi.php';
    $idm=$_POST['idm'];
    $id_kar=$_POST['id_kar'];
    $id_brng=$_POST['idb'];
    $no_po=$_POST['no_po'];
    $no_asset=$_POST['no_asset'];
    $sn=$_POST['sn'];
    $ket=$_POST['ket'];
    $lokasi=$_POST['lokasi'];
    $penyerah=$_POST['penyerah'];
    $detail_location=$_POST['detail_location'];

    $tgl = date("Y-m-d h:i:sa"); 
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$id_brng' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
  
    $stockskarang1=$ambildatanya1['stock'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1-1;

    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$id_brng' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
  
    $stockskarang2=$ambildatanya2['device_active'];
    $tambahkanstocksekarangdengnqty2=$stockskarang2+1;
  
    $addtokeluar=mysqli_query($koneksi,"insert into tb_asset (no_urut, id_kar, id_brng, no_po_a, no_asset, sn, ket, lokasi, detail_location, penyerah, create_at1) values ('IPR/IT/TT/22/XII/','$id_kar','$id_brng','$no_po','$no_asset','$sn','$ket','$lokasi','$detail_location', '$penyerah','$tgl')") or die($koneksi->error);
    $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1', device_active='$tambahkanstocksekarangdengnqty2' where id_brng='$id_brng' ");
    $qhapus=mysqli_query($koneksi,"delete from tb_masuk where id_masuk='$idm' ") or die($conn->error);

    if($addtokeluar&&$updatestockkeluar){
        header("location:operation.php?id=$id_brng");
    }else{
        echo 'gagal Brooo';
    }
  
}


//Edit data dati table stock  ======================================================================================================================================================
if(isset($_POST['updatebarang']))
{
   $idb=$_POST['idb'];
   $nma_brng=$_POST['nma_brng'];
   $deskripsi=$_POST['deskripsi'];
   $no_po=$_POST['no_po'];
   $part_number=$_POST['part_number'];
   
   $update=mysqli_query($koneksi,"update stock set part_number='$part_number', nma_brng='$nma_brng', no_po='$no_po', deskripsi='$deskripsi' where id_brng='$idb' ");

    if($update){
        header('location:all_device.php');
    }else{
        echo 'gagal';
    }
}

//Edit lokasi table stock  ======================================================================================================================================================
if(isset($_POST['editlokasi']))
{
   $idb=$_POST['idb'];
   $lok=$_POST['id_lokasi'];
   
   $update=mysqli_query($koneksi,"update stock set id_lokasi='$lok'where id_brng='$idb' ");

    if($update){
        header('location:all_device.php');
    }else{
        echo 'gagal';
    }
}

//Edit lokasi table stock  ======================================================================================================================================================
if(isset($_POST['editlokasilva']))
{
   $idn=$_POST['idn'];
   $lok=$_POST['id_lokasi'];
   
   $update=mysqli_query($koneksi,"update tb_asset_network set id_lok='$lok'  where id='$idn' ");

    if($update){
        header('location:lva_network.php');
    }else{
        echo 'gagal';
    }
}

//Edit data dati table stock  ======================================================================================================================================================
if(isset($_POST['updateip']))
{
   $id_ip=$_POST['id_ip'];
   $device_name=$_POST['device_name'];
   $sn1=$_POST['sn1'];
   $hostname1=$_POST['hostname1'];
   $ket1=$_POST['ket1'];
   $lokasi1=$_POST['lokasi1'];
   $detail_location1=$_POST['detail_location1'];
   
   $update=mysqli_query($koneksi,"update ip_address_0 set device_name='$device_name', sn1='$sn1', hostname1='$hostname1', ket1='$ket1',lokasi1='$lokasi1', detail_location1='$detail_location1', status_='1' where ip_address_0='$id_ip' ");

    if($update){
        header('location:ip_address.php');
    }else{
        echo 'gagal';
    }
}

//edit data barang masuk  =======================================================================================================================================
if(isset($_POST['updatebrngmasuk']))
{
   $idb=$_POST['idb'];
   $idm=$_POST['idm'];
   $ket=$_POST['ket_m'];
   $qty=$_POST['qty'];
   $no_po_m=$_POST['no_po_m'];

   $lihatstock=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
   $stoknya=mysqli_fetch_array($lihatstock);
   $stockskarang=$stoknya['stock'];

   $qtyskarang=mysqli_query($koneksi,"select * from tb_masuk where id_masuk='$idm'");
   $qtynya=mysqli_fetch_array($qtyskarang);
   $qtyskarang=$qtynya['qty'];

    if($qty>$qtyskarang){
       $selisih=$qty-$qtyskarang;
       $kurangin=$stockskarang+$selisih;
       $kurangistocknya=mysqli_query($koneksi,"update stock set stock='$kurangin' where id_brng='$idb'");
       $updatenya=mysqli_query($koneksi,"update tb_masuk set qty='$qty', no_po_m='$no_po_m', ket_m='$ket'  where id_masuk='$idm'");
        if($kurangistocknya&&$updatenya){
            header('location:barang_masuk.php');
                        }else{
                            echo 'gagal';
                        } 
                } else{
                    $selisih=$qtyskarang-$qty;
                    $kurangin=$stockskarang-$selisih;
                    $kurangistocknya=mysqli_query($koneksi,"update stock set stock='$kurangin' where id_brng='$idb'");
                    $updatenya=mysqli_query($koneksi,"update tb_masuk set qty='$qty', no_po_m='$no_po_m', ket_m='$ket'  where id_masuk='$idm'");
                 if($kurangistocknya&&$updatenya){
                     header('location:all_consumable.php');
                                     }else{
                                         echo 'gagal';
                }
            }
}

//edit data barang masuk  =======================================================================================================================================
if(isset($_POST['updatebrngmasuk1']))
{
   $idb=$_POST['idb'];
   $idm=$_POST['idm'];
   $ket=$_POST['ket_m'];
   $qty=$_POST['qty'];
   $no_po_m=$_POST['no_po_m'];

   $lihatstock=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
   $stoknya=mysqli_fetch_array($lihatstock);
   $stockskarang=$stoknya['stock'];

   $qtyskarang=mysqli_query($koneksi,"select * from tb_masuk where id_masuk='$idm'");
   $qtynya=mysqli_fetch_array($qtyskarang);
   $qtyskarang=$qtynya['qty'];

    if($qty>$qtyskarang){
       $selisih=$qty-$qtyskarang;
       $kurangin=$stockskarang+$selisih;
       $kurangistocknya=mysqli_query($koneksi,"update stock set stock='$kurangin' where id_brng='$idb'");
       $updatenya=mysqli_query($koneksi,"update tb_masuk set qty='$qty', no_po_m='$no_po_m', ket_m='$ket'  where id_masuk='$idm'");
        if($kurangistocknya&&$updatenya){
            header('location:barang_masuk.php');
                        }else{
                            echo 'gagal';
                        } 
                } else{
                    $selisih=$qtyskarang-$qty;
                    $kurangin=$stockskarang-$selisih;
                    $kurangistocknya=mysqli_query($koneksi,"update stock set stock='$kurangin' where id_brng='$idb'");
                    $updatenya=mysqli_query($koneksi,"update tb_masuk set qty='$qty', no_po_m='$no_po_m', ket_m='$ket'  where id_masuk='$idm'");
                 if($kurangistocknya&&$updatenya){
                     header("location:table3.php?id=$idb");
                                     }else{
                                         echo 'gagal';
                }
            }
}
//edit data ip_address_20 =======================================================================================================================================
if(isset($_POST['updateip20']))
{
   $ip=$_POST['ip'];
   $unit=$_POST['unit'];
   $type=$_POST['type'];
   $sn_disply=$_POST['sn_disply'];
   $sn_core=$_POST['sn_core'];
   $ket=$_POST['ket'];

   $updatenya=mysqli_query($koneksi,"update ip_address_20 set hostname='$unit', ket_20='$ket', type_unit='$type', sn_disply='$sn_disply', sn_core='$sn_core', status_='1' where ip_address_20='$ip'") or die($koneksi->error);
   if($updatenya)
   {
       header("location:ip_unit_fms.php");
   } else {
       echo "Gagal";
   }

}

//edit data ip_address_20 =======================================================================================================================================
if(isset($_POST['updateip_20']))
{
   $ip=$_POST['ip'];

   $updatenya=mysqli_query($koneksi,"update ip_address_20 set hostname='NULL', ket_20='NULL', type_unit='NULL', status_='0' where ip_address_20='$ip'") or die($koneksi->error);
   if($updatenya)
   {
       header("location:ip_unit_fms.php");
   } else {
       echo "Gagal";
   }

}

//edit data ip_address_20 =======================================================================================================================================
if(isset($_POST['updateip1_20']))
{
   $ip=$_POST['ip'];
   $ket=$_POST['ket'];
   $sn_disply=$_POST['sn_disply'];
   $sn_core=$_POST['sn_core'];

   $updatenya=mysqli_query($koneksi,"update ip_address_20 set  ket_20='$ket', sn_disply='$sn_disply', sn_core='$sn_core' where ip_address_20='$ip'") or die($koneksi->error);
   if($updatenya)
   {
       header("location:ip_unit_fms.php");
   } else {
       echo "Gagal";
   }

}
//edit data barang asset masuk radio  =======================================================================================================================================
if(isset($_POST['updatebrngassetmasukradio']))
{
   $idb=$_POST['idb'];
   $idm=$_POST['idm'];
   $ket=$_POST['ket_m'];
   $sn=$_POST['sn'];
   $no_po_m=$_POST['no_po_m'];
   $no_asset_m=$_POST['no_asset_m'];

   $updatenya=mysqli_query($koneksi,"update tb_masuk set sn='$sn', no_po_m='$no_po_m', no_asset_m=' $no_asset_m', ket_m='$ket'  where id_masuk='$idm'") or die($koneksi->error);
   if($updatenya)
   {
       header("location:barang_masuk_radio.php");
   } else {
       echo "Gagal";
   }

}

//edit data barang asset masuk radio =======================================================================================================================================
if(isset($_POST['updatebrngassetmasukradio1']))
{
   $idb=$_POST['idb'];
   $idm=$_POST['idm'];
   $ket=$_POST['ket_m'];
   $sn=$_POST['sn'];
   $no_po_m=$_POST['no_po_m']; 
   $no_asset_m=$_POST['no_asset_m'];

   $updatenya=mysqli_query($koneksi,"update tb_masuk set sn='$sn', no_po_m='$no_po_m', no_asset_m=' $no_asset_m', ket_m='$ket'  where id_masuk='$idm'") or die($koneksi->error);
   if($updatenya)
   {
       header("location:radio.php?id=$idb");
   } else {
       echo "Gagal";
   }

}
//edit data barang asset masuk operation =======================================================================================================================================
if(isset($_POST['updatebrngassetmasukoperation']))
{
   $idb=$_POST['idb'];
   $idm=$_POST['idm'];
   $ket=$_POST['ket_m'];
   $sn=$_POST['sn'];
   $no_po_m=$_POST['no_po_m'];
   $no_asset_m=$_POST['no_asset_m'];

   $updatenya=mysqli_query($koneksi,"update tb_masuk set sn='$sn', no_po_m='$no_po_m', no_asset_m=' $no_asset_m', ket_m='$ket'  where id_masuk='$idm'") or die($koneksi->error);
   if($updatenya)
   {
       header("location:table1.php?id=$idb");
   } else {
       echo "Gagal";
   }

}


//edit data barang asset masuk radio =======================================================================================================================================
if(isset($_POST['updatebrngassetmasuknetwork']))
{
   $idb=$_POST['idb'];
   $idm=$_POST['idm'];
   $ket=$_POST['ket_m'];
   $sn=$_POST['sn'];
   $no_po_m=$_POST['no_po_m'];
   $no_asset_m=$_POST['no_asset_m'];

   $updatenya=mysqli_query($koneksi,"update tb_masuk set sn='$sn', no_po_m='$no_po_m', no_asset_m=' $no_asset_m', ket_m='$ket'  where id_masuk='$idm'") or die($koneksi->error);
   if($updatenya)
   {
       header("location:table.php?id=$idb");
   } else {
       echo "Gagal";
   }

}

//edit1 data barang asset masuk radio =======================================================================================================================================
if(isset($_POST['updatebrngassetmasukradio']))
{
   $idb=$_POST['idb'];
   $idm=$_POST['idm'];
   $ket=$_POST['ket_m'];
   $sn=$_POST['sn'];
   $no_po_m=$_POST['no_po_m'];
   $no_asset_m=$_POST['no_asset_m'];

   $updatenya=mysqli_query($koneksi,"update tb_masuk set sn='$sn', no_po_m='$no_po_m', no_asset_m=' $no_asset_m', ket_m='$ket'  where id_masuk='$idm'") or die($koneksi->error);
   if($updatenya)
   {
       header("location:table2.php?id=$idb");
   } else {
       echo "Gagal";
   }

}
//edit Data Asset Radio  =======================================================================================================================================
if(isset($_POST['updateassetradio']))
{
   $idr=$_POST['idr'];
   $note=$_POST['note'];

   $updatenya=mysqli_query($koneksi,"update tb_asset_radio set  note='$note'  where id='$idr'") or die($koneksi->error);
   if($updatenya)
   {
       header("location:lva_radio.php");
   } else {
       echo "Gagal";
   }

}

//edit Data Asset Radio  =======================================================================================================================================
if(isset($_POST['updatebrngassetoperation']))
{
   $idr=$_POST['idr'];
   $Kategori=$_POST['Kategori']; 
   $note=$_POST['note'];

   $updatenya=mysqli_query($koneksi,"update tb_asset_radio set kategori='$Kategori', note='$note'  where id='$idr'") or die($koneksi->error);
   if($updatenya)
   {
       header("location:barang_asset_radio.php");
   } else {
       echo "Gagal";
   }

}

//edit Data Asset Network  =======================================================================================================================================
if(isset($_POST['updatebrngassetnetwork']))
{
   $idn=$_POST['idn'];
   $ket=$_POST['ket']; 
    $hostname=$_POST['hostname'];
    $no_asset=$_POST['no_asset'];
    $detail=$_POST['detail'];
  
    $updatenya=mysqli_query($koneksi,"update tb_asset_network set asset_hana='$no_asset', asset_description='$hostname', detail_location='$detail', ket='$ket'  where id='$idn'") or die($koneksi->error);
    if($updatenya)
    {
        header("location:asset_network.php");
    } else {
      header("location:asset_network.php?pesan3=gagal3");
   }

}

//edit1 Data Asset Network  =======================================================================================================================================
if(isset($_POST['updatebrngassetnetwork1']))
{
    $idb=$_POST['idb'];
   $idn=$_POST['idn'];
   $ket=$_POST['ket']; 
    $hostname=$_POST['hostname'];
    $no_asset=$_POST['no_asset'];
  
    $updatenya=mysqli_query($koneksi,"update tb_asset_network set asset_hana='$no_asset', asset_description='$hostname', ket='$ket'  where id='$idn'") or die($koneksi->error);
    if($updatenya)
    {
        header("location:network_asset.php?id=$idb");
    } else {
      header("location:data_asset_network.php?pesan3=gagal3");
   }

}
//edit Data Asset Network  =======================================================================================================================================
if(isset($_POST['updatebrnglvanetwork']))
{
    $idn=$_POST['idn'];
    $ket=$_POST['ket']; 
    $hostname=$_POST['hostname'];
    $detail=$_POST['detail'];
   
    $updatenya=mysqli_query($koneksi,"update tb_asset_network set asset_description='$hostname', ket='$ket',detail_location='$detail' where id='$idn'") or die($koneksi->error);
    if($updatenya) 
    {
        header("location:lva_network.php");
    } else {
       header("location:lva_network.php?pesan3=gagal3");
    }
 
}
//edit data barang keluar  =======================================================================================================================================
if(isset($_POST['updatebrngkeluar']))
{
   $idb=$_POST['idb'];
   $idk=$_POST['idk'];
   $deskripsi1=$_POST['deskripsi1'];
   $qty_k=$_POST['qty_k'];
   $no_po_k=$_POST['no_po_k'];

   $lihatstock=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ") or die($koneksi->error);
   $stoknya=mysqli_fetch_array($lihatstock);
   $stockskarang=$stoknya['stock'];

   $qtyskarang=mysqli_query($koneksi,"select * from tb_keluar where id_keluar='$idk'") or die($koneksi->error);
   $qtynya=mysqli_fetch_array($qtyskarang);
   $qtyskarang=$qtynya['qty_k'];

    if($qty_k>$qtyskarang){
       $selisih=$qty_k-$qtyskarang;
       $kurangin=$stockskarang-$selisih;
       $kurangistocknya=mysqli_query($koneksi,"update stock set stock='$kurangin' where id_brng='$idb'") or die($koneksi->error);
       $updatenya=mysqli_query($koneksi,"update tb_keluar set qty_k='$qty_k', no_po_k='$no_po_k', deskripsi1='$deskripsi1'  where id_keluar='$idk'") or die($koneksi->error);
        if($kurangistocknya&&$updatenya){
            header('location:consumable_out.php');
                        }else{
                            echo 'gagal';
                        }
                } else{
                    $selisih=$qtyskarang-$qty_k;
                    $kurangin=$stockskarang+$selisih;
                    $kurangistocknya=mysqli_query($koneksi,"update stock set stock='$kurangin' where id_brng='$idb'") or die($koneksi->error);
                    $updatenya=mysqli_query($koneksi,"update tb_keluar set qty_k='$qty_k', no_po_k='$no_po_k', deskripsi1='$deskripsi1'  where id_keluar='$idk'") or die($koneksi->error);
                 if($kurangistocknya&&$updatenya){
                     header('location:consumable_out.php');
                                     }else{
                                         echo 'gagal';
                }
            }
}


//edit data barang asset  =======================================================================================================================================
if(isset($_POST['updatebrngasset']))
{
    $ida=$_POST['ida'];
 
    // upload file
    $nama_file = $_FILES['doc']['name'];
    $source = $_FILES['doc']['tmp_name'];
    $folder='./../uploads/file_TT/';
    //batas upload file
    move_uploaded_file($source, $folder.$nama_file);
    $updatenya=mysqli_query($koneksi,"update tb_asset set doc='$nama_file'  where id='$ida'") or die($koneksi->error);
    if($updatenya)
    {
        header("location:asset_operation.php");
    } else {
        echo "Gagal"; 
    }
}

//edit data barang asset  =======================================================================================================================================
if(isset($_POST['updatebrnglva']))
{
    $ida=$_POST['ida'];

    // upload file
    $nama_file = $_FILES['doc']['name'];
    $source = $_FILES['doc']['tmp_name'];
    $folder='./../uploads/file_TT/';
    //batas upload file
    move_uploaded_file($source, $folder.$nama_file);
    $updatenya=mysqli_query($koneksi,"update tb_asset set doc='$nama_file'  where id='$ida'") or die($koneksi->error);
    if($updatenya)
    {
        header("location:lva_operation.php");
    } else {
        echo "Gagal"; 
    }
}
//Delete Data dari table stock ======================================================================================================================================================
if(isset($_POST['deletestock']))
{
    $id=$_POST['idb'];

    $qhapus=mysqli_query($koneksi,"delete from stock where id_brng='$id' ") or die($koneksi->error);
    if($qhapus)
    {
        header("location:all_device.php");
    } else {
        echo "Gagal";
    }
    
}



//Delete data data masuk==============================================================================================================================================
if(isset($_POST['hapusdatamasuk']))
{
    $idb=$_POST['idb'];
    $qty=$_POST['qty']; 
    $idm=$_POST['idm'];
    
    
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
    
    $stockskarang1=$ambildatanya1['stock'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1-$qty;
    
    $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1' where id_brng='$idb' ");
    $qhapus=mysqli_query($koneksi,"delete from tb_masuk where id_masuk='$idm' ") or die($conn->error);
    
    if($qhapus)
    {
        header("location:all_consumable.php");
    } else {
        echo "Gagal";
    }

}
//Delete data data masuk==============================================================================================================================================
if(isset($_POST['hapusdatamasuk1']))
{
    $idb=$_POST['idb'];
    $qty=$_POST['qty']; 
    $idm=$_POST['idm'];
    
    
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
    
    $stockskarang1=$ambildatanya1['stock'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1-$qty;
    
    $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1' where id_brng='$idb' ");
    $qhapus=mysqli_query($koneksi,"delete from tb_masuk where id_masuk='$idm' ") or die($conn->error);
    
    if($qhapus)
    {
        header("location:table3.php?id=$idb");
    } else {
        echo "Gagal";
    }

}

//Delete data ASSET masuk radio==============================================================================================================================================
if(isset($_POST['hapusdataassetmasukradio']))
{
    $idb=$_POST['idb']; 
   
    $idm=$_POST['idm'];
    
    
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
    
    $stockskarang1=$ambildatanya1['stock'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1-1;
    
    $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1' where id_brng='$idb' ");
    $qhapus=mysqli_query($koneksi,"delete from tb_masuk where id_masuk='$idm' ") or die($conn->error);
    
    if($qhapus)
    {
        header("location:radio.php?id=$idb");
    } else {
        echo "Gagal";
    }

}
//Delete data ASSET masuk operation==============================================================================================================================================
if(isset($_POST['hapusdataassetmasukoperation']))
{
    $idb=$_POST['idb'];
   
    $idm=$_POST['idm'];
    
    
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
    
    $stockskarang1=$ambildatanya1['stock'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1-1;
    
    $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1' where id_brng='$idb' ");
    $qhapus=mysqli_query($koneksi,"delete from tb_masuk where id_masuk='$idm' ") or die($conn->error);
    
    if($qhapus)
    {
        header("location:table1.php?id=$idb");
    } else {
        echo "Gagal";
    }

}

//Delete data ASSET masuk network==============================================================================================================================================
if(isset($_POST['hapusdataassetmasuknetwork']))
{
    $idb=$_POST['idb'];
    
    $idm=$_POST['idm'];
    
    
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
    
    $stockskarang1=$ambildatanya1['stock'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1-1;
    
    $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1' where id_brng='$idb' ");
    $qhapus=mysqli_query($koneksi,"delete from tb_masuk where id_masuk='$idm' ") or die($conn->error);
    
    if($qhapus)
    {
        header("location:table.php?id=$idb");
    } else {
        echo "Gagal";
    }

}
//Delete data ASSET masuk network==============================================================================================================================================
if(isset($_POST['hapusdataassetmasukradio']))
{
    $idb=$_POST['idb'];
   
    $idm=$_POST['idm'];
    
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
    $qhapus=mysqli_query($koneksi,"delete from tb_masuk where id_masuk='$idm' ") or die($conn->error);
    
    if($qhapus)
    {
        $stockskarang1=$ambildatanya1['stock'];
        $tambahkanstocksekarangdengnqty1=$stockskarang1-1;
        
        $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1' where id_brng='$idb' ");
        header("location:table2.php?id=$idb");
    } else {
        echo "Gagal";
    }

}

//Delete data data keluar==============================================================================================================================================
if(isset($_POST['hapusdatakeluar']))
{
    $idb=$_POST['idb'];
    $qty_k=$_POST['qty_k'];
    $idk=$_POST['idk']; 
    
    
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
    
    $stockskarang1=$ambildatanya1['stock'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1+$qty_k;
    
    $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1' where id_brng='$idb' ");
    $qhapus=mysqli_query($koneksi,"delete from tb_keluar where id_keluar='$idk' ") or die($conn->error);
    
    if($qhapus)
    {
        header("location:consumable_out.php");
    } else {
        echo "Gagal";
    }
}

//Delete data data asset==============================================================================================================================================
if(isset($_POST['hapusdataasset']))
{
    $idb=$_POST['idb'];
    $ida=$_POST['ida'];
    
    
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
    
    $stockskarang1=$ambildatanya1['stock'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1+1;
    
    $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1' where id_brng='$idb' ");
    $qhapus=mysqli_query($koneksi,"delete from tb_asset where id='$ida' ") or die($conn->error);
    
    if($qhapus)
    {
        header("location:data_asset.php");
    } else {
        echo "Gagal";
    }

}

//Delete data asset Radio==============================================================================================================================================
if(isset($_POST['hapusdataassetradio']))
{
    $idb=$_POST['idb'];
    $idr=$_POST['idr'];   
    $unit=$_POST['unit']; 
    $SN=$_POST['SN']; 
    $nma_brng=$_POST['nma_brng'];
    $type_unit=$_POST['type_unit'];
    $no_asset=$_POST['no_asset'];
     
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
    
    $stockskarang1=$ambildatanya1['stock'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1+1;

    $cekstockskarang=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya=mysqli_fetch_array($cekstockskarang);

    $stockskarang=$ambildatanya['device_active'];
    $tambahkanstocksekarangdengnqty=$stockskarang-1;
    
    $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1', device_active='$tambahkanstocksekarangdengnqty' where id_brng='$idb' ");
    $addtomasuk=mysqli_query($koneksi,"insert into tb_history_data (nama_s, nik, section, type_unit, id_brng, sn_s, no_asset_r, kategori) values('$unit','-','-','$type_unit','$idb','$SN','$no_asset','Radio')");
    $add=mysqli_query($koneksi,"insert into tb_masuk (id_brng, no_po_m, no_asset_m, sn, status_m) values('$idb','-','$no_asset','$SN','Bekas')");
    $qhapus=mysqli_query($koneksi,"delete from tb_asset_radio where id='$idr' ") or die($conn->error);
    
    if($addtomasuk&&$qhapus)
    {
        header("location:asset_radio.php");
    } else {
        echo "Gagal";
    }

}
//Delete data asset Radio==============================================================================================================================================
if(isset($_POST['hapusdatalvaradio']))
{
    $idb=$_POST['idb'];
    $idr=$_POST['idr'];   
    $unit=$_POST['unit']; 
    $SN=$_POST['SN']; 
    $nma_brng=$_POST['nma_brng'];
    $type_unit=$_POST['type_unit'];
    $no_asset=$_POST['no_asset'];
     
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
    
    $stockskarang1=$ambildatanya1['stock'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1+1;

    $cekstockskarang=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya=mysqli_fetch_array($cekstockskarang);

    $stockskarang=$ambildatanya['device_active'];
    $tambahkanstocksekarangdengnqty=$stockskarang-1;
    
    $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1', device_active='$tambahkanstocksekarangdengnqty' where id_brng='$idb' ");
    $addtomasuk=mysqli_query($koneksi,"insert into tb_history_data (nama_s, nik, section, type_unit, id_brng, sn_s, no_asset_r, kategori) values('$unit','-','-','$type_unit','$idb','$SN','$no_asset','Radio')");
    $add=mysqli_query($koneksi,"insert into tb_masuk (id_brng, no_po_m, no_asset_m, sn, status_m) values('$idb','-','$no_asset','$SN','Bekas')");
    $qhapus=mysqli_query($koneksi,"delete from tb_asset_radio where id='$idr' ") or die($conn->error);
    
    if($addtomasuk&&$qhapus)
    {
        header("location:lva_radio.php"); 
    } else {
        echo "Gagal";
    }

}
//Delete data asset Radio==============================================================================================================================================
if(isset($_POST['hapusdataassetoperation']))
{ 
    $idb=$_POST['idb'];
    $ida=$_POST['ida'];   
    $nama_pic=$_POST['nama_pic']; 
    $SN=$_POST['sn']; 
    $no_asset=$_POST['no_asset']; 
    $nik=$_POST['nik'];
    $section=$_POST['section'];
    $ket=$_POST['ket'];
    $penerima=$_POST['penerima'];
     
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
    
    $stockskarang1=$ambildatanya1['stock'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1+1;

    $cekstockskarang2=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya2=mysqli_fetch_array($cekstockskarang2);   
    
    $stockskarang2=$ambildatanya2['device_active'];
    $tambahkanstocksekarangdengnqty2=$stockskarang2-1;
    
    $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1',  device_active='$tambahkanstocksekarangdengnqty2' where id_brng='$idb' ");
    $addtomasuk=mysqli_query($koneksi,"insert into tb_history_operation (no_urut, id_kar, type_unit, id_brng, sn_s, no_asset_r, kategori, ket, doc_ ,  penerima) values('IPR/IT/TP/22/XII/','$nik','-','$idb','$SN','$no_asset','Operation','$ket','0', '$penerima')");
    $add=mysqli_query($koneksi,"insert into tb_masuk (id_brng, no_po_m, no_asset_m, sn,ket_m, status_m) values('$idb','-','$no_asset','$SN','Bekas $nama_pic - $nik/$section','Bekas')");
    $qhapus=mysqli_query($koneksi,"delete from tb_asset where id='$ida' ") or die($conn->error);
    
    if($addtomasuk&&$qhapus)
    {
        header("location:asset_operation.php");
    } else {
        echo "Gagal";
    }

}

//Delete data asset Radio==============================================================================================================================================
if(isset($_POST['deletebrngassetnetwork']))
{
    $idb=$_POST['idb']; 
    $idn=$_POST['idn']; 
    $actual_location=$_POST['actual_location'];
    $asset_hana=$_POST['asset_hana']; 
    $actual_location=$_POST['actual_location'];
    $detail_location=$_POST['detail_location']; 
    $inventory_number=$_POST['inventory_number'];
    $foto_perangkat=$_POST['foto_perangkat']; 
    $sn=$_POST['sn'];   
    $ip=$_POST['ip_address'];
    $hostname=$_POST['hostname'];  
    
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
    
    $stockskarang1=$ambildatanya1['stock'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1+1;

    $qhapus=mysqli_query($koneksi,"delete from tb_asset_network where id='$idn' ") or die($conn->error);
    
    if($qhapus)
    {
        $cekstockskarang2=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
        $ambildatanya2=mysqli_fetch_array($cekstockskarang2);
        
        $stockskarang2=$ambildatanya2['device_active'];
        $tambahkanstocksekarangdengnqty2=$stockskarang2-1;
    
        $ipaddress=mysqli_query($koneksi,"update ip_address_0 set status_='0' where ip_address_0='$ip' ");
        $ipaddress2=mysqli_query($koneksi,"update ip_address_2 set status_='0' where ip_address_2='$ip' ");
        $ipaddress2=mysqli_query($koneksi,"update ip_address_17 set status_='0' where ip_address_17='$ip' ");
        $ipaddress2=mysqli_query($koneksi,"update ip_address_25 set status_='0' where ip_address_25='$ip' ");
        $ipaddress2=mysqli_query($koneksi,"update ip_address_40 set status_='0' where ip_address_40='$ip' ");
        $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1', device_active='$tambahkanstocksekarangdengnqty2' where id_brng='$idb' ");
        $addtomasuk=mysqli_query($koneksi,"insert into tb_history_data (nama_s, nik, section, type_unit, id_brng, sn_s, no_asset_r, kategori, lokasi_akhir, ip_address_h, hostname) values('$idb','-','-','-','$idb','$sn','$asset_hana','Network','$actual_location $detail_location','$ip','$hostname')");
        $add=mysqli_query($koneksi,"insert into tb_masuk (id_brng, no_po_m, no_asset_m, sn, ket_m, status_m, gambar) values('$idb','$inventory_number','$asset_hana','$sn','BEKAS $actual_location $detail_location','Bekas','$foto_perangkat')");
        
        header("location:asset_network.php");
    } else {
        echo "Gagal";
    }

}
//Delete data asset Radio==============================================================================================================================================
if(isset($_POST['deletebrngassetnetwork2']))
{
    $idb=$_POST['idb']; 
    $idn=$_POST['idn']; 
    $actual_location=$_POST['actual_location'];
    $asset_hana=$_POST['asset_hana']; 
    $actual_location=$_POST['actual_location'];
    $detail_location=$_POST['detail_location']; 
    $inventory_number=$_POST['inventory_number'];
    $foto_perangkat=$_POST['foto_perangkat']; 
    $sn=$_POST['sn'];   
    $ip=$_POST['ip_address'];
    $hostname=$_POST['hostname'];  
    
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
    
    $stockskarang1=$ambildatanya1['stock'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1+1;

    $qhapus=mysqli_query($koneksi,"delete from tb_asset_network where id='$idn' ") or die($conn->error);
    
    if($qhapus)
    {
        $cekstockskarang2=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
        $ambildatanya2=mysqli_fetch_array($cekstockskarang2);
        
        $stockskarang2=$ambildatanya2['device_active'];
        $tambahkanstocksekarangdengnqty2=$stockskarang2-1;
    
        $ipaddress=mysqli_query($koneksi,"update ip_address_0 set status_='0' where ip_address_0='$ip' ");
        $ipaddress2=mysqli_query($koneksi,"update ip_address_2 set status_='0' where ip_address_2='$ip' ");
        $ipaddress2=mysqli_query($koneksi,"update ip_address_17 set status_='0' where ip_address_17='$ip' ");
        $ipaddress2=mysqli_query($koneksi,"update ip_address_25 set status_='0' where ip_address_25='$ip' ");
        $ipaddress2=mysqli_query($koneksi,"update ip_address_40 set status_='0' where ip_address_40='$ip' ");
        $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1', device_active='$tambahkanstocksekarangdengnqty2' where id_brng='$idb' ");
        $addtomasuk=mysqli_query($koneksi,"insert into tb_history_data (nama_s, nik, section, type_unit, id_brng, sn_s, no_asset_r, kategori, lokasi_akhir, ip_address_h, hostname) values('$idb','-','-','-','$idb','$sn','$asset_hana','Network','$actual_location $detail_location','$ip','$hostname')");
        $add=mysqli_query($koneksi,"insert into tb_masuk (id_brng, no_po_m, no_asset_m, sn, ket_m, status_m, gambar) values('$idb','$inventory_number','$asset_hana','$sn','BEKAS $actual_location $detail_location','Bekas','$foto_perangkat')");
        
        header("location:network_actv.php?id=$idb");
    } else {
        echo "Gagal";
    }

}

//Delete data asset Radio==============================================================================================================================================
if(isset($_POST['deletebrngassetnetwork1']))
{
    $idb=$_POST['idb']; 
    $idn=$_POST['idn']; 
    $actual_location=$_POST['actual_location'];
    $asset_hana=$_POST['asset_hana']; 
    $actual_location=$_POST['actual_location'];
    $detail_location=$_POST['detail_location']; 
    $inventory_number=$_POST['inventory_number'];
    $foto_perangkat=$_POST['foto_perangkat']; 
    $sn=$_POST['sn'];   
    $ip=$_POST['ip_address'];
    $hostname=$_POST['hostname']; 
    
    $cekstockskarang1=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya1=mysqli_fetch_array($cekstockskarang1);
    
    $stockskarang1=$ambildatanya1['stock'];
    $tambahkanstocksekarangdengnqty1=$stockskarang1+1;

    $cekstockskarang2=mysqli_query($koneksi,"select * from stock where id_brng='$idb' ");
    $ambildatanya2=mysqli_fetch_array($cekstockskarang2);
    
    $stockskarang2=$ambildatanya2['device_active'];
    $tambahkanstocksekarangdengnqty2=$stockskarang2-1;
   
    $ipaddress=mysqli_query($koneksi,"update ip_address_0 set status_='0' where ip_address_0='$ip' ");
    $ipaddress2=mysqli_query($koneksi,"update ip_address_2 set status_='0' where ip_address_2='$ip' ");
    $ipaddress2=mysqli_query($koneksi,"update ip_address_17 set status_='0' where ip_address_17='$ip' ");
    $ipaddress2=mysqli_query($koneksi,"update ip_address_25 set status_='0' where ip_address_25='$ip' ");
    $ipaddress2=mysqli_query($koneksi,"update ip_address_40 set status_='0' where ip_address_40='$ip' ");
    $updatestockkeluar=mysqli_query($koneksi,"update stock set stock='$tambahkanstocksekarangdengnqty1', device_active='$tambahkanstocksekarangdengnqty2' where id_brng='$idb' ");
    $addtomasuk=mysqli_query($koneksi,"insert into tb_history_data (nama_s, nik, section, type_unit, id_brng, sn_s, no_asset_r, kategori, lokasi_akhir, ip_address_h, hostname) values('$idb','-','-','-','$idb','$sn','$asset_hana','Network','$actual_location $detail_location','$ip','$hostname')");
    $add=mysqli_query($koneksi,"insert into tb_masuk (id_brng, no_po_m, no_asset_m, sn, status_m, gambar) values('$idb','$inventory_number','$asset_hana','$sn','Bekas','$foto_perangkat')");
    $qhapus=mysqli_query($koneksi,"delete from tb_asset_network where id='$idn' ") or die($conn->error);
    
    if($qhapus)
    {
        header("location:lva_network.php?id=$idb");
    } else {
        echo "Gagal";
    }

}


//Delete data asset Radio==============================================================================================================================================
if(isset($_POST['deleteip']))
{   
    $ip=$_POST['ip'];
    
    $ipaddress=mysqli_query($koneksi,"update ip_address_0 set status_='0' where ip_address_0='$ip' ");
    $ipaddress2=mysqli_query($koneksi,"update ip_address_2 set status_='0' where ip_address_2='$ip' ");
    $ipaddress3=mysqli_query($koneksi,"update ip_address_17 set status_='0' where ip_address_17='$ip' ");
    
    if( $ipaddress&&$ipaddress2&&$ipaddress3)
    {
        header("location:ip_address.php");
    } else {
        echo "Gagal";
    }

}



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
        header("location:table.php?id=$idb");
    } else {
        echo "Gagal";
    }
} 

if(isset($_POST['devicerusakoperation']))
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
        header("location:table1.php?id=$idb");
    } else {
        echo "Gagal";
    }
} 

if(isset($_POST['devicerusakradio']))
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
        header("location:table2.php?id=$idb");
    } else {
        echo "Gagal";
    }
} 

//update form ip address==============================================================================================================================================
if(isset($_POST['update1']))
{
    $ip=$_POST['ip'];
    $ip1=$_POST['ip1'];  
    $id=$_POST['id']; 

    
    $ipaddress11=mysqli_query($koneksi,"update ip_address_0 set status_='1' where ip_address_0='$ip' ");
    $update=mysqli_query($koneksi,"update tb_asset_network set ip_address='$ip' where id='$id' ");
    $ipaddress12=mysqli_query($koneksi,"update ip_address_0 set status_='0' where ip_address_0='$ip1' ");
   
    if($update)
    {
        header("location:ip_management.php");
    } else {
        echo "Gagal";
    } 

}
//update form ip addressssa==============================================================================================================================================
if(isset($_POST['update3']))
{
    $ip=$_POST['ip'];
    $ip1=$_POST['ip1'];  
    $id=$_POST['id']; 

    
    $ipaddress11=mysqli_query($koneksi,"update ip_address_40 set status_='1' where ip_address_40='$ip' ");
    $update=mysqli_query($koneksi,"update tb_asset_network set ip_address='$ip' where id='$id' ");
    $ipaddress12=mysqli_query($koneksi,"update ip_address_0 set status_='0' where ip_address_0='$ip1' ");
   
    if($update)
    {
        header("location:ip_management.php");
    } else {
        echo "Gagal";
    } 

}
//update form ip address==============================================================================================================================================
if(isset($_POST['update2']))
{
    $ip=$_POST['ip'];
    $ip1=$_POST['ip1'];  
    $id=$_POST['id']; 
    $ket=$_POST['ket']; 

    $ipaddress11=mysqli_query($koneksi,"update ip_address_2 set status_='1' where ip_address_2='$ip' ");
    $update=mysqli_query($koneksi,"update tb_asset_network set ip_address='$ip', ket='$ket' where id='$id' ");
    $ipaddress12=mysqli_query($koneksi,"update ip_address_2 set status_='0' where ip_address_2='$ip1' ");
   
    if($update)
    {
        header("location:ip_appliance.php");
    } else {
        echo "Gagal";
    } 

}


?>