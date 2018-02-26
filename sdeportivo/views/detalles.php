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
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edicion para administradores</title>
</head>
<body>

	<h2>Detalles del registro de Usuario </h2>
	<p>Nombre de los torneos</p>
	<?php

		$sql = "SELECT * FROM `administrador`"; //Me traigo el usuario

		if($result = mysqli_query($connection, $sql)){	

			while($row = mysqli_fetch_assoc($result)){ //Todas sus filas	
	?>

	<div class="detalles">
                    
                <table>
                    <tr> <td> <?php echo $row["nom_torneo"] ?> </td> </tr>
                    <tr> <td> <?php echo $row["categoria"] ?> </td> </tr>
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