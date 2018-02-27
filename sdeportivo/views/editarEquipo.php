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
	<title>Editar Equipo</title>
</head>
<body>
	<h2>Editando el equipo: <?php echo $_GET["nom_equi"]; ?></h2>
	<a href="admin.php"><button class="verde">Regresar</button></a>
	<a href="../controllers/cerrar.php"><button class="rojo">Cerrar Sesion</button></a>
	<?php
		$nom = $_GET["nom_equi"];
		$sql = "SELECT * FROM `equipos` WHERE nom_equi = $nom"; //Me traigo la tabla admi

		if($result = mysqli_query($connection, $sql)){	

			while($row = mysqli_fetch_assoc($result)){ //Todas sus filas	
	?>

	<form action="../controllers/editarEBase.php" method="post">

		<legend>Torneo</legend>

		<fieldset>
			<label>Nombre del equipo: </label>
			<input type="text" name="nom_equi" placeholder="<?=$nom?>" required>

			<br>
			<label>Nombre corto: </label>
			<input type="text" name="nom_cort"  placeholder="<?=$row['nom_cort']?>" required>

			<br>
			<label>Fecha de creacion</label>
			<input type="date" name="fecha"  placeholder="<?=$row['fecha']?>" required>

			<br>
			<label>Direccion del responsable: </label>
			<input type="text" name="direccion"  placeholder="<?=$row['direccion']?>">

			<br>
			<label>Correo: </label>
			<input type="text" name="correo"  placeholder="<?=$row['correo']?>" required>

			<br>
			<label>Sitio web: </label>
			<input type="text" name="web"  placeholder="<?=$row['web']?>">
			
			<input type="hidden" name="id" value="<?= $row['id']?>">
			<br>
			<input type="submit" name="boton2" value="registrar">
		</fieldset>

	</form>
      
	<?php  
			}
		}

	?>
</body>
</html>


 <?php 

 	//cerrando conexion

			
	$res = mysqli_query($connection, $sql);

	mysqli_close($connection);

		
			
?>