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
	<link rel="stylesheet" type="text/css" href="s_admin.css">
	<title>Edicion para administradores</title>
</head>
<body background="../img/fondo2.png">
	

	<h2>Bienvenida administradora <?php echo $_SESSION["usuario"]; ?></h2>
	<a href="../views/registroadmin.php"><button >Registrar Torneo</button></a>
	<a href="../controllers/cerrar.php"><button >Cerrar Sesion</button></a>

	<?php

		$sql = "SELECT * FROM `administrador`"; //Me traigo la tabla admi

		if($result = mysqli_query($connection, $sql)){	

			while($row = mysqli_fetch_assoc($result)){ //Todas sus filas	
	?>
                
		      
                <table>
                    <tr> <!--tr filas-->
                    	<th colspan="2"> Torneo </th> <!--th titulo de las columnas-->
                    	<th colspan="2"> Opciones </th>
                    </tr> 
                    <tr>
                    	<td colspan="2"> <?php echo $row["nom_torneo"] ?> </td> <!--td: columnas, nom torneo-->
                    	<td colspan="2">

                    		<form method="post" action="detallesTorneo.php" id="de"> 

		      					<input class="info" type="hidden" name="nom_torneo" value="<?=$row["nom_torneo"]?>">

		      					<input class="info" type="image" src="../img/detalless.png" onmouseover="this.src='../img/detallesc.png';" onmouseout="this.src='../img/detalless.png'" width="30" height="30" name="" value="Detalles">

		      				</form>

		      				<form method="post" action="editarTorneo.php" id="ee"> 

		      					<input class="info" type="hidden" name="nom_torneo" value="<?=$row["nom_torneo"]?>">

		      					<input class="info" type="image" src="../img/editars.png" onmouseover="this.src='../img/editarc.png';" onmouseout="this.src='../img/editars.png'" width="30" height="30" name="" value="Editar">

		      				</form>

                    		<a href="../controllers/eliminarTorneo.php?id='<?=$row["id"]?>'"><input type="image" id="et" src="../img/eliminars.png" onmouseover="this.src='../img/eliminarc.png';" onmouseout="this.src='../img/eliminars.png'" width="30" height="30" class="rojo"></a>
                    	</td>
                    </tr>

                    <tr>
                    	<th > Nombre del Equipo </th>
		        		<th> Categoria </th> 
		      	 		<th> Cantidad de participantes </th>
		      	 		<th> Opciones </th>
		      		</tr>
		      		<?php
		      			$n = $row["nom_torneo"];
		      			$sql2 = "SELECT * FROM `torneo` WHERE nom_torneo='$n'";
		      			if($result2 = mysqli_query($connection, $sql2)){
		      				while($row2 = mysqli_fetch_assoc($result2)){
		      					$u = $row2["usuario"];
		      					$sql3 = "SELECT * FROM `equipos` WHERE usuario='$u'";
		      					if($result3 = mysqli_query($connection, $sql3)){
		      						while($row3 = mysqli_fetch_assoc($result3)){
		      		?>	
		      		<tr>
		      			<td ><?php echo $row3["nom_equi"]?></td>
		      			<td ><?php echo $row2["categoria"]?></td>
		      			<td ><?php echo $row2["participantes"]?></td>
		      			<td >
		      				<form method="post" action="detallesEquipo.php" > 

		      					<input class="info" type="hidden" name="nom_equi" value="<?=$row3["nom_equi"]?>">

		      					<input class="info" type="image" src="../img/detalless.png" onmouseover="this.src='../img/detallesc.png';" onmouseout="this.src='../img/detalless.png'" width="30" height="30" name="" value="Detalles">

		      				</form>

		      				<form method="post" action="editarEquipo.php" > 

		      					<input class="info" type="hidden" name="nom_equi" value="<?=$row3["nom_equi"]?>">

		      					<input class="info" type="image" src="../img/editars.png" onmouseover="this.src='../img/editarc.png';" onmouseout="this.src='../img/editars.png'" width="30" height="30" name="" value="Editar">

		      				</form>
		      				
                    		
                    		<a href="../controllers/eliminarEquipo.php?id='<?=$row3["id"]?>'"><input type="image"  src="../img/eliminars.png" onmouseover="this.src='../img/eliminarc.png';" onmouseout="this.src='../img/eliminars.png'" width="30" height="30" class="rojo"></a>
                    	</td>
		      		</tr>
		      		<?php
		      						}
		      					}
		      				}
		      			}
		      		?>
                </table>
	<?php

		echo "<br>";

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