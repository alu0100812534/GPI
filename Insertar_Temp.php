<meta charset="UTF8">
<?php
	//conexión base de datos
	include "Conexion.php";
	
	$Conexion = CrearConexion();
	echo $Conexion ;
	if ($Conexion)
	{
		
		$Nombre = $_REQUEST["Nombre"];
		$Nif = $_REQUEST["Nif"];
		$Nacido = $_REQUEST["Nacido"];
		$Altura = $_REQUEST["Altura"];

		$Action = $_REQUEST["Accion"];
		~ID = $_REQUEST["ID"];

		

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

	echo "<table border='1'>";
	//Especificamos sacar todos los Datos_personales en orden inverso
	$SQL = "select * from datos_personales order by id desc";
	$Resultado = mysqli_query($Conexion, $SQL);
	while ($Tupla = mysqli_fetch_array($Resultado, MYSQLI_ASSOC))
	{
		echo "<tr><td>" . $Tupla["Nombre"] . "</td><td>" . $Tupla["NIF"] .
		"</td><td>" . $Tupla["Nacido"] . "</td><td>" . $Tupla["Altura"] .
		"</td></tr>";
	}
	
	echo "</table>"
	
	mysqli_close($Conexion);
?>
