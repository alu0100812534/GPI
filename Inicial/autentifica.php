<?php
	include "Conexion.php";
	$Conexion = CrearConexion();
	
	$Usuario = $_REQUEST["Usuario"];
	$Clave = $_REQUEST["Clave"];
	$SQUL = " Select ID, Usuario from usuarios where Usuario = '$Usuario' and Clave ='$Clave'";
	
	$Resultado = mysqli_query($Conexion, $SQL);
	$Tupla = mysqli_fetch_array($Resultado ,MYSQLI_ASSOC);
	if ($Tupla["ID"] != ""){
		session_start();
		$_SESSION["USUARIO_ID"] = $Tupla["ID"];
		$_SESSION["USUARIO_NOMBRE"] = $Tupla["Usuario"];
		header('Location: lista.php?Tipo=Recibidos');
	}
	else{
		header('Location: index.html');
	}
?>