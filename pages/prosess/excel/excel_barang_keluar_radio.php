<?php
include "../../koneksi.php";

header("Content-type:application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Comsumable Radio.xls")

?>
<table id="example1" class="table table-bordered table-striped">
                <thead style="background-color:#7c84c5;">
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>NO PO</th>
                  <th>Stock</th>
                  <th>Keterangan</th>
                  <th>Tgl Update</th>
              
                </tr> 
                </thead >
                              <?php
                     $query=mysqli_query($koneksi, "SELECT *
                      FROM tb_keluar k
                    join stock s on s.id_brng=k.id_brng_k where kategory_b in ('Radio Rig','Radio') and asset='Consumable'
                    order by id_keluar desc ");
                     $no=0;
                     $no++;
                       while($row=mysqli_fetch_array($query)){
                ?>
             
                <tr>
                  <td width='5%'><?php echo $no; ?></td>
                  <td><?php echo $row['nma_brng'] ?></td>
                  <td><?php echo $row['no_po_k'] ?></td>
                  <td><?php echo $row['qty_k'] ?></td>
              
                  <td><?php echo $row['deskripsi1'] ?></td>
                  <td><?php echo $row['tanggal_k'] ?></td>
                </tr>
             
                <?php $no++; } ?>
</table>