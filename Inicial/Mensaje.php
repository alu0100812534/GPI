<?php
	include "Conexion.php";
	$Conexion = CrearConexion();
	
	echo "<h2> Bienvenido/a $Nombre</h2>"
	
	if ($Conexion){
		$Accion = $_REQUEST["Accion"];
		$ID = $_REQUEST["ID"];
		
		if($Accion == "Editar" && $ID != ""){
			$SQL = "select * from mesajes where Id = $ID";
			$Resultado = Ejecutar($Conexion, $SQL);
			$Tupla = mysqli_fetch_array($Resultado, MYSQLI_ASSOC);
			$Fecha = $Tupla["Fecha"];
			$De = $Tupla["Usuario"];
			$Para = $Tupla["Para"];
			$Mensaje = $Tupla["Mensaje"];
			$Boton ="Modficar";
		}
	}
?>
<html>
	<head>
		<title>Sistema de mensajeria</title>
		<link rel="stylesheet" type="text/css" href="theme.css">
		<link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">
	</head>
	<body>
		<form action = "Lista.php" method="post">
			<?php
				$SQL = "select * from usuarios where ID <> $Usuario order by Usuario asc";
				$Resultado = Ejecutar($Conexion, $SQL);
				echo "<fieldset class = 'Formulario'><legend><strong>Mensaje</strong></legend><div class ='Etiqueta'>Para</div><div class ='Valor'><select name= 'Para' class ='Para'>";
				while ($RTemp = mysqli_fetch_array($Resultado)){
					echo("<option value ='".$RTemp["ID"]."'");
					if($RTemp["ID"] == $Para) echo(" selecte ='selected'");
					echo (">".$RTemp["Usuario"]."</option>");
				}
				echo("</select></div>\n");
			?>
			<div class = 'Separador'>&nbsp;</div>
			<div class = "Etiqueta"> Mensaje</div><div class= "Valor"><textarea class = 'TA_Mensaje' name = "Mensaje"><?php echo $Mensaje; ?></textarea></div>
			<input type = "hidden" name= "ID" value="<?php echo $ID;?>">
			<div class='Separador'>&nbsp;</div>
			<div><button class = "btn btn-primary btn-block btn-large" type="submit" name="Accion" value="<?php echo $Boton; ?>"><?php echo $Boton; ?></button></div>
			</fieldset>
		</form>
	</body>
</html>