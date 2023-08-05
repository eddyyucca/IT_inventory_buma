<?php
include "../../koneksi.php";

header("Content-type:application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Stock_IT.xls")

?>
<table id="example1" class="table table-bordered table-striped">
                <thead style="background-color:#7c84c5;">
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Type</th>
                  <th>NO PO</th>
                  <th>Status</th>
                  <th>Stock</th>
                  <th>Lokasi</th>
                  <th>Keterangan</th>
                  <th>Tgl Update</th>
                  <th>Cek Out</th>
                  <th>Aksi</th>
                 
                </tr>
                </thead >
                              <?php
                    $query=mysqli_query($koneksi, "SELECT * FROM stock s 
                    left join tb_lokasi l on l.id_lokasi=s.id_lokasi order by id_brng DESC  ");
                    $no=0;
                    $no++;
                      while($row=mysqli_fetch_array($query)){
                ?>
             
                <tr>
                  <td width='5%'><?php echo $no; ?></td>
                  <td><?php echo $row['nma_brng'] ?></td>
                  <td><?php echo $row['kategory_b'] ?></td>
                  <td><?php echo $row['no_po'] ?></td>
                  <td><?php echo $row['asset'] ?></td>
                  <td><b><?php echo $row['stock'] ?></b></td>
                  <td> <?php echo $row['nama_lokasi'] ?></td>
                  <td> <?php echo $row['deskripsi'] ?></td>
                  <td><?php echo $row['tgl_update'] ?></td>
                </tr>
             
                <?php $no++; } ?>
</table>