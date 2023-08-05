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
                $id_brng     	= $data->val($i, 1);
                $no_po_m        = $data->val($i, 2);
                $no_asset_m  	= $data->val($i, 3);
                $ket_m          = $data->val($i, 4);
                $qty      		= $data->val($i, 5);

                $tgl = date("Y-m-d h:i:sa");
                if($id_brng != "" && $no_po_m != "" && $no_asset_m != "" && $ket_m != "" && $qty != "")
                {
                    // input data ke database (table barang)
                    mysqli_query($koneksi,"INSERT into tb_masuk values('','$id_brng','$no_po_m','$no_asset_m','$ket_m','$tgl','$qty')");
                    $berhasil++;
                }
            }

            // hapus kembali file .xls yang di upload tadi
            unlink($_FILES['fileexcel']['name']);
            
            // alihkan halaman ke index.php
            header("location:../../tables/barang_masuk.php");