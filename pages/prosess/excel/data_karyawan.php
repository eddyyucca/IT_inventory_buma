<?php
include "../../koneksi.php";

header("Content-type:application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Karyawan.xls")

?>
 <table id="example2" class="table table-bordered table-striped">
                <thead style="background-color:#25253B; color: white;">
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Gender</th>
                  <th>Agama</th>
                  <th>Section</th>
                  <th>Level</th>
                  <th>jabatan</th>
                  <th>Lokasi Kerja</th>
                  <th>No Telp</th>
                  <th>Tgl Lahir</th>
                  <th>Tgl Masuk BUMA</th>
                  <th>Aksi</th>
                 
                </tr>
                </thead >
                   <?php
                    $query=mysqli_query($koneksi, "SELECT * FROM tb_karyawan  ");
                    $no=0;
                    $no++;
                      while($row=mysqli_fetch_array($query)){
                        $id_kar=$row['id_kar'];
                      
                ?>
                <tr> 
                  <td width='5%'><?php echo $no; ?></td>
                  <td><?php echo $row['nik'] ?></td>
                  <td><?php echo $row['nama'] ?></td>
                  <td><?php echo $row['gender'] ?></td>
                  <td><?php echo $row['agama'] ?></td>
                  <td><?php echo $row['section'] ?></td>
                  <td><?php echo $row['level'] ?></td>
                  <td><?php echo $row['jabatan'] ?></td>
                  <td><?php echo $row['lokasi_kerja'] ?></td>
                  <td><?php echo $row['no_telp'] ?></td>
                  <td><?php echo $row['tgl_lahir'] ?></td>
                  <td><?php echo $row['tgl_masuk_buma'] ?></td>
                </tr>
                <?php $no++; } ?>
              </table>