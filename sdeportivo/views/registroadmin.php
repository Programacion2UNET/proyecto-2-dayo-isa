<?php 
	session_start();

	if(!isset($_SESSION["usuario"])){

		header("location:../index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrando torneo</title>
</head>
<body>
	<form action="../controllers/baseadmin.php" method="post">

		<legend>Torneo</legend>

		<fieldset>
			<br>
			<label>Nombre del Torneo: </label>
			<input type="text" name="nom_torneo" required>

			<br>
			<label>Fecha de realizacion</label>
			<input type="date" name="fecha" required>

			<br>
			<input type="submit" name="reg-torneo" value="registrar">
		</fieldset>

	</form>
</body>
</html>