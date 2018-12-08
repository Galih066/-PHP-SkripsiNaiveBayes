<?php
session_start();
if(isset($_POST["inputUser"]))
{
	$email = $_POST["inputUser"];
	$pass = $_POST["inputPass"];

	if($email == "")
	{
		$_SESSION["message"] = "Username must be filled";
		header("location:login-form.php");
		exit();
	}
	elseif($pass == "")
	{
		$_SESSION["message"] = "Password must be filled";
		header("location:login-form.php");
		exit();
	}
	else
	{
		include("koneksi.php");
		echo "SELECT * FROM pengguna WHERE nama_pengguna LIKE '".$email."' AND pass_pengguna LIKE '".$pass."'";
		$result = $connect -> query("SELECT * FROM pengguna WHERE nama_pengguna LIKE '".$email."' AND pass_pengguna LIKE '".$pass."'");
	}

	if($result->num_rows == 1)
	{
		setcookie("ID_pengguna", $result -> fetch_assoc()["id"]);
		header("location: main-page.php");
		exit();
	}
	else
	{
		$_SESSION["message"] = "Account not Found";
		header("location:login-form.php");
		exit();
	}
}
else
{
	header("location: /");
	exit();
}

?>