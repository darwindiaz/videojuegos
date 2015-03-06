<?php
var_dump($_POST);
include "plantillas/conexion.php";
$dato=$_POST['nomb'];
$consulta1="SELECT cantidad_v FROM videojuego WHERE nombre_v='".$dato."'";
$ccon=mysqli_query($conexion,$consulta1);
$col=mysqli_fetch_assoc($ccon);
$varnew=$col['cantidad_v']-1;
$consulta2="UPDATE videojuego SET cantidad_v=".$varnew." WHERE nombre_v='".$dato."'";
$ccon=mysqli_query($conexion,$consulta2);
echo $consulta2;
header("Location:principal.php");
?>
