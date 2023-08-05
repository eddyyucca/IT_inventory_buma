<?php
include "../../koneksi.php";

header("Content-type:application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=data_asset_IT.xls")

?>
 <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color:#7c84c5;">
                <tr>
                  <th>No</th>
                  <th>Nama PIC</th>
                  <th>NIK</th>
                  <th>Section</th>
                  <th>Nama Barang</th>
                  <th>No PO</th>
                  <th>No Asset</th>
                  <th>S/N</th>
                  <th>Kategory</th>
                  <th>Lokasi</th>
                  <th>Tanggal</th>
              
                </tr>
                </thead >
                 <?php
                    $query=mysqli_query($koneksi, "SELECT *
                    FROM tb_asset a
                    left join stock s on s.id_brng=a.id_brng
                    order by id desc  ");
                    $no=0;
                    $no++;
                      while($row=mysqli_fetch_array($query)){
                        $ida=$row['id'];
      
                ?>
             
                <tr>
                  <td width='5%'><?php echo $no; ?></td>
                  <td><?php echo $row['nama_pic'] ?></td>
                  <td><?php echo $row['nik'] ?></td>
                  <td><?php echo $row['section'] ?></td>
                  <td><?php echo $row['nma_brng'] ?></td>
                  <td><?php echo $row['no_po_a'] ?></td>
                  <td><?php echo $row['no_asset'] ?></td>
                  <td><?php echo $row['sn'] ?></td>
                  <td><?php echo $row['kategory_b'] ?></td>
                  <td><?php echo $row['lokasi'] ?></td>
                  <td><?php echo $row['tanggal1'] ?></td>
                </tr>

                <?php $no++; } ?>
              </table>