<meta charset="UTF8">
<?php
	//conexión base de datos
	
	$Servidor = "localhost";
	$Usuario = "root";
	$Clave = "";
	$BaseDatos = "Prueba";
	
	//Creamos la conexión y alamacenamos el handle

	$Conexion = new mysqli ($Servidor, $Usuario, $Clave , $BaseDatos);

	//Comprobar Conexion

	if($Conexion->connect_error) die("FALLO!! " . $Conexion->connect_error);
	echo "La conexion peto el ano bien fuerte :-D<br />";


	//Introducimos la consulta, recuerda ".=" concatena.
	$SQL = "insert into datos_personales ";
	$SQL .= " (id,Nombre, NIF, Nacido, ALtura) values ";
	$SQL .= " (25,'Marco Antoni Ferrer', '56789432D' , '2003-02-08' , 1.67)";

	//Ejecutamos y si no es False, todo ha ido bien.
	if (!mysqli_query($Conexion, $SQL))
		echo "ERROR: " . mysqli_error($Conexion);
	else
		echo "Valores insertados correctamente";
	
	mysqli_close($Conexion);
?>