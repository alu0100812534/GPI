<meta charset="UTF8">
<?php
	//conexi�n base de datos
	 include "Conexion.php";
	
	$Conexion = CrearConexion();
	if ($Conexion)
	{
		
		$Nombre = $_REQUEST["Nombre"];
		$NIF = $_REQUEST["NIF"];
		$Nacido = $_REQUEST["Nacido"];
		$Altura = $_REQUEST["Altura"];

       /* $Accion = $_REQUEST["Accion"];
        $ID = $_REQUEST["ID"];

        if ($Accion == "Eliminar" && $ID != "")
        {
           $SQL = "delete from Datos_Personales where id = $ID";
        }
        */
		//Introducimos la consulta, recuerda ".=" concatena.
		$SQL = "insert into datos_personales ";
		$SQL .= " (Nombre, NIF, Nacido, Altura) values ";
		$SQL .= " ('$Nombre', '$NIF' , '$Nacido' , $Altura)";

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
	//Especificamos sacar todos los datos_personales en orden inverso
	$SQL = "select * from datos_personales order by id desc";
	$Resultado = mysqli_query($Conexion, $SQL);
	/*while ($Tupla = mysqli_fetch_array($Resultado, MYSQLI_ASSOC))
	{
		echo "<tr><td>" . $Tupla["Nombre"] . "</td><td>" . $Tupla["NIF"] .
		"</td><td>" . $Tupla["Nacido"] . "</td><td>" . $Tupla["Altura"] .
		"</td></tr>";
	}

	echo "</table>";
  */
	mysqli_close($Conexion);
?>
