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
                $nama_brng    = $data->val($i, 1);
                $type         = $data->val($i, 2);
                $no_po        = $data->val($i, 3);
                $asset        = $data->val($i, 4);
                $deskripsi    = $data->val($i, 5);
                $stock        = $data->val($i, 6);
                $image    	  = $data->val($i, 7);
                $id_lokasi    = $data->val($i, 8);
              
               

                $tgl = date("Y-m-d h:i:sa");
                if($nama_brng != "" && $type != "" && $no_po != "" && $asset != "" && $deskripsi != "" && $stock != ""  && $image != "" && $id_lokasi != "" )
                {
                    // input data ke database (table barang)
                    mysqli_query($koneksi,"INSERT into stock values('','$nama_brng','$type ','$no_po','$asset','$deskripsi','$stock',' $image','$id_lokasi','$tgl')");
                    $berhasil++;
                }
            }

            // hapus kembali file .xls yang di upload tadi
            unlink($_FILES['fileexcel']['name']);
            
            // alihkan halaman ke index.php
            header("location:../../tables/data_table.php");