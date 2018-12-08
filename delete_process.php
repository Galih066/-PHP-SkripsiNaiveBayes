<?php

session_start();

if(isset($_GET["delete_id"]))
{
	include("koneksi.php");

	$connect -> query("DELETE FROM result_alt_lahan WHERE id = ".$_GET["delete_id"]);
}

header("location: main-page.php");

?>