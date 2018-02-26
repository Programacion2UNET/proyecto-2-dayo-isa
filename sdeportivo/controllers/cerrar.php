<?php 
	
	session_start();

	if(isset($_SESSION["usuario"])){

		unset($_SESSION["usuario"]); //liberando memoria
	}

	header("location:../index.php");
 ?>