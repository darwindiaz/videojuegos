<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>GAMEX.COM</title>
	<link rel="stylesheet" href="css/mainindex.css">
	<img src="./imag/logo.jpg" height="150" width="1360">
</head>
<body>
<form action="nav.php" method="get">
	<?php
	error_reporting(0);
	if($_GET['ac']&$_GET['iden']&$_GET['nomb']&$_GET['tele']){
		$consulta2= mysql_query("SELECT * FROM `cliente`");
		$ncli=mysql_num_rows($consulta2);
		
		if($ncli==0){
			$sig=mysql_query("SELECT nombre_c FROM cliente WHERE cedula_c=".$_GET['iden']);
			$nsig=mysql_num_rows($sig);
			if($nsig!=0){
				$consulta3=mysql_query("INSERT INTO cliente (cedula_c, nombre_c,telefono_c) VALUES (".$_GET['iden'].",'".$_GET['nomb']."','".$_GET['tele']."')");
			}
		}
		echo '<script languaje="javascript"src="js/alertas.js> </script>"';
		$ima=$_GET['imagen2'];
		echo $ima;
		mysql_query("INSERT INTO alquiler (id_v,cedula_c) VALUES(".$ima.",".$_GET['iden'].")");
	}
	?>
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
					echo '<a href="nav.php" target="_self"><input type="image" name="imagen" value="'.mysql_result($consulta, $i,"id_v").'" src="./imag/'.mysql_result($consulta, $i,"nombre_v").'.jpg" height="150" width="200"></a>';
					//trae datos necesarios de la base
					echo "<div id='id' align='center'>"."Stock: ".mysql_result($consulta, $i,"cantidad_v")."</div>";
					echo "<div id='id' align='center'>"."Valor: €€".mysql_result($consulta, $i,"precio_v")."</div>";
					echo '</td>';
					$i++;
				}
				$i--;
				echo '</tr>';
			}
		echo '</br>';
		echo '</table>';	
	?>		
	</form>
	</body>
</html>
