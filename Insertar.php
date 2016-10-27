<meta charset="UTF8">
<?php
	//conexión base de datos
	include "Conexion.php";
	
	$Conexion = CrearConexion();

	if ($Conexion)
	{
		
		$Nombre = $_REQUEST["Nombre"];
		$Nif = $_REQUEST["Nif"];
		$Nacido = $_REQUEST["Nacido"];
		$Altura = $_REQUEST["Altura"];

		//Introducimos la consulta, recuerda ".=" concatena.
		$SQL = "insert into datos_personales ";
		$SQL .= " (Nombre, NIF, Nacido, Altura) values ";
		$SQL .= " ('$Nombre', '$Nif' , '$Nacido' , $Altura)";

		//Ejecutamos y si no es False, todo ha ido bien.
		if (!mysqli_query($Conexion, $SQL))
			echo "ERROR: " . mysqli_error($Conexion);
		else
			echo "Valores insertados correctamente";
	
		mysqli_close($Conexion);
	}
	else
	{
		die("Error al conectar con la base de datos!!!");
	}
?>