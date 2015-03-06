<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>GAMEX.COM</title>
	<link rel="stylesheet" href="css/stylej.css">
	<div class="imaenc">
		<img src="./imag/logo.jpg" >
	</div> 
</head>
<body>
	<div>
		<?php
			include "plantillas/conexion.php";
			$imagen=$_POST['imagen'];
			$consulta="SELECT * FROM  videojuego WHERE id_v='$imagen'";
			$ccon=mysqli_query($conexion,$consulta);
			while($col=mysqli_fetch_assoc($ccon)){
				$catego="SELECT nombre_cat FROM categorias WHERE id_cat=".$col['id_cat'];
				$ccon2=mysqli_query($conexion,$catego);
				$col2=mysqli_fetch_assoc($ccon2);
				echo '<form action="actualizar.php" method="POST">
						<div id="contenedor">'; 
					echo '<div id="derecha" align="center"><embed src="video/'.$col["id_v"].'.avi" width="500" height="300"></div>';
					echo '<div id="izquierda">
							  <div id="nombre_v">'.$col["nombre_v"].'</div>
							  <div id="texto">Precio €€: '.$col["precio_v"].'</div>
							  <div id="texto">Categoria : '.$col2['nombre_cat'].'</div>
							  <div id="texto">Descripcion : '.$col['descripcion_v'].'</div>
							  <div id="fecha"><input type="date" value=""></div>
							  <input type="hidden" name="nomb" id="nomb" value="'.$col["nombre_v"].'">
							  <input tipe
							  <input type="submit" value="Alquilar"/></from>
					  	  </div>';
				    ;
				 
			}
		?>
	</div>
</body>
</html>