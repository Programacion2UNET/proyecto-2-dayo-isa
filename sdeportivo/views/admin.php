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
	<style type="text/css">
		.info{
			background-color: #008CBA;
			border-radius: 4px;
		}
		.rojo{
			background-color: #f44336;
			border-radius: 4px;
		}
		.verde{
			background-color: #4CAF50;
		}
		table{
			border-collapse: collapse;
			border: 2px solid black;
		}
		td, th{
			text-align: center;
			vertical-align: middle;
			border: 1px solid black;
		}	
		th{
			font-size: 20px;
			background-color: lightblue;
		}
		button{
			width: 150px;
			height: 30px;
		}
		
	</style>

	<h2>Bienvenida admistradora <?php echo $_SESSION["usuario"]; ?></h2>
	<a href="../views/registroadmin.php"><button class="verde">Registrar Torneo</button></a>
	<a href="../controllers/cerrar.php"><button class="rojo">Cerrar Sesion</button></a>

	<?php

		$sql = "SELECT * FROM `administrador`"; //Me traigo la tabla admi

		if($result = mysqli_query($connection, $sql)){	

			while($row = mysqli_fetch_assoc($result)){ //Todas sus filas	
	?>
                
		      
                <table>
                    <tr>
                    	<th colspan="2"> Torneo </th>
                    	<th colspan="2"> Opciones </th>
                    </tr> 
                    <tr>
                    	<td colspan="2"> <?php echo $row["nom_torneo"] ?> </td> 
                    	<td colspan="2">
                    		<a href="detallesTorneo.php?nom_torneo='<?=$row["nom_torneo"]?>'"><button class="info">Detalles</button></a> 
                    		<a href="editarTorneo.php?nom_torneo='<?=$row["nom_torneo"]?>'"><button class="info">Editar</button></a> 
                    		<a href="../controllers/eliminarTorneo.php?id='<?=$row["id"]?>'"><button class="rojo">Eliminar</button></a>
                    	</td>
                    </tr>

                    <tr>
                    	<th> Nombre del Equipo </th>
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
		      			<td><?php echo $row3["nom_equi"]?></td>
		      			<td><?php echo $row2["categoria"]?></td>
		      			<td><?php echo $row2["participantes"]?></td>
		      			<td>
		      				<a href="detallesEquipo.php?nom_equi='<?=$row3["nom_equi"]?>'"><button class="info">Detalles</button></a> 
                    		<a href="editarEquipo.php?nom_equi='<?=$row3["nom_equi"]?>'"><button class="info">Editar</button></a> 
                    		<a href="../controllers/eliminarEquipo.php?id='<?=$row3["id"]?>'"><button class="rojo">Eliminar</button></a>
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