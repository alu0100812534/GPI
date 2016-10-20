<?php
	include "Conexion.php"
	$Conexion = CrearConexion();
	$Nombre = $NIF = $Nacido =$Altura = "";
	$Boton ="Insertar";
	if($Conexion){
		$Accion = $_REQUEST["Accion"];
		$ID = $_REQUEST["ID"];
		if($Accion == "Editar" && $ID != ""){
			$SQL = "select * from Datos_Personales where Id = $ID";
			$Resultado = mysqli_query($Conexion, $SQL);
			if(!$Resultado) echo "MAL";
			$Tulpa = mysqli_fetch_array($Resultado, MYSQLI_ASSOC);
			$Nombre = $Tulpa["Nombre"];
			$NIF = $Tulpa["NIF"];
			$Nacido = $Tulpa["Nacido"];
			$Altura = $Tulpa["Altura"];
			$Boton = "Modificar";
		}
	}
?>
<html lang="en">
	<link rel="stylesheet" type="text/css" href="theme.css">
	<head><title>Formulario</title><head>
	<body>
		<h1>Formulario</h1>
		<form action="insertar.php" method="post">
			Nombre: <input type=<?php echo $Nombre;?> name="Nombre"><br>
			NIF: <input type=<?php echo $NIF;?> name="NIF"><br>
			Fecha de nacimiento: <input type=<?php echo $Nacido;?> name="Nacido"><br>
			Altura: <input type=<?php echo $Altura;?> name="Altura"><br>
			<input type="submit" class="btn btn-primary" value=<?php echo $Boton;?>>
		</form>
	</body>
</html>
