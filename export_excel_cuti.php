<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Karyawan Cuti.xls");
	?>
<?php 
$sumber2 = 'http://192.168.3.250:9966/api/karyawan/listcuti';
$konten2 = file_get_contents($sumber2);
$konten2=utf8_encode($konten2);
$result2=json_decode($konten2,true);
$Sum2=$result2['Cuti'];
 ?>
<h3 style="text-align: center;">Data Karyawan Cuti</h3>
<table id="example" class="table" style="width:100%">
    <thead>
        <tr>
            <th class="has-text-grey">NO</th>
            <th class="has-text-grey">NAMA KARYAWAN</th>
            <th class="has-text-grey">TANGGAL CUTI</th>
            <th class="has-text-grey">KETERANGAN</th>
            <th class="has-text-grey">EDIT</th>
        </tr>
    </thead>
    <tbody>
        <?php 
     $no = 1;
      for($a = 0; $a <count ($Sum2); $a++){
      ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $Sum2[$a]['fullname']?>
            <td><?php echo $Sum2[$a]['tanggal_cuti']?></td>
            <td><?php echo $Sum2[$a]['keterangan']?></td>
            <td><a href=""><?php echo "delete"?>

        </tr>
        <?php
    $no++; } ?>
    </tbody>
</table>