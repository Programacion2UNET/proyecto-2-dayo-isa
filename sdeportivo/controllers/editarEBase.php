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

		$nombre = mysqli_real_escape_string($connection, $_POST['nom_equi']);
		$corto = mysqli_real_escape_string($connection, $_POST['nom_cort']);
		$fecha = mysqli_real_escape_string($connection, $_POST['fecha']);
		$dire = mysqli_real_escape_string($connection, $_POST['direccion']);
		$correo = mysqli_real_escape_string($connection, $_POST['correo']);
		$web = mysqli_real_escape_string($connection, $_POST['web']);
		$id = mysqli_real_escape_string($connection, $_POST['id']);

		$q = "UPDATE `equipos` SET `nom_equi`='$nombre', `nom_corto`='$corto',`fecha`='$fecha',`direccion`='$dire', `correo`='$correo',`web`='$web' WHERE `id`='$id'";

 	//cerrando conexion

			
	$res = mysqli_query($connection, $q);

	mysqli_close($connection);

	header("location:../views/admin.php");
	
?>