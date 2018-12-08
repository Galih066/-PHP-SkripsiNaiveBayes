<?php
	session_start();
	if(isset($_COOKIE["ID_pengguna"]))
	{
		header("location: main-page.php");
		exit();
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/register-style.css">
	<title>Register</title>
</head>
<body>
	<a href="login-form.php">Kembali</a>
	<center>
		<form action="register-process.php" method="post">
			<table>
				<tr>
					<td><img src="img/person-silhouette.png"></td>
					<td><input placeholder="Username" type="text" name="inputUserReg"></td>
				</tr>
				<tr>
					<td><img src="img/closed-lock.png"></td>
					<td><input placeholder="Password" type="Password" name="inputPassReg"></td>
				</tr>
				<tr>
					<td><img src="img/warning-exclamation-sign-in-filled-triangle.png"></td>
					<td><input placeholder="Position As" type="text" name="inputKetReg"></td>
				</tr>
			</table>
			<button class="draw">Register</button>
		</form>
		<br>
			<?php
				if(isset($_SESSION["message"]))
				{
					echo $_SESSION["message"];
					unset ($_SESSION["message"]);
				}
			?>
		<br>
	</center>
</body>
</html>