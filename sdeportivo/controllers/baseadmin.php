<?php 
	session_start();

	if(!isset($_SESSION["usuario"])){

		header("location:../index.php");
	}
	
	if (isset($_POST["reg-torneo"])) {

		$connection = mysqli_connect('localhost', 'root', '');

		if (!$connection) {
		
			die('No hay conexion a la BD');
		}

		//seleccionando la base de datos

		mysqli_select_db($connection, 'sdeportivo');

		$nom_torneo  = $_POST["nom_torneo"];
		$fecha  = $_POST["fecha"];


		$sql = 	sprintf("INSERT INTO administrador(nom_torneo,fecha)
			VALUES ('%s', '%s')",
			$nom_torneo, $fecha);

			
			//cerrando conexion

		$res = mysqli_query($connection, $sql);

		mysqli_close($connection);

		header("location:../views/admin.php");

	}


 ?>