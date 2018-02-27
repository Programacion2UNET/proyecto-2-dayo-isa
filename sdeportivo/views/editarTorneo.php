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
	<title>Editar Torneo</title>
</head>
<body>
	<h2>Editando el torneo: <?php echo $_POST["nom_torneo"]; ?></h2>
	<a href="admin.php"><button class="verde">Regresar</button></a>
	<a href="../controllers/cerrar.php"><button class="rojo">Cerrar Sesion</button></a>
	<?php
		$nom = mysqli_real_escape_string($connection, $_POST["nom_torneo"]);
		$sql = "SELECT * FROM `administrador` WHERE nom_torneo = '$nom'"; //Me traigo la tabla admi

		if($result = mysqli_query($connection, $sql)){	

			while($row = mysqli_fetch_assoc($result)){ //Todas sus filas	
	?>

	<form action="../controllers/editarTBase.php" method="post">

		<legend>Torneo</legend>

		<fieldset>
			<br>
			<label>Nombre del Torneo: </label>
			<input type="text" name="nom_torneo" value="<?=$nom?>" required>

			<br>
			<label>Fecha de realizacion</label>
			<input type="date" name="fecha" value="<?= $row['fecha']?>" required>
			<input type="hidden" name="id" value="<?= $row['id']?>">
			<br>
			<input type="submit" name="act-torneo" value="registrar">
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