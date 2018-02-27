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
	<title>Detalles Equipo</title>
</head>
<body>
	<h2>Detalles del equipo: <?php echo $_POST["nom_equi"]; ?></h2>
	<a href="admin.php"><button class="verde">Regresar</button></a>
	<a href="../controllers/cerrar.php"><button class="rojo">Cerrar Sesion</button></a>
	<?php
		$nom = mysqli_real_escape_string($connection, $_POST["nom_equi"]);
		$sql = "SELECT * FROM `equipos` WHERE nom_equi = '$nom'"; //Me traigo la tabla admi

		if($result = mysqli_query($connection, $sql)){	

			while($row = mysqli_fetch_assoc($result)){ //Todas sus filas	
	?>
		<table>
                    <tr>
                    	<th > Nombre del Equipo </th>
                    	<th > Nombre Corto </th>
                    	<th > Fecha </th>
                    	<th > Direccion </th>
                    	<th > Correo </th>
						<th > Web </th>
                    </tr> 
                    <tr>
                    	<td > <?php echo $_POST["nom_equi"] ?> </td> 
 						<td > <?php echo $row["nom_corto"] ?> </td> 
 						<td > <?php echo $row["fecha"] ?> </td> 
 						<td > <?php echo $row["direccion"] ?> </td> 
 						<td > <?php echo $row["correo"] ?> </td> 
 						<td > <?php echo $row["web"] ?> </td> 
                    </tr>
        </table>            
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