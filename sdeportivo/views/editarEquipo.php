<?php 
	session_start();

	if(!isset($_SESSION["usuario"])){

		header("location:../index.php");
	}
		$connection = mysqli_connect('localhost', 'root', '');

		if (!$connection) {
		
			die('No hay conexion a la BD');
		}

		//seleccionando la base de datos

		mysqli_select_db($connection, 'sdeportivo');
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="s_etorneo.css">
	<title>Editar Equipo</title>
</head>
<body background="../img/fondo2.png">
	<h2>Editando el equipo: <?php echo $_POST["nom_equi"]; ?></h2>
	<?php
		$nom = mysqli_real_escape_string($connection, $_POST["nom_equi"]);
		$sql = "SELECT * FROM `equipos` WHERE nom_equi = '$nom'"; //Me traigo la tabla admi

		if($result = mysqli_query($connection, $sql)){	

			while($row = mysqli_fetch_assoc($result)){ //Todas sus filas	
	?>

	<form action="../controllers/editarEBase.php" method="post">

		<fieldset>

			<table>
				
				<tr>
					<td><label>Nombre del equipo: </label></td>
					<td><input type="text" name="nom_equi" value="<?=$nom?>" required></td>
				</tr>

				<tr>
					<td><label>Nombre corto: </label></td>
					<td><input type="text" name="nom_corto"  value="<?=$row['nom_corto']?>" required></td>
				</tr>

				<tr>
					<td><label>Fecha de creacion</label></td>
					<td><input type="date" name="fecha"  value="<?=$row['fecha']?>" required></td>
				</tr>

				<tr>
					<td><label>Direccion del responsable: </label></td>
					<td><input type="text" name="direccion"  value="<?=$row['direccion']?>"></td>
				</tr>

				<tr>
					<td><label>Correo: </label></td>
					<td><input type="text" name="correo"  value="<?=$row['correo']?>" required></td>
				</tr>

				<tr>
					<td><label>Sitio web: </label></td>
					<td><input type="text" name="web"  value="<?=$row['web']?>"></td>
				</tr>

				<tr colspan="2">

					<td><br><input type="submit" name="boton2" value="Registrar"></td>
				</tr>

			</table>			
			
			<input type="hidden" name="id" value="<?= $row['id']?>">

		</fieldset>

	</form>
      
	<?php  
			}
		}

	?>
	<br>
	<a href="admin.php"><button >Regresar</button></a>
	<a href="../controllers/cerrar.php"><button >Cerrar Sesion</button></a>
</body>
</html>


 <?php 

 	//cerrando conexion

			
	$res = mysqli_query($connection, $sql);

	mysqli_close($connection);

		
			
?>