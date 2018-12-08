<?php

	session_start();

	if(isset($_POST["nama_lahan"]))
	{
		$konstantaYa = 0.537;
		$konstantaTdk = 0.462;
		$stat = "";
		$nma_lhn = $_POST["nama_lahan"];
		$suhuInpt = $_POST["suhu"];
		$suhulikehoodtdk = $_POST["suhu_tdk"];
		$suhustring = $_POST["suhu_krit"];
		$jns_tnahInpt = $_POST["jenis_tanah"];
		$jns_tnahlikehoodtdk = $_POST["jenis_tanah_tdk"];
		$jnistanahstring = $_POST["jenis_tanah_krit"];
		$intsts_chayaInpt = $_POST["intensitas_cahaya"];
		$intsts_chayatdk = $_POST["intensitas_cahaya_tdk"];
		$intstschayastring = $_POST["intensitas_cahaya_krit"];
		$curah_hjanInpt = $_POST["curah_hujan"];
		$curah_hjantdk = $_POST["curah_hujan_tdk"];
		$curahhjanstring = $_POST["curah_hujan_krit"];

		if($nma_lhn == "")
		{
			$_SESSION["message"] = "All field must be filled";
			header("location:select-krit.php");
			exit();
		}
		else if(!isset($_POST["suhu"]) || !$_POST["suhu"])
		{
			$_SESSION["message"] = "All field must be filled";
			header("location:select-krit.php");
			exit();
		}
		else if(!isset($_POST["jenis_tanah"]) || !$_POST["jenis_tanah"])
		{
			$_SESSION["message"] = "All field must be filled";
			header("location:select-krit.php");
			exit();
		}
		else if(!isset($_POST["intensitas_cahaya"]) || !$_POST["intensitas_cahaya"])
		{
			$_SESSION["message"] = "All field must be filled";
			header("location:select-krit.php");
			exit();
		}
		else if(!isset($_POST["curah_hujan"]) || !$_POST["curah_hujan"])
		{
			$_SESSION["message"] = "All field must be filled";
			header("location:select-krit.php");
			exit();
		}
		else
		{
			$likehoodYa = $suhuInpt*$jns_tnahInpt*$intsts_chayaInpt*$curah_hjanInpt*$konstantaYa;
			$likehoodTdk = $suhulikehoodtdk*$jns_tnahlikehoodtdk*$intsts_chayatdk*$curah_hjantdk*$konstantaTdk;
			$likehoodYa = number_format($likehoodYa, 4);
			$likehoodTdk = number_format($likehoodTdk, 4);
			
			$probabilitas_ya = $likehoodYa+$likehoodTdk;
			$probabilitas_ya = $likehoodYa/$probabilitas_ya;
			$probabilitas_ya = number_format($probabilitas_ya, 3);

			$probabilitas_tdk = $likehoodYa+$likehoodTdk;
			$probabilitas_tdk = $likehoodTdk/$probabilitas_tdk;
			$probabilitas_tdk = number_format($probabilitas_tdk, 3);

			if($probabilitas_ya <= 0.300)
			{
				$stat = "Tidak Cocok";
			}
			elseif($probabilitas_ya <= 0.600)
			{
				$stat = "Kurang Cocok";
			}
			elseif($probabilitas_ya >= 0.600)
			{
				$stat = "Cocok";
			}

			include("koneksi.php");
			$connect -> query("INSERT INTO result_alt_lahan VALUES (null,'".$nma_lhn."','".$suhustring."','".$jnistanahstring."','".$intstschayastring."','".$curahhjanstring."','".$likehoodYa."','".$likehoodTdk."','".$probabilitas_ya."','".$probabilitas_tdk."','".$stat."')");
			header("location: select-krit.php");

			$_SESSION["prob_ya"] = $probabilitas_ya;
			$_SESSION["prob_tdk"] = $probabilitas_tdk;
			$_SESSION["stts_lahan"] = $stat;
			header("location: select-krit.php");
		}
	}

?>