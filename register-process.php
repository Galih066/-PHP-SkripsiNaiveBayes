<?php

	session_start();

	if(isset($_POST["inputUserReg"]))
	{
		$nama  = $_POST["inputUserReg"];
		$sandi = $_POST["inputPassReg"];
		$keterangan = $_POST["inputKetReg"];

		if($nama == "")
		{
			$_SESSION["message"] = "Username must be filled";
			header("location:register.php");
			exit();
		}
		else if($sandi == "")
		{
			$_SESSION["message"] = "Password must be filled";
			header("location:register.php");
			exit();
		}
		else if($keterangan == "")
		{
			$_SESSION["message"] = "Keterangan must be filled";
			header("location:register.php");
			exit();
		}
		else
		{
			include("koneksi.php");
			$result = $connect->query("SELECT * FROM pengguna WHERE nama_pengguna LIKE '".$nama."'");

			if($result -> num_rows == 0)
			{
				$connect -> query("INSERT INTO pengguna VALUES (null, '".$nama."','".$sandi."','".$keterangan."')");
				header("location: index.php");
				exit();
			}
			else
			{
				$_SESSION["message"] = "Username already used";
				header("location:register.php");
				exit();
			}
		}
	}
?>