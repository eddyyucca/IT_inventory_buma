<?php
include "../../koneksi.php";

header("Content-type:application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Ip Address Vlan-40.xls")

?>
 <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color:#7c84c5;">
                <tr>
                 <th>#</th>
                 <th>Device Name</th>
                 <th>S/N</th>
                <th>#10.10.40.0/24</th>
                <th>HostName</th>
                <th>Lokasi</th>
                <th>Description</th>
              </tr> 
              </thead>
              <?php
                  $query=mysqli_query($koneksi,"SELECT * FROM ip_address_40 s
                    left join tb_asset_network k on k.ip_address=s.ip_address_40 
                    left join stock g on g.id_brng=k.id_brng
                    left join tb_lokasi2 l on l.id_lok2=k.id_lok where s.status_='1' order by s.id_ip asc ");
                  $no=0;
                  $no++;
                    while($row=mysqli_fetch_array($query)){
                      $id=$row['id'];
                      $id_ip=$row['id_ip'];
                      $ip=$row['ip_address_40'];
                      $ip1=$row['ip_address_40'];
                      $hostname=$row['hostname1'];
                      $ket=$row['ket'];
              ?>
              <tr>
              <td width='5%'><?php echo $row['id_ip'] ?></td>
              <td><?php echo $row['nma_brng'] ?><?php echo $row['device_name'] ?></td>
              <td><?php echo $row['sn'] ?><?php echo $row['sn1'] ?></td>
                <td><a href="#" class="small-box-footer" data-toggle="modal" data-target="#ip_address<?=$id_ip;?>"><?php echo $row['ip_address_40'] ?></a></td>
                <td ><?php echo $row['hostname1'] ?><?php echo $row['asset_description'] ?> </td>
                <td><?php echo $row['lokasi'] ?> <?php echo $row['detail_location'] ?></td>
                <td><?php echo $row['ket'] ?><?php echo $row['ket1'] ?></td>
              </tr>`
                <?php $no++; } ?>
              </table>