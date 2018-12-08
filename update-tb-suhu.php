<?php
session_start();
if(!isset($_GET["id"]))
{
	header("location: main-page.php");
	exit();
}
	$id_tb_suhu = $_GET["id"];

	include("koneksi.php");
	
	$get_id_suhu=$connect -> query("SELECT * FROM probabilitas_kriteria_suhu WHERE id = ".$id_tb_suhu);

	if($get_id_suhu->num_rows == 0)
	{
		header("location: main-page.php");
		exit();
	}
	$get_id_suhu = $get_id_suhu ->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/update-tb-suhu.css">
	<title>Edit Data</title>
</head>
<body>
	<a href="main-page.php"><h4>Back</h4></a>
	<h3>Edit Data Suhu</h3>
	<form action="edit-process.php" method="post">
		<input type="hidden" name="id-suhu" value="<?= $_GET["id"] ?>">
		<table>
			<tr>
				<td>Suhu</td>
				<td>
					<input type="text" name="suhu__" value="<?= $get_id_suhu["suhu"] ?>">
				</td>
			</tr>
			<tr>
				<td>Jumlah Kejadian Bisa</td>
				<td>
					<input type="text" name="jml-kjd-bs" value="<?= $get_id_suhu["jumlah_kejadian_bisa"] ?>">
				</td>
			</tr>
			<tr>
				<td>Jumlah Kejadian T.Bisa</td>
				<td>
					<input type="text" name="jml-kjd-tbs" value="<?= $get_id_suhu["jumlah_kejadian_tdk_bisa"] ?>">
				</td>
			</tr>
			<tr>
				<td>Probabilitas Bisa</td>
				<td>
					<input type="text" name="prob-bs" value="<?= $get_id_suhu["probabilitas_bisa"] ?>">
				</td>
			</tr>
			<tr>
				<td>Probabilitas T.Bisa</td>
				<td>
					<input type="text" name="prob-tbs" value="<?= $get_id_suhu["probabilitas_tdk_bisa"] ?>">
				</td>
			</tr>
			<tr>
				<td style="width: 300px;"><button>Submit</button></td>
			</tr>
		</table>
		<?php
			if(isset($_SESSION["message"]))
			{
				echo $_SESSION["message"];
				unset ($_SESSION["message"]);
			}
		?>
	</form>

</body>
</html>