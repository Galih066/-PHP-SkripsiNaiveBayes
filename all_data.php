<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/all_data.css">
	<title>Data</title>
</head>
<body>

<h1>Data Naive Bayes</h1>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'data_lahan')">Data Lahan</button>
  <button class="tablinks" onclick="openCity(event, 'data_suhu')">Data Suhu</button>
  <button class="tablinks" onclick="openCity(event, 'data_jns_tanah')">Data Jenis Tanah</button>
  <button class="tablinks" onclick="openCity(event, 'data_intsts_chy')">Data Ketersediaan Sinar Matahari</button>
  <button class="tablinks" onclick="openCity(event, 'data_crh_hujan')">Data Curah Hujan</button>
</div>

<div id="data_lahan" class="tabcontent">
	<table>
		<caption>Table Data Lahan</caption>
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
					</tr>
				<?php
				}
			?>
		</tbody>
	</table>
</div>

<div id="data_suhu" class="tabcontent">
  	<table>
		<caption>Table Probabilitas Suhu</caption>
		<thead>
			<tr>
				<th>No</th>
				<th>Suhu</th>
				<th>Jumlah Kejadian Bisa</th>
				<th>Jumlah Kejadian T.Bisa</th>
				<th>Probabilitas Bisa</th>
				<th>Probabilitas T.Bisa</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include ("koneksi.php");
				$showTable = $connect -> query("SELECT * FROM probabilitas_kriteria_suhu");
				while($tampilData = $showTable -> fetch_assoc())
				{
				?>
					<tr>
						<td><?= $tampilData["id"] ?></td>
						<td><?= $tampilData["suhu"] ?>&deg;C</td>
						<td><?= $tampilData["jumlah_kejadian_bisa"] ?></td>
						<td><?= $tampilData["jumlah_kejadian_tdk_bisa"] ?></td>
						<td><?= $tampilData["probabilitas_bisa"] ?></td>
						<td><?= $tampilData["probabilitas_tdk_bisa"] ?></td>
					</tr>
				<?php
				}
			?>
		</tbody>
	</table>
</div>

<div id="data_jns_tanah" class="tabcontent">
  	<table>
		<caption>Table Probabilitas Jenis Tanah</caption>
		<thead>
			<tr>
				<th>No</th>
				<th>Jenis Tanah</th>
				<th>Jumlah Kejadian Bisa</th>
				<th>Jumlah Kejadian T.Bisa</th>
				<th>Probabilitas Bisa</th>
				<th>Probabilitas T.Bisa</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include ("koneksi.php");
				$showTable = $connect -> query("SELECT * FROM probabilitas_kriteria_jenis_tanah");
				while($tampilData = $showTable -> fetch_assoc())
				{
				?>
					<tr>
						<td><?= $tampilData["id"] ?></td>
						<td><?= $tampilData["jenis_tanah"] ?></td>
						<td><?= $tampilData["jumlah_kejadian_bisa"] ?></td>
						<td><?= $tampilData["jumlah_kejadian_tdk_bisa"] ?></td>
						<td><?= $tampilData["probabilitas_bisa"] ?></td>
						<td><?= $tampilData["probabilitas_tdk_bisa"] ?></td>
					</tr>
				<?php
				}
			?>
		</tbody>
	</table>
</div>

<div id="data_intsts_chy" class="tabcontent">
  	<table>
		<caption>Table Probabilitas Intensitas Cahaya</caption>
		<thead>
			<tr>
				<th>No</th>
				<th>Intensitas Cahaya</th>
				<th>Jumlah Kejadian Bisa</th>
				<th>Jumlah Kejadian T.Bisa</th>
				<th>Probabilitas Bisa</th>
				<th>Probabilitas T.Bisa</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include ("koneksi.php");
				$showTable = $connect -> query("SELECT * FROM probabilitas_kriteria_intensitas_cahaya");
				while($tampilData = $showTable -> fetch_assoc())
				{
				?>
					<tr>
						<td><?= $tampilData["id"] ?></td>
						<td><?= $tampilData["intensitas_cahaya"] ?></td>
						<td><?= $tampilData["jumlah_kejadian_bisa"] ?></td>
						<td><?= $tampilData["jumlah_kejadian_tdk_bisa"] ?></td>
						<td><?= $tampilData["probabilitas_bisa"] ?></td>
						<td><?= $tampilData["probabilitas_tdk_bisa"] ?></td>
					</tr>
				<?php
				}
			?>
		</tbody>
	</table>
</div>

<div id="data_crh_hujan" class="tabcontent">
	<table>
		<caption>Table Probabilitas Curah Hujan</caption>
		<thead>
			<tr>
				<th>No</th>
				<th>Curah Hujan</th>
				<th>Jumlah Kejadian Bisa</th>
				<th>Jumlah Kejadian T.Bisa</th>
				<th>Probabilitas Bisa</th>
				<th>Probabilitas T.Bisa</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include ("koneksi.php");
				$showTable = $connect -> query("SELECT * FROM probabilitas_kriteria_curah_hujan");
				while($tampilData = $showTable -> fetch_assoc())
				{
				?>
					<tr>
						<td><?= $tampilData["id"] ?></td>
						<td><?= $tampilData["curah_hujan"] ?></td>
						<td><?= $tampilData["jumlah_kejadian_bisa"] ?></td>
						<td><?= $tampilData["jumlah_kejadian_tdk_bisa"] ?></td>
						<td><?= $tampilData["probabilitas_bisa"] ?></td>
						<td><?= $tampilData["probabilitas_tdk_bisa"] ?></td>
					</tr>
				<?php
				}
			?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
</script>

</body>
</html>