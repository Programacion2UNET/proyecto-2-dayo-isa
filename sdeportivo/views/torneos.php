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
	<link rel="stylesheet" type="text/css" href="s_torneo.css">
	<title>Inscripcion de torneo</title>
</head>
<body background="../img/fondo2.png">

	<form method="post" action="../controllers/regisTorneo.php">

		<h2>Registrarse en un torneo</h2>

		<table>
		<tr>
		<td><label>Torneo a inscribirse: </label></td>
		
		<td><select name="nom_torneo">

			<option checked>Seleccione un torneo</option>

			<?php 

				$sql = "SELECT * FROM `administrador`"; //seleccionando todo(*) de la tabla administrador

				if(($res = mysqli_query($connection, $sql))){

					while($row = mysqli_fetch_assoc($res)){

						$aux=$row['fecha'];
						echo $aux;
						$date=explode("-", $aux);

						if($date[0]>=$fecha['year'] && ($date[1]>$fecha['mon']  || ($date[1]==$fecha['mon'] && $date[2]>$fecha['mday']))){

							echo "<option>".$row['nom_torneo']."</option>"; //creando las opciones de los torneos
						}	

							
					}
				}

			 ?>

		</select></td></tr>

		

		<tr>
		<td><label>Cantidad de paticipantes: </label></td>
		<td><input type="number" name="participantes"></td>
		</tr>

		
		<tr>
		<td><label>Categoria: </label></td>	

		<td><select name="categoria">
			
			<option>Principiantes</option>
			<option>Aficionados</option>
			<option>Profesionales</option>

		</select>
		</tr></td></table>
	
	
	<input type="submit" name="participar" value="Participar">
	</form>

	<a  href="../controllers/cerrar.php"><button name="cerrar">Cerrar Session</button></a>

</body>
</html>

<?php 

		
	$res = mysqli_query($connection, $sql);

	mysqli_close($connection);

 ?>