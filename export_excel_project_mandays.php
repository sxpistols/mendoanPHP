	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Daftar Mandays Project.xls");
	session_start();
	$tahunbaca = $_SESSION['Tahunkirim'];
	?>

	<center>
		<h1>Daftar Mandays Project Tahun <?php echo $tahunbaca ?></h1>
	</center>

	<table border="1">
		<tr>
			<th>NAMA PROJECT</th>
            <th>STATUS</th>
            <th>TYPE</th>
            <th>PM</th>
            <th>TARGET</th>
            <th>USED</th>
            <th>NILAI RUPIAH</th>
		</tr>
		<?php
    $url = "http://192.168.3.250:9966/api/trello/projectmandays?tahun=";
    $lurl = $tahunbaca ;
    $sumber2 = "$url$lurl";
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $sumber2);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch);      
    $result2 = json_decode($output, TRUE);
	 foreach ($result2['Mandays'] as $Sum2){
		?>
		<tr>
			<td><?php echo $Sum2['project']?></td>
            <td><?php echo $Sum2['status']?></td>
            <td><?php echo $Sum2['project_type']?></td>
            <td><?php echo $Sum2['fullname']?></td>
            <td><?php echo $Sum2['mandays']?></td>
            <td><?php echo $Sum2['jumlah']?></td>
            <td><?php echo $Sum2['nilai_project']?></td>
		</tr>
<?php }  ?>
	</table>