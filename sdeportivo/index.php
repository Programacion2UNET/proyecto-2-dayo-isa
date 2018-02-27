<?php 

	session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
</head>
<body>

	<div id="inicio">
	<form action="controllers/iniciar.php" method="post">
		<legend>Iniciar sesion</legend>

		<fieldset>
			<br>
			<label>Usuario: </label>
			<input type="text" name="usuario" required>

			<br>
			<label>Contraseña: </label>
			<input type="password" name="clave" required>

			<br>
			<input type="submit" name="boton1" value="aceptar">
		</fieldset>

	</form>
	</div>

	<div id="registo">

	<form action="controllers/iniciar.php" method="post">

		<legend>Registrarse</legend>

		<fieldset>
			<br>
			<label>Nombre del equipo: </label>
			<input type="text" name="nom_equi" required>

			<br>
			<label>Nombre corto: </label>
			<input type="text" name="nom_corto" required>

			<br>
			<label>Fecha de creacion</label>
			<input type="date" name="fecha" required>

			<br>
			<label>Direccion del responsable: </label>
			<input type="text" name="direccion">

			<br>
			<label>Correo: </label>
			<input type="text" name="correo" required>

			<br>
			<label>Sitio web: </label>
			<input type="text" name="web">

			<br>
			<label>Usuario: </label>
			<input type="text" name="usuario" required>

			<br>
			<label>Contraseña: </label>
			<input type="password" name="clave" required>
			
			<br>
			<input type="submit" name="boton2" value="registrar">
		</fieldset>

	</form>

	</div>
</body>
</html>