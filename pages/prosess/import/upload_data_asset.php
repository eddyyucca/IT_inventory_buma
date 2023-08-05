<?php 

            // menghubungkan dengan koneksi
            include "../../koneksi.php";
            
            // menghubungkan dengan library excel reader
            include "excel_reader.php";      
            
            // upload file xls
            $target = basename($_FILES['fileexcel']['name']) ;
            move_uploaded_file($_FILES['fileexcel']['tmp_name'], $target);
            
            // beri permisi agar file xls dapat di baca
            chmod($_FILES['fileexcel']['name'],0777);
            
            // mengambil isi file xls
            $data = new Spreadsheet_Excel_Reader($_FILES['fileexcel']['name'],false);
            // menghitung jumlah baris data yang ada
            $jumlah_baris = $data->rowcount($sheet_index=0);
            
            // jumlah default data yang berhasil di import
            $berhasil = 0;
            for ($i=2; $i<=$jumlah_baris; $i++){
            
                // menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
                $nama_pic     	= $data->val($i, 1);
                $nik            = $data->val($i, 2);
                $section    	= $data->val($i, 3);
                $id_barang      = $data->val($i, 4);
                $no_po_a      	= $data->val($i, 5);
                $no_asset       = $data->val($i, 6);
                $sn         	= $data->val($i, 7);
                $lokasi         = $data->val($i, 8);
                $tanggal         = $data->val($i, 9);
               

                $tgl = date("Y-m-d h:i:sa");
                if($nama_pic != "" && $nik != "" && $section != "" && $id_barang != "" && $no_po_a != "" & $no_asset != "" && $sn != "" && $lokasi != "" && $tanggal != "")
                {
                    // input data ke database (table barang)
                    mysqli_query($koneksi,"INSERT into tb_asset values('','$nama_pic','$nik','$section','$id_barang','$no_po_a','$no_asset','$sn','$lokasi',' $tanggal',' $tanggal')");
                    $berhasil++;
                }
            }

            // hapus kembali file .xls yang di upload tadi
            unlink($_FILES['fileexcel']['name']);
            
            // alihkan halaman ke index.php
            header("location:../../tables/data_asset.php"); 