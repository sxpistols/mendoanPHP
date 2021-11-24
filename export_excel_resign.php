<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Karyawan Resign.xls");
	?>
<?php 
$sumber2 = 'http://192.168.3.250:9966/api/karyawanresign/list?user_role=2';
$konten2 = file_get_contents($sumber2);
$konten2=utf8_encode($konten2);
$result2=json_decode($konten2,true);
$Sum2=$result2['karyawan'];
 ?>
<h3 style="text-align: center;">Data Karyawan Resign</h3>
<table id="example" class="table" style="width:100%">
    <thead>
        <tr>
            <th class="has-text-grey">NO</th>
            <th class="has-text-grey">NAMA KARYAWAN</th>
            <th class="has-text-grey">POSISI</th>
            <th class="has-text-grey">DIVISI</th>
        </tr>
    </thead>
    <tbody>
        <?php 
     $no = 1;
      for($a = 0; $a <count ($Sum2); $a++){
      ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><a href="detail_karyawan.php?user_id=<?=$Sum2[$a]['user_id']?>"><?php echo $Sum2[$a]['fullname']?>
            </td>
            <td><?php echo $Sum2[$a]['posisi']?></td>
            <td><?php echo $Sum2[$a]['divisi']?></td>
        </tr>
        <?php
    $no++; } ?>
    </tbody>
</table>