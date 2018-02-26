<?php 
	
	session_start();

	if(!isset($_SESSION["usuario"])){

		header("location:../index.php");
	}
	//conexion

	$connection = mysqli_connect('localhost', 'root', '');

		if (!$connection) {
		
			die('No hay conexion a la BD');
		}

		//seleccionando la base de datos

		mysqli_select_db($connection, 'sdeportivo');

		$fecha=getdate();

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Inscripcion de torneo</title>
</head>
<body>

	<form method="post" action="../controllers/regisTorneo.php">

		<legend>Registrarse en un torneo</legend>

		<br>

		<label>Torneo a inscribirse: </label>	

		<select name="nom_torneo">

			<option checked>Seleccione un torneo</option>

			<?php 

				$sql = "SELECT * FROM `administrador`"; //seleccionando todo(*) de la tabla administrador

				if(($res = mysqli_query($connection, $sql))){

					while($row = mysqli_fetch_assoc($res)){

						$aux=$row['fecha'];
						$date=explode("-", $aux);

						if(((int)$date[0])>=$fecha['year'] && ((int)$date[1])>=$fecha['mon'] && ((int)$date[2])>=$fecha['mday']){

							echo "<option>".$row['nom_torneo']."</option>"; //creando las opciones de los torneos
						}	

							
					}
				}

			 ?>

		</select>

		<br><br>

		<label>Cantidad de paticipantes: </label>
		<input type="number" name="participantes">

		<br><br>

		<label>Categoria: </label>	

		<select name="categoria">
			
			<option>Principiantes</option>
			<option>Aficionados</option>
			<option>Profesionales</option>

		</select>

			<br><br>

		<input type="submit" name="participar" value="Participar">

	</form>

	<a href="../controllers/cerrar.php">Cerrar Session</a>

</body>
</html>

<?php 

		
	$res = mysqli_query($connection, $sql);

	mysqli_close($connection);

 ?>