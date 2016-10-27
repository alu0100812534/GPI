<meta charset="UTF8">
<?php
	function CrearConexion()
	{
		$Servidor = "localhost";
		$Usuario = "root";
		$Clave = "";
		$BaseDatos = "prueba";
	
	// Creamos la conexión y almacenamos el handle
	
		$Conexion = new mysqli($Servidor, $Usuario, $Clave, $BaseDatos);

		//Comprobamos que la conexion es válida
	
		if($Conexion->connect_error) die("Fallo!! " . $Conexion->connect_error);
		echo "Houston la misión ha sido un exito <br />" ;
		 return $Conexion;
	}
?>
