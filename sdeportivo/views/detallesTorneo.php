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
	<title>Detalles Torneo</title>
</head>
<body>
	<h2>Detalles del torneo: <?php echo $_GET["nom_torneo"]; ?></h2>
	<a href="admin.php"><button class="verde">Regresar</button></a>
	<a href="../controllers/cerrar.php"><button class="rojo">Cerrar Sesion</button></a>
	<?php
		$nom = $_GET["nom_torneo"];
		$sql = "SELECT * FROM `administrador` WHERE nom_torneo = $nom"; //Me traigo la tabla admi

		if($result = mysqli_query($connection, $sql)){	

			while($row = mysqli_fetch_assoc($result)){ //Todas sus filas	
	?>
		<table>
                    <tr>
                    	<th > Nombre del Torneo </th>
                    	<th > Fecha de Realizacion </th>
                    </tr> 
                    <tr>
                    	<td > <?php echo $nom ?> </td> 
 						<td > <?php echo $row["fecha"] ?> </td> 
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