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

			<table>
				
				<tr>
					<td><label>Usuario: </label></td>
					<td><input type="text" name="usuario" required></td>
				</tr>

				<tr>
					<td><label>Contraseña: </label></td>
					<td><input type="password" name="clave" required></td>
				</tr>

				<tr colspan="2">
					<td><input type="submit" name="boton1" value="aceptar"></td>
				</tr>

			</table>
		
		</fieldset>

	</form>
	</div>

	<div id="registo">

	<form action="controllers/iniciar.php" method="post">

		<legend>Registrarse</legend>

		<fieldset>

			<table>
				
				<tr>
					<td><label>Nombre del equipo: </label></td>
					<td><input type="text" name="nom_equi" required></td>
				</tr>

				<tr>
					<td><label>Nombre corto: </label></td>
					<td><input type="text" name="nom_corto" required></td>
				</tr>

				<tr>
					<td><label>Fecha de creacion</label></td>
					<td><input type="date" name="fecha" required></td>
				</tr>

				<tr>
					<td><label>Direccion del responsable: </label></td>
					<td><input type="text" name="direccion"></td>
				</tr>

				<tr>
					<td><label>Correo: </label></td>
					<td><input type="text" name="correo" required></td>
				</tr>

				<tr>
					<td><label>Sitio web: </label></td>
					<td><input type="text" name="web"></td>
				</tr>

				<tr>
					<td><label>Usuario: </label></td>
					<td><input type="text" name="usuario" required></td>
				</tr>

				<tr>
					<td><label>Contraseña: </label></td>
					<td><input type="password" name="clave" required></td>
				</tr>

				<tr colspan="2">
					<td><input type="submit" name="boton2" value="registrar"></td>
				</tr>

			</table>

		</fieldset>

	</form>

	</div>
</body>
</html>