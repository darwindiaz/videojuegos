<!DOCTYPE html>
<html lang="es-Es">
<head>
	<meta charset="utf-8">
	<title>GAMEX.COM</title>
	<link rel="stylesheet" href="css/main.css">
	<img src="./imag/logo.jpg" height="150" width="1360">

</head>
<body>
	<?php
	error_reporting(0);
	$i=$_GET['imagen']-1;
	?>

	<form action="index.php" method="post">
	<table>
		<?php

		$conexion= mysql_connect("localhost","root");
		mysql_select_db("tiendavideojuegos",$conexion);

		//consulta a base de datos
		$consulta= mysql_query("SELECT * FROM `videojuego`");
		$fil=mysql_num_rows($consulta);

		echo '<tr><td><h2><div id=formu align="center"><input type="image" name="imagen2" value="'.mysql_result($consulta, $i,"id_v").'" src="./imag/'.mysql_result($consulta, $i,"nombre_v").'.jpg" height="400" width="1100"></div></h2>';
		echo '<td rowspan="2"><h1 align="center">FORMATO DE ALQUILER</h1>';
		echo '<input type="text" name="iden" id="iden" placeholder="Identificacion"/>';
		echo '<input type="text" name="nomb" placeholder="Nombre"/>';
		echo '<input type="text" name="tele" placeholder="Telefono"/><br>';
		echo '<input type="submit" name ="ac" value ="ALQUILAR"/>';
		?>
		<?php	
		echo '<tr><td><div id="id" align="center">'.mysql_result($consulta, $i,"nombre_v").'</div>';
		echo '<div id="id" align="center">Descripcion: '.mysql_result($consulta, $i,"descripcion_v").'</div>';
		echo '<div id="id" align="center">Consola: '.mysql_result($consulta, $i,"consola_v").'</div>';
		echo '<div id="id" align="center">Stock: '.mysql_result($consulta, $i,"cantidad_v").'</div>';
		echo '<div id="id" align="center">Valor: €€ '.mysql_result($consulta, $i,"precio_v").'</div></td></tr>';
	
		?>
		</table>
	</form>

</body>
</html>
