<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Perhitungan</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/select-krit.css">

	<!-- UIkit CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.22/css/uikit.min.css" />

	<!-- UIkit JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.22/js/uikit.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.22/js/uikit-icons.min.js"></script>
</head>
<body>

	<!-- <a href="index.php"><img src="img/home.png"></a> -->
	<div class="titlee">Input Data Lahan Anda</div>

	<?php
		include("koneksi.php");
		$getSuhuDatavalue  = $connect -> query("SELECT * FROM probabilitas_kriteria_suhu WHERE id = 1") -> fetch_assoc();
		$getSuhuDatavalue2 = $connect -> query("SELECT * FROM probabilitas_kriteria_suhu WHERE id = 2") -> fetch_assoc();
		$getSuhuDatavalue3 = $connect -> query("SELECT * FROM probabilitas_kriteria_suhu WHERE id = 3") -> fetch_assoc();
		$getSuhuDatavaluetdk = $connect -> query("SELECT * FROM probabilitas_kriteria_suhu WHERE id = 1") -> fetch_assoc();
		$getSuhuDatavaluetdk2 = $connect -> query("SELECT * FROM probabilitas_kriteria_suhu WHERE id = 2") -> fetch_assoc();
		$getSuhuDatavaluetdk3 = $connect -> query("SELECT * FROM probabilitas_kriteria_suhu WHERE id = 3") -> fetch_assoc();
		$getJenisTanahDataValue = $connect -> query("SELECT * FROM probabilitas_kriteria_jenis_tanah WHERE id = 1") -> fetch_assoc();
		$getJenisTanahDataValue2 = $connect -> query("SELECT * FROM probabilitas_kriteria_jenis_tanah WHERE id = 2") -> fetch_assoc();
		$getJenisTanahDataValue3 = $connect -> query("SELECT * FROM probabilitas_kriteria_jenis_tanah WHERE id = 3") -> fetch_assoc();
		$getJenisTanahDataValueTdk = $connect -> query("SELECT * FROM probabilitas_kriteria_jenis_tanah WHERE id = 1") -> fetch_assoc();
		$getJenisTanahDataValueTdk2 = $connect -> query("SELECT * FROM probabilitas_kriteria_jenis_tanah WHERE id = 2") -> fetch_assoc();
		$getJenisTanahDataValueTdk3 = $connect -> query("SELECT * FROM probabilitas_kriteria_jenis_tanah WHERE id = 3") -> fetch_assoc();
		$getIntCahayaDataValue = $connect -> query("SELECT * FROM probabilitas_kriteria_intensitas_cahaya WHERE id = 1") -> fetch_assoc();
		$getIntCahayaDataValue2 = $connect -> query("SELECT * FROM probabilitas_kriteria_intensitas_cahaya WHERE id = 2") -> fetch_assoc();
		$getIntCahayaDataValuetdk = $connect -> query("SELECT * FROM probabilitas_kriteria_intensitas_cahaya WHERE id = 1") -> fetch_assoc();
		$getIntCahayaDataValuetdk2 = $connect -> query("SELECT * FROM probabilitas_kriteria_intensitas_cahaya WHERE id = 2") -> fetch_assoc();
		$getCrhHujanDataValue = $connect -> query("SELECT * FROM probabilitas_kriteria_curah_hujan WHERE id = 1") -> fetch_assoc();
		$getCrhHujanDataValue2 = $connect -> query("SELECT * FROM probabilitas_kriteria_curah_hujan WHERE id = 2") -> fetch_assoc();
		$getCrhHujanDataValue3 = $connect -> query("SELECT * FROM probabilitas_kriteria_curah_hujan WHERE id = 3") -> fetch_assoc();
		$getCrhHujanDataValuetdk = $connect -> query("SELECT * FROM probabilitas_kriteria_curah_hujan WHERE id = 1") -> fetch_assoc();
		$getCrhHujanDataValuetdk2 = $connect -> query("SELECT * FROM probabilitas_kriteria_curah_hujan WHERE id = 2") -> fetch_assoc();
		$getCrhHujanDataValuetdk3 = $connect -> query("SELECT * FROM probabilitas_kriteria_curah_hujan WHERE id = 3") -> fetch_assoc();
	?>

	<form action="naive-result.php" method="post">

		<strong style="margin-left: 8%; font-size: 20px">Nama Lahan</strong> <input class="input-txt" type="text" name="nama_lahan"><br>

		<div style="margin-left: 5%;" class="ui-grid-divider uk-child-width-expand@s" uk-grid>

			<div>

				<h4>Temperatur/Suhu</h4>

				<label><input value="<?= $getSuhuDatavalue["probabilitas_bisa"] ?>" class="uk-radio" onclick="check()" type="radio" name="suhu"> Suhu < 16°C</label>
				<br>
				<label><input value="<?= $getSuhuDatavalue2["probabilitas_bisa"] ?>" class="uk-radio" onclick="check2()" type="radio" name="suhu"> Suhu 20-26°C</label>
				<br>
				<label><input value="<?= $getSuhuDatavalue3["probabilitas_bisa"] ?>" class="uk-radio" onclick="check3()" type="radio" name="suhu"> Suhu > 32°C</label>
				
			</div>

			<div>

				<h4>Jenis Tanah</h4>

				<label><input value="<?= $getJenisTanahDataValue["probabilitas_bisa"] ?>" class="uk-radio" onclick="check4()" type="radio" name="jenis_tanah"> Tanah Humus</label>
				<br>
				<label><input value="<?= $getJenisTanahDataValue2["probabilitas_bisa"] ?>" class="uk-radio" onclick="check5()" type="radio" name="jenis_tanah"> Tanah Laterit</label>
				<br>
				<label><input value="<?= $getJenisTanahDataValue3["probabilitas_bisa"] ?>" class="uk-radio" onclick="check6()" type="radio" name="jenis_tanah"> Tanah Padas</label>
				
			</div>

			<div>

				<h4>Sinar Matahari</h4>

				<label><input value="<?= $getIntCahayaDataValue["probabilitas_bisa"] ?>" class="uk-radio" onclick="check8()" type="radio" name="intensitas_cahaya"> < 20000 lx</label>
				<br>
				<label><input value="<?= $getIntCahayaDataValue2["probabilitas_bisa"] ?>" class="uk-radio" onclick="check7()" type="radio" name="intensitas_cahaya"> 20000-30000 lx</label>
				<br>
				
			</div>

			<div>

				<h4>Curah Hujan</h4>

				<label><input value="<?= $getCrhHujanDataValue["probabilitas_bisa"] ?>" class="uk-radio" onclick="check9()" type="radio" name="curah_hujan"> < 15 mm/hari</label>
				<br>
				<label><input value="<?= $getCrhHujanDataValue2["probabilitas_bisa"] ?>" class="uk-radio" onclick="check10()" type="radio" name="curah_hujan"> 15 – 30 mm/hari</label>
				<br>
				<label><input value="<?= $getCrhHujanDataValue3["probabilitas_bisa"] ?>" class="uk-radio" onclick="check11()" type="radio" name="curah_hujan"> > 30 mm/hari</label>
				
			</div>
			
		</div>

		<center>
			<button style="margin: 5%;" onclick="showRes()">Submit</button>
		</center>
		

			<!-- <strong>Land Name</strong> <input class="input-txt" type="text" name="nama_lahan"><br>
			<div style="margin-bottom: 10px;"><strong>Temperature</strong></div>
			<label class="container"><div>< 16°C</div>
			  	<input onclick="check()" type="radio" name="suhu" value="<?= $getSuhuDatavalue["probabilitas_bisa"] ?>">
			  	<span class="checkmark"></span>
			</label>
			<label class="container">20-26°C
			  	<input onclick="check2()" type="radio" name="suhu" value="<?= $getSuhuDatavalue2["probabilitas_bisa"] ?>">
			  	<span class="checkmark"></span>
			</label>
			<label class="container"> > 32°C
			  	<input onclick="check3()" type="radio" name="suhu" value="<?= $getSuhuDatavalue3["probabilitas_bisa"] ?>">
			  	<span class="checkmark"></span>
			</label>
			<div style="margin-bottom: 10px;"><strong>Jenis Tanah</strong></div>
			<label class="container">Tanah Humus
			  	<input onclick="check4()" type="radio" name="jenis_tanah" value="<?= $getJenisTanahDataValue["probabilitas_bisa"] ?>">
			  	<span class="checkmark"></span>
			</label>
			<label class="container">Tanah Laterit
			  	<input onclick="check5()" type="radio" name="jenis_tanah" value="<?= $getJenisTanahDataValue2["probabilitas_bisa"] ?>">
			  	<span class="checkmark"></span>
			</label>
			<label class="container">Tanah Padas
			  	<input onclick="check6()" type="radio" name="jenis_tanah" value="<?= $getJenisTanahDataValue3["probabilitas_bisa"] ?>">
			  	<span class="checkmark"></span>
			</label>
			<div style="margin-bottom: 10px;"><strong>Sinar Matahari</strong></div>
			<label class="container"> < 20000 lx
			  	<input onclick="check8()" type="radio" name="intensitas_cahaya" value="<?= $getIntCahayaDataValue["probabilitas_bisa"] ?>">
			  	<span class="checkmark"></span>
			</label>
			<label class="container"> 20000-30000 lx
			  	<input onclick="check7()" type="radio" name="intensitas_cahaya" value="<?= $getIntCahayaDataValue2["probabilitas_bisa"] ?>">
			  	<span class="checkmark"></span>
			</label>
			<div style="margin-bottom: 10px;"><strong>Curah Hujan</strong></div>
			<label class="container"> < 15 mm/hari
			  	<input onclick="check9()" type="radio" name="curah_hujan" value="<?= $getCrhHujanDataValue["probabilitas_bisa"] ?>">
			  	<span class="checkmark"></span>
			</label>
			<label class="container">15 – 30 mm/hari
			  	<input onclick="check10()" type="radio" name="curah_hujan" value="<?= $getCrhHujanDataValue2["probabilitas_bisa"] ?>">
			  	<span class="checkmark"></span>
			</label>
			<label class="container"> > 30 mm/hari
			  	<input onclick="check11()" type="radio" name="curah_hujan" value="<?= $getCrhHujanDataValue3["probabilitas_bisa"] ?>">
			  	<span class="checkmark"></span>
			</label>
			<button onclick="showRes()">Result</button> -->
		<input id="getStat" style="display: none;" type="radio" name="suhu_tdk" value="<?= $getSuhuDatavalue["probabilitas_tdk_bisa"] ?>">
		<input id="getStat2" style="display: none;" type="radio" name="suhu_tdk" value="<?= $getSuhuDatavalue2["probabilitas_tdk_bisa"] ?>">
		<input id="getStat3" style="display: none;" type="radio" name="suhu_tdk" value="<?= $getSuhuDatavalue3["probabilitas_tdk_bisa"] ?>">
		<input id="getStat001" style="display: none;" type="radio" name="suhu_krit" value="Rendah">
		<input id="getStat002" style="display: none;" type="radio" name="suhu_krit" value="Sedang">
		<input id="getStat003" style="display: none;" type="radio" name="suhu_krit" value="Tinggi">
		<input id="getStat4" style="display: none;" type="radio" name="jenis_tanah_tdk" value="<?= $getJenisTanahDataValueTdk["probabilitas_tdk_bisa"] ?>">
		<input id="getStat5" style="display: none;" type="radio" name="jenis_tanah_tdk" value="<?= $getJenisTanahDataValueTdk2["probabilitas_tdk_bisa"] ?>"> 
		<input id="getStat6" style="display: none;" type="radio" name="jenis_tanah_tdk" value="<?= $getJenisTanahDataValueTdk3["probabilitas_tdk_bisa"] ?>"> 
		<input id="getStat004" style="display: none;" type="radio" name="jenis_tanah_krit" value="Tanah Humus">
		<input id="getStat005" style="display: none;" type="radio" name="jenis_tanah_krit" value="Tanah Laterit">
		<input id="getStat006" style="display: none;" type="radio" name="jenis_tanah_krit" value="Tanah Padas">
		<input id="getStat7" style="display: none;" type="radio" name="intensitas_cahaya_tdk" value="<?= $getIntCahayaDataValuetdk2["probabilitas_tdk_bisa"] ?>">
		<input id="getStat8" style="display: none;" type="radio" name="intensitas_cahaya_tdk" value="<?= $getIntCahayaDataValuetdk["probabilitas_tdk_bisa"] ?>">
		<input id="getStat007" style="display: none;" type="radio" name="intensitas_cahaya_krit" value="Cukup">
		<input id="getStat008" style="display: none;" type="radio" name="intensitas_cahaya_krit" value="Kurang">
		<input id="getStat9" style="display: none;" type="radio" name="curah_hujan_tdk" value="<?= $getCrhHujanDataValuetdk["probabilitas_tdk_bisa"] ?>">
		<input id="getStat10" style="display: none;" type="radio" name="curah_hujan_tdk" value="<?= $getCrhHujanDataValuetdk2["probabilitas_tdk_bisa"] ?>">
		<input id="getStat11" style="display: none;" type="radio" name="curah_hujan_tdk" value="<?= $getCrhHujanDataValuetdk3["probabilitas_tdk_bisa"] ?>">
		<input id="getStat009" style="display: none;" type="radio" name="curah_hujan_krit" value="Rendah">
		<input id="getStat010" style="display: none;" type="radio" name="curah_hujan_krit" value="Sedang">
		<input id="getStat011" style="display: none;" type="radio" name="curah_hujan_krit" value="Tinggi">
	</form>
	<div class="res-prob">
		Berdasarkan Perhitungan dengan Menggunakan Metode <br> <strong>Naive Bayes</strong> Lahan Anda Dinyatakan :
		<strong> 
		<?php

			if(isset($_SESSION["stts_lahan"]))
			{
				echo $_SESSION["stts_lahan"];
			}

		?>
		</strong>
		<br>
		Dengan Nilai Perhitungan Sebagai Berikut: 
		<br><br>Probabilitas YA : <strong style="color: green;">
		<?php

			if(isset($_SESSION["prob_ya"]))
			{
				echo $_SESSION["prob_ya"];
				?>
				</strong>
				<br>Probabilitas TIDAK : <strong style="color: red;">
				<?php
				echo $_SESSION["prob_tdk"];
				unset($_SESSION["prob_ya"]);
				unset($_SESSION["prob_tdk"]);
			}

		?>
		</strong>
	</div>
	<?php
		if(isset($_SESSION["message"]))
		{
			echo $_SESSION["message"];
			unset ($_SESSION["message"]);
		}
	?>
	<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<!-- <script type="text/javascript" src="js/main.js"></script> -->
	<script type="text/javascript">
		function check() {
			document.getElementById("getStat").checked = true;
			document.getElementById("getStat001").checked = true;
		}
		function check2() {
			document.getElementById("getStat2").checked = true;
			document.getElementById("getStat002").checked = true;
		}
		function check3() {
			document.getElementById("getStat3").checked = true;
			document.getElementById("getStat003").checked = true;
		}
		function check4() {
			document.getElementById("getStat4").checked = true;
			document.getElementById("getStat004").checked = true;
		}
		function check5() {
			document.getElementById("getStat5").checked = true;
			document.getElementById("getStat005").checked = true;
		}
		function check6() {
			document.getElementById("getStat6").checked = true;
			document.getElementById("getStat006").checked = true;
		}
		function check7() {
			document.getElementById("getStat7").checked = true;
			document.getElementById("getStat007").checked = true;
		}
		function check8() {
			document.getElementById("getStat8").checked = true;
			document.getElementById("getStat008").checked = true;
		}
		function check9() {
			document.getElementById("getStat9").checked = true;
			document.getElementById("getStat009").checked = true;
		}
		function check10() {
			document.getElementById("getStat10").checked = true;
			document.getElementById("getStat010").checked = true;
		}
		function check11() {
			document.getElementById("getStat11").checked = true;
			document.getElementById("getStat011").checked = true;
		}
		function showRes() {
			$(".resProb").css("opacity", "1");
		}
	</script>
</body>
</html>