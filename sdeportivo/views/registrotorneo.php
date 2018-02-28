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
 	<link rel="stylesheet" type="text/css" href="s_torneo.css">
 	<title>Torneo Registrado</title>
 </head>
 <body>

 	<?php 
 			$usu=$_SESSION["usuario"];

			$sql = "SELECT * FROM `torneo` WHERE usuario='$usu'"; //seleccionando todo(*) de la tabla torneo
			//muestra todos los torneos donde esa inscrito ese usuario

			echo "<h2>".$usu." está registrado en los siguientes torneos: </h2><br>";

				if(($res = mysqli_query($connection, $sql))){

					while($row = mysqli_fetch_assoc($res)){

						echo $row['nom_torneo']."<br>";
							
					}
						
				}

			?>

	<a href="torneos.php"><button>Regresar</button></a>
 	<a href="../controllers/cerrar.php"><button>Cerrar Session</button></a>
 
 </body>
 </html>

 <?php 

 	//cerrando conexion

			$res = mysqli_query($connection, $sql);

			mysqli_close($connection);
?>