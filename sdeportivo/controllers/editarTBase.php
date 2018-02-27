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

		$nombre = mysqli_real_escape_string($connection, $_POST['nom_torneo']);
		$fech = mysqli_real_escape_string($connection, $_POST['fecha']);
		$id = mysqli_real_escape_string($connection, $_POST['id']);
		
		$q = "UPDATE `administrador` SET `nom_torneo`='$nombre', `fecha`='$fech' WHERE `id`='$id'";

 	//cerrando conexion

			
	$res = mysqli_query($connection, $q);

	mysqli_close($connection);

	header("location:../views/admin.php");
	
?>