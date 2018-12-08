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
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<title>Login</title>
</head>
<body>
	<a href="index.php"><img class="bck-btn" src="img/home.png"></a>
	<a href="register.php"><span>Tambah Admin Baru</span></a>
	<center>
		<img class="rule-img" src="img/login (1).png"><br>
		<form action="login-process.php" method="post">
			<img src="img/person-silhouette.png"><input placeholder="Username" type="text" name="inputUser"><br>
			<img src="img/closed-lock.png"><input placeholder="Password" type="Password" name="inputPass"><br>
			<button class="draw">Login</button>
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