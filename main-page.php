<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/main-page.css">
	<title>Main Page</title>
	<script type="text/javascript">
	function delete_id(id)
	{
		if(confirm('Sure To Remove This Record ?'))
	 	{
	  		window.location.href='delete_process.php?delete_id='+id;
	  		return true;
	 	}
	}
	</script>
</head>
<body>
	
	<?php

	if(isset($_COOKIE["ID_pengguna"]))
	{
		include("koneksi.php");
		$getUserData = $connect -> query("SELECT * FROM pengguna WHERE id = '".$_COOKIE["ID_pengguna"]."'") -> fetch_assoc();
	}

	?>

	<h1>Hello, <strong><?= $getUserData["nama_pengguna"] ?></strong></h1>
	<strong><a href="logout.php" class="log_out_pos">Log Out</a></strong>

	<div class="tab">
		<button class="tablinks" onclick="openCity(event, 'data_lahan')" id="defaultOpen">Data Lahan</button>
		<button class="tablinks" onclick="openCity(event, 'data_prob_suhu')">Data Probabilitas Suhu</button>
		<button class="tablinks" onclick="openCity(event, 'data_prob_jns_tanah')">Data Probabilitas Jenis Tanah</button>
		<button class="tablinks" onclick="openCity(event, 'data_prob_crh_hujan')">Data Probabilitas Curah Hujan</button>
		<button class="tablinks" onclick="openCity(event, 'data_prob_snr_matahari')">Probabilitas Sinar Matahari</button>
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
				<th>Action</th>
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
						<td><button onclick="delete_id(<?= $tampilData["id"] ?>)" class="remove" style="font-size: 10px; background: #ff0000;">Delete</button></td>
					</tr>
				<?php
				}
			?>
		</tbody>
	</table>
	</div>

	<div id="data_prob_suhu" class="tabcontent">
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
				<th>Action</th>
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
						<td><?= $tampilData["suhu"] ?></td>
						<td><?= $tampilData["jumlah_kejadian_bisa"] ?></td>
						<td><?= $tampilData["jumlah_kejadian_tdk_bisa"] ?></td>
						<td><?= $tampilData["probabilitas_bisa"] ?></td>
						<td><?= $tampilData["probabilitas_tdk_bisa"] ?></td>
						<td>
							<a href="update-tb-suhu.php?id=<?= $tampilData["id"] ?>"><button class="btn_dsgn">Edit</button></a>
						</td>
					</tr>
				<?php
				}
			?>
		</tbody>
	</table> 
	</div>

	<div id="data_prob_jns_tanah" class="tabcontent">
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
				<th>Action</th>
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
						<td>
							<a href="update-tb-jns-tnh.php?id=<?= $tampilData["id"] ?>"><button class="btn_dsgn">Edit</button></a>
						</td>
					</tr>
				<?php
				}
			?>
		</tbody>
	</table>
	</div>

	<div id="data_prob_crh_hujan" class="tabcontent">
		<table>
		<caption>Table Probabilitas Curah Hujan</caption>
		<thead>
			<tr>
				<th align="center">No</th>
				<th>Curah Hujan</th>
				<th>Jumlah Kejadian Bisa</th>
				<th>Jumlah Kejadian T.Bisa</th>
				<th>Probabilitas Bisa</th>
				<th>Probabilitas T.Bisa</th>
				<th>Action</th>
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
						<td>
							<a href="update-tb-crh-hjn.php?id=<?= $tampilData["id"] ?>"><button class="btn_dsgn">Edit</button></a>
						</td>
					</tr>
				<?php
				}
			?>
		</tbody>
	</table>
	</div>

	<div id="data_prob_snr_matahari" class="tabcontent">
		<table>
		<caption>Table Probabilitas Sinar Matahari</caption>
		<thead>
			<tr>
				<th>No</th>
				<th>Sinar Matahari</th>
				<th>Jumlah Kejadian Bisa</th>
				<th>Jumlah Kejadian T.Bisa</th>
				<th>Probabilitas Bisa</th>
				<th>Probabilitas T.Bisa</th>
				<th>Action</th>
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
						<td>
							<a href="update-tb-intnsts-chy.php?id=<?= $tampilData["id"] ?>"><button class="btn_dsgn">Edit</button></a>
						</td>
					</tr>
				<?php
				}
			?>
		</tbody>
	</table>
	</div>

<script>
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

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</body>
</html>