<!DOCTYPE html>
<html>
<head>
	<title>Daftar Mandays Project</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Pegawai.xls");
	?>

	<center>
		<h1>Daftar Mandays Project</h1>
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
		// koneksi database
		$koneksi = mysqli_connect("localhost","root","","pegawai");

		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select * from data_pegawai");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['nama']; ?></td>
			<td><?php echo $d['alamat']; ?></td>
			<td><?php echo $d['telepon']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>