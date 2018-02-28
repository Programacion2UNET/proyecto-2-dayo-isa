<?php 
	session_start();

	if(!isset($_SESSION["usuario"])){

		header("location:../index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="s_etorneo.css">
	<title>Registrando torneo</title>
</head>
<body background="../img/fondo2.png">
	<form action="../controllers/baseadmin.php" method="post">

		<h2>Registro de torneos</h2>

		<fieldset>
			<legend>Registro de Torneo</legend>
			
			<label>Nombre del Torneo: </label>
			<input type="text" name="nom_torneo" required>

			<br>
			<label>Fecha de realizacion:</label>
			<input type="date" name="fecha" required>

			<br><br>
			<input type="submit" name="reg-torneo" value="Registrar">
		</fieldset>

	</form>
</body>
</html>