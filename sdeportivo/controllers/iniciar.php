<?php 
	
	session_start();

	if(!isset($_SESSION["usuario"])){

		header("location:../index.php");
	}

	//if (!isset($_POST["boton1"]) && !isset($_POST["boton2"])) {

		///	header("location:../index.php");
	//}
	
	if (isset($_POST["boton1"]) || isset($_POST["boton2"])) {

		$connection = mysqli_connect('localhost', 'root', '');

			if (!$connection) {
		
				die('No hay conexion a la BD');
			}

			//seleccionando la base de datos

			mysqli_select_db($connection, 'sdeportivo');


		if (isset($_POST["boton1"])) { //iniciar

				$usu = mysqli_real_escape_string($connection, $_POST['usuario']);
				$clav = mysqli_real_escape_string($connection, $_POST['clave']);

				$sql = "SELECT * FROM `equipos` WHERE usuario = '$usu'"; 
				$sql2 = "SELECT * FROM `equipos` WHERE clave = '$clav'"; 

				if($res = mysqli_query($connection, $sql)){

					if($res!=NULL){
						//echo "hola";
						header("location:../index.php");
					}

					while($row = mysqli_fetch_assoc($res)){

						if($usu==$row["usuario"] && $clav==$row["clave"]){//&& $_POST["clave"]==$row["clave"]


							if($row["admin"]==1){ //si es un administrador

								$_SESSION["usuario"]=$_POST['usuario']; //se mantenga la session guardada por ese usuario
								 
								header("location:../views/admin.php");

							}else{//si es un equipo

								$_SESSION["usuario"]=$_POST['usuario']; //se mantenga la session guardada por ese usuario
								header("location:../views/torneos.php");
							}

							//
						}
					}
				}else{
					header("location:../index.php");
				}

			}else{ //registrar

			
			$nom_equi 	= 	$_POST["nom_equi"]; 
			$nom_corto 	= 	$_POST["nom_corto"]; 
			$fecha 		= 	$_POST["fecha"]; 
			$direccion 	= 	$_POST["direccion"]; 
			$correo 	= 	$_POST["correo"]; 
			$web 		= 	$_POST["web"]; 
			$usuario 	= 	$_POST["usuario"];
			$clave 		= 	$_POST["clave"];
			$admin 		= 	"0"; 

			//preparar la sentencia SQL

			$sql = 	sprintf("INSERT INTO equipos(nom_equi, nom_corto, fecha, direccion, correo, web, usuario, clave, admin)
			VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
			$nom_equi, $nom_corto, $fecha, $direccion, $correo, $web, $usuario,$clave, $admin);
			//comilla dobles analiza todo lo que está por dentro y las simples son mas rápidas
	
			header("location:torneos.php");

		}

			$res = mysqli_query($connection, $sql);

			mysqli_close($connection);

			
	}
 ?>