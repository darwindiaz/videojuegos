<?php
session_start();
if(!isset($_SESSION["session_username"])) {
 header("location:ingresaruser.php");
} else {
?>
 
 <div id="welcome">
 	<table>
 		<tr>
 		<td><div id="welc"><h2>Bienvenido, <span><?php echo $_SESSION['session_username'];?></span></h2></div></td>
 		<div id="botona"><td><p><a id="his" href="historial.php" name="histo" value="">Tus Prestamos</a></p></td>
 		<td><p><a id="sesion" href="cerrarsesion.php">Cerrar Sesion</a></p></td></div>
 		</tr>
 	</table>	
</div>

<?php
	include("plantillas/header.php");
?>

<link rel="stylesheet" href="css/stylep.css">
<form name="categorias" action="extra.php" method="POST">
<div class="menu">
	<ul>
		<li><a target="_self" ><input type="image" name="genero" value="GNRAL" /></a></li>
		<li><a target="_self" ><input type="image" name="genero" value="DEPORTES"></a></li>
		<li><a target="_self" ><input type="image" name="genero" value="AVENTURA"></a></li>
		<li><a target="_self" ><input type="image" name="genero" value="ACCION"></a></li>
		<li><a target="_self" ><input type="image" name="genero" value="AUTOS"></a></li>
	</ul>
</div>
</form>

<?php
	$consulta="SELECT * FROM videojuego";

	if(!empty($_POST['extra'])){
		
		$busqueda=$_POST['extra'];

		if($busqueda=="AUTOS"){
			$consulta= "SELECT * FROM videojuego WHERE id_cat=1";
		}
		if($busqueda=="ACCION"){
			$consulta= "SELECT * FROM videojuego WHERE id_cat=3";
		}
		if($busqueda=="AVENTURA"){
			$consulta= "SELECT * FROM videojuego WHERE id_cat=2";
		}
		if($busqueda=="DEPORTES"){
			$consulta= "SELECT * FROM videojuego WHERE id_cat=4";
		}
		if($busqueda=="GNRAL"){
			$consulta= "SELECT * FROM videojuego";
		}
	}
?>

<div class="gen">
	<form action="videojuego.php" method="post">
		<div class="cuerpo">
		<table name="tall">
		<?php
			include "plantillas/conexion.php";
			$ccon=mysqli_query($conexion,$consulta);
			$fil=mysqli_num_rows($ccon);
			$i=5;
			$j=0;
			while ($col=mysqli_fetch_assoc($ccon)) {
			//for ($i=0; $i < $fil; $i++) {
				if($i % '5' == 0){
					echo '<tr>';
				}				
					echo '<td>';
					//boton imagen consulta a base de datos
					echo '<a class="imavj" target="_self"><input type="image" name="imagen" value="'.$col["id_v"].'" src="./imag/'.$col["nombre_v"].'.jpg" height="150" width="200"></a>';
					//trae datos necesarios de la base
					echo "<div  class='texto' align='center'>".$col["nombre_v"]."</div>";
					echo "<div class='texto' align='center'>"."Stock: ".$col["cantidad_v"]."</div>";
					echo "<div class='texto' align='center'>"."Valor: €€".$col["precio_v"]."</div>";
					echo '</td>';
					$i++;
					$j++;
				if($j == 5){
					echo '</tr>';
				}
			}
		?>
		</table>
		</div>
	</form>
</div>

<?php include("plantillas/footer.php"); }?> 