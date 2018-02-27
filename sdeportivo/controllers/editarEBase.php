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

		$nombre = $_POST['nom_equi'];
		$corto =$_POST['nom_cort'];
		$fecha = $_POST['fecha'];
		$dire = $_POST['direccion'];
		$correo = $_POST['correo'];
		$web = $_POST['web'];
		$id = $_POST['id'];

		$q = "UPDATE `equipos` SET `nom_equi`='$nombre', `nom_corto`='$corto',`fecha`='$fecha',`direccion`='$dire', `correo`='$correo',`web`='$web' WHERE `id`='$id'";

 	//cerrando conexion

			
	$res = mysqli_query($connection, $q);

	mysqli_close($connection);

	header("location:../views/admin.php");
	
?>