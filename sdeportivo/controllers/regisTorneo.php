<?php 

	session_start();

	if(!isset($_SESSION["usuario"])){

		header("location:../index.php");
	}
	
	if (isset($_POST["participar"])) { //torneo registrado

		//conexion

		$connection = mysqli_connect('localhost', 'root', '');

			if (!$connection) {
		
				die('No hay conexion a la BD');
			}

			//seleccionando la base de datos

			mysqli_select_db($connection, 'sdeportivo');

		//para guardar las variables
 
		$nom_torneo  = $_POST["nom_torneo"];
		$participantes  = $_POST["participantes"];
		$categoria  = $_POST["categoria"];
		$usuario = $_SESSION["usuario"]; //el usuario que se mantiene desde inicio de sesion

		//preparar la sentencia SQL

			$sql = 	sprintf("INSERT INTO torneo(nom_torneo, participantes, categoria, usuario)
			VALUES ('%s', '%s', '%s', '%s')",
			$nom_torneo, $participantes, $categoria, $usuario);

			
			//cerrando conexion

			$res = mysqli_query($connection, $sql);

			mysqli_close($connection);

			header("location:../views/registrotorneo.php");

	}

	
 ?>