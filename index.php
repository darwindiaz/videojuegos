<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>GAMEX.COM</title>
	<link rel="stylesheet" href="css/main.css">
	<img src="./imag/logo.jpg" height="150" width="1360">
</head>
<body>
	<?php
	//conexion a base de datos
		$conexion= mysql_connect("localhost","root");
		mysql_select_db("tiendavideojuegos",$conexion);

		//consulta a base de datos
		$consulta= mysql_query("SELECT * FROM `videojuego`");
		$fil=mysql_num_rows($consulta);

		//tabla de contenido
		echo  '<table>';
			//impresion de datos
			for ($i=0; $i < $fil; $i++) {
				echo '<tr>';
				echo '<td>';
					echo '<img src="./imag/'.mysql_result($consulta, $i,"consola_v").'.jpg" height="150" width="200">';
					echo '</td>';
				for ($j=0; $j < 5; $j++) { 						
					echo '<td>';
					echo "<div id='id1' align='center	'>".mysql_result($consulta, $i,"nombre_v")."</div>";
					//boton imagen consulta a base de datos
					echo '<a href="nav.php" target="_self"><button><img src="./imag/'.mysql_result($consulta, $i,"nombre_v").'.jpg" height="150" width="200"></button></a>';
					//trae datos necesarios de la base
					echo "<div id='id' align='center'>"."Stock: ".mysql_result($consulta, $i,"cantidad_v")."</div>";
					echo "<div id='id' align='center'>"."Valor: $$".mysql_result($consulta, $i,"precio_v")."</div>";
					echo '</td>';
					$i++;
				}
				$i--;
				echo '</tr>';
			}
		echo '</table>';	
	?>
</body>
</html>
