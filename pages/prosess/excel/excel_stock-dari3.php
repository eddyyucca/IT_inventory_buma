<?php
include "../../koneksi.php";

header("Content-type:application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Consumable kurang dari 10.xls")

?>

<table id="example1" class="table table-bordered table-striped">
    <thead style="background-color:#25253B; color: white;">
        <tr >
           <th>No</th>
           <th>Device Name</th> 
           <th>Qtt</th> 
        </tr> 
        </thead >
             <?php
              $query3=mysqli_query($koneksi, "SELECT * FROM stock where kategory_b in ('PC','UPS','Laptop','Operation') and asset in('Consumable') and stock <10 order by stock ASC");
              $no=0;
              $no++;
              while($row3=mysqli_fetch_array($query3)){
             ?>
        <tr >
             <td width='5%'><?php echo $no; ?></td>
             <td><?php echo $row3['nma_brng'] ?></td>
             <td><?php echo $row3['stock'] ?></td>
        </tr>
            <?php $no++; } ?>
</table>