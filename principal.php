<!DOCTYPE html>
<html lang="Es">
<head>
	<meta charset="utf-8">
	<title>GAMEX.COM</title>
	<link rel="stylesheet" href="css/stylep.css">
	<div class="imaenc">
		<img src="./imag/logo.jpg" >
	</div> 
</head>
<body>
<div class="menu">
	<ul>
		<li><a href="">GNRAL</a></li>
		<li><a href="">AUTOS</a></li>
		<li><a href="">AVENTUR</a></li>
		<li><a href="">ACCION</a></li>
		<li><a href="">DEPORTE</a></li>
	</ul>
</div>
<div class="gen">
	<form action="videojuego.php" method="get">
		<div class="cuerpo">
		<table>
		<?php
			include "Consulta.php";
			include "conexion.php";
			$consulta= mysql_query("SELECT * FROM `videojuego`");
			$fil=mysql_num_rows($consulta);
			for ($i=0; $i < $fil; $i++) {
				echo '<tr>';
				echo '<td>';
					echo '<img src="./imag/'.mysql_result($consulta, $i,"consola_v").'.jpg" height="150" width="200">';
					echo '</td>';
				for ($j=0; $j < 5; $j++) { 						
					echo '<td>';
					echo "<div  class='texto' align='center	'>".mysql_result($consulta, $i,"nombre_v")."</div>";
					//boton imagen consulta a base de datos
					echo '<a class="imavj" href="videojuego.php" target="_self"><input type="image" name="imagen" value="'.mysql_result($consulta, $i,"id_v").'" src="./imag/'.mysql_result($consulta, $i,"nombre_v").'.jpg" height="150" width="200"></a>';
					//trae datos necesarios de la base
					echo "<div class='texto' >"."Stock: ".mysql_result($consulta, $i,"cantidad_v")."</div>";
					echo "<div class='texto' align='center'>"."Valor: €€".mysql_result($consulta, $i,"precio_v")."</div>";
					echo '</td>';
					$i++;
				}
				$i--;
				echo '</tr>';
			}
		?>
		</table>
		</div>
	</form>
</div>
</body>
</html>
