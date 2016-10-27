


















































	<?php
	{
		$SDE = $_REQUEST["SDE"];
		$SMensaje = $_REQUEST["SMensaje"];

		echo "<form method='post'>";
		$SQL = "select * from usuarios where ID <> $Usuario order by Usuario";
		$Resultado = Ejecutar($Conexion, $SQL);
		echo "<fieldset class='Formulario'><legend><strong>Busquedas en $Accion</strong></legend><div class= 'SEtiqueta_DE'>";
		if($Accion == "Recibidos") echo "De "; else echo "Para ";
		echo "</div><div class='SValor'><select name ='SDE' class='SDE'>";
		echo ("<option value=''></option>");
		while($RTemp =mysqli_fetch_array($Resultado))
		{
			echo("<option value='".$RTemp["ID"]."'");
			if($RTemp["ID"] == $SDE) echo(" selected ='selected'");
			echo(">".$RTemp["Usuario"]."</option>");
		}
		echo("</select></div>\n")
		?>

		<div class="SEtiqueta_MENSAJE">Mensaje</div><div class ="SValor"><input type="text" class= 'SMensaje' name = "SMensaje" value="<?php echo $SMensaje; ?>"/></div>
		<button class="btn btn-primary btn-block btn-large SValor" type= "submit" name ="Accion" value="<?=Accion?>">Buscar</button>
		<div class="btn btn-primary btn-block btn-large SValor" onclick = "javascript:location.href='?Accion=Recibidos'">Recibidos</div>
		<div class="btn btn-primary btn-block btn-large SValor" onclick = "javascript:location.href='?Accion=Enviados'">Enviados</div>

		</fieldset></form>

		<?php
		if($Accion = "Recibidos")
		{
			$SQL = "SELECT mensajes.ID as ID, Mensaje, usuarios.Usuario as Remitente, Fecha FROM mensajes left join usuarios on mensajes.usuario = usuarios.id";
			$SQL .= " where mensajes.Para = $Usuario ";
			if ($SDE !="") $SQL .= " and mensjes.usuario = $SDE ";
		
		}
		else
		{
			$SQL = "SELECT mensajes.ID as ID, Mensaje, usuarios.Usuario as Destinatario, Fecha FROM mensajes left join usuarios on mensajes.Para = usuarios.id";
			$SQL .= " where mensajes.Usuario = $Usuario ";
			if ($SDE !="") $SQL .= " and mensjes.para = $SDE ";
		}
		
		if ($SMensaje != "") $SQL .= " and Mensaje like '%$Mensaje%'";
		$SQL .= " order by id desc";
		
		$Resultado = Ejecutar($Conexion, $SQL);
		
		echo "<div class = 'Contenedor'><div class ='Lista'>";
		while ($Tupla = mysqli_fetch_array($Resultado, MYSQLI_ASSOC))
		{
			echo "<div class ='Tupla'>\n";
		}