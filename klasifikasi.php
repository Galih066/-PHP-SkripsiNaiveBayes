<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/klasifikasi.css">
	<title>Klasifikasi</title>
</head>
<body>
	<a href="index.php"><span>Kembali</span></a>
	<table>
		<caption>Kalsikfikasi Data Sampel Lahan</caption>
		<thead>
			<tr>
				<th>ID Lahan</th>
				<th>Nama Lahan</th>
				<th>Suhu</th>
				<th>Jenis Tanah</th>
				<th>Sinar Matahari</th>
				<th>Curah Hujan</th>
				<th>Likehood YA</th>
				<th>Likehood TIDAK</th>
				<th>Probabilitas YA</th>
				<th>Probabilitas TIDAK</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include ("koneksi.php");
				$showTable = $connect -> query("SELECT * FROM result_alt_lahan");
				while($tampilData = $showTable -> fetch_assoc())
				{
				?>
					<tr>
						<td><?= $tampilData["id"] ?></td>
						<td><?= $tampilData["nama_lahan"] ?></td>
						<td><?= $tampilData["suhu"] ?></td>
						<td><?= $tampilData["jenis_tanah"] ?></td>
						<td><?= $tampilData["sinar_matahari"] ?></td>
						<td><?= $tampilData["curah_hujan"] ?></td>
						<td><?= $tampilData["likehoodya_res"] ?></td>
						<td><?= $tampilData["likehoodtdk_res"] ?></td>
						<td><strong style="color: #00ff00;"><?= $tampilData["prob_ya"] ?></strong></td>
						<td><strong style="color: #ff0000;"><?= $tampilData["prob_tdk"] ?></strong></td>
						<td><strong><?= $tampilData["status"] ?></strong></td>
					</tr>
				<?php
				}
			?>
		</tbody>
	</table>

</body>
</html>