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


	$id = $_GET['id']; //Id del evento a eliminar
	echo "$id";
	
	$q = "DELETE FROM `administrador` WHERE id = $id";

	$result = mysqli_query($connection, $q);

			
	mysqli_close($connection);

	header("Location:../views/admin.php");
 ?>

