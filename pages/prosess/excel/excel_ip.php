<?php
include "../../koneksi.php";

header("Content-type:application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=IP 10.10.0.0/24.xls")

?>
 <table id="example2" class="table table-bordered table-hover ">
              <thead style=" background-color:#25253B; color:white;">
              <tr>
                 <th>#</th>
                 <th>Device Name</th>
                 <th>S/N</th>
                <th>#10.10.0.0/24</th>
                <th>HostName</th>
                <th>Lokasi</th>
                <th>Description</th>
              </tr>
              </thead>
              <?php
                  $query=mysqli_query($koneksi,"SELECT * FROM ip_address_0 s
                    left join tb_asset_network k on k.ip_address=s.ip_address_0 
                    left join stock g on g.id_brng=k.id_brng where s.status_='1' order by s.id_ip asc ");
                  $no=0;
                  $no++;
                    while($row=mysqli_fetch_array($query)){
                      $id_ip=$row['id_ip'];
                      $ip=$row['ip_address_0'];
                      $hostname=$row['hostname'];
                      $ket=$row['ket'];
     
              ?>
           
              <tr>
              <td width='5%'><?php echo $row['id_ip'] ?></td>
              <td><?php echo $row['nma_brng'] ?></td>
              <td><?php echo $row['sn'] ?></td>
                <td><?php echo $row['ip_address_0'] ?></td>
                <td ><?php echo $row['hostname'] ?> <?php echo $row['asset_description'] ?> </td>
                <td><?php echo $row['lokasi'] ?> <?php echo $row['actual_location'] ?> <?php echo $row['detail_location'] ?></td>
                <td><?php echo $row['ket'] ?></td>
              </tr>        
              <?php $no++; } ?>
              </tfoot> 
            </table>