<?php
include "../../koneksi.php";

header("Content-type:application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Operation.xls")

?>
<table id="example1" class="table table-bordered table-striped">
                <thead style="background-color:#7c84c5;">
                <tr>
                  <th>No</th>
           
                  <th>Nama Barang</th>
                  <th>S/N</th>
                  <th>NO PO</th>
                  <th>NO Asset</th>
                  <th>Lokasi</th>
                  <th>Keterangan</th>
                  <th>Tgl Update</th>
                  <th>Aksi</th>
                </tr>
                </thead >
                              <?php
                    $query=mysqli_query($koneksi, "SELECT *
                    FROM tb_masuk k
                    left join stock s on s.id_brng=k.id_brng
                    left join tb_lokasi l on l.id_lokasi=s.id_lokasi where kategory_b in ('PC','UPS','Laptop') order by id_masuk desc  ");
                    $no=0;
                    $no++;
                      while($row=mysqli_fetch_array($query)){
                ?>
             
                <tr>
                  <td width='5%'><?php echo $no; ?></td>
                  
                  <td><?php echo $row['nma_brng'] ?></td>
                  <td><?php echo $row['sn'] ?></td>
                  <td><?php echo $row['no_po_m'] ?></td>
                  <td><?php echo $row['no_asset_m'] ?></td>
                  <td> <?php echo $row['nama_lokasi'] ?></td>
                  <td> <?php echo $row['ket_m'] ?></td>
                  <td><?php echo $row['tanggal'] ?></td>
                </tr>
             
                <?php $no++; } ?>
</table>