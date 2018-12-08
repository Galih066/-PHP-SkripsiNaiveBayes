<?php
	
	session_start();

	if(isset($_POST["suhu__"]))
	{
		include("koneksi.php");
		$KonsId = $_POST["id-suhu"];
		$newDataSuhu = $_POST["suhu__"];
		$newDataJmlKejBsa = $_POST["jml-kjd-bs"];
		$newDataJmlKejTdkBsa = $_POST["jml-kjd-tbs"];
		$newDataProbBisa = $_POST["prob-bs"];
		$newDataProbTdkBisa = $_POST["prob-tbs"];

		if($newDataSuhu == "")
		{
			$_SESSION["message"] = "All Field Must Be Filled";
			header("location: update-tb-suhu.php");
			exit();
		}
		elseif($newDataJmlKejBsa == "")
		{
			$_SESSION["message"] = "All Field Must Be Filled";
			header("location: update-tb-suhu.php");
			exit();
		}
		elseif($newDataJmlKejTdkBsa == "")
		{
			$_SESSION["message"] = "All Field Must Be Filled";
			header("location: update-tb-suhu.php");
			exit();
		}
		elseif($newDataProbBisa == "")
		{
			$_SESSION["message"] = "All Field Must Be Filled";
			header("location: update-tb-suhu.php");
			exit();
		}
		elseif($newDataProbTdkBisa == "")
		{
			$_SESSION["message"] = "All Field Must Be Filled";
			header("location: update-tb-suhu.php");
			exit();
		}
		else
		{	
			$connect -> query("UPDATE probabilitas_kriteria_suhu SET suhu = '".$newDataSuhu."', jumlah_kejadian_bisa = '".$newDataJmlKejBsa."', jumlah_kejadian_tdk_bisa = '".$newDataJmlKejTdkBsa."', probabilitas_bisa = '".$newDataProbBisa."', probabilitas_tdk_bisa = '".$newDataProbTdkBisa."' WHERE id = ". $KonsId);
			header("location: main-page.php");
			exit();
		}
	}

?>