<?php 	include("plantillas/conexion.php");
		include("plantillas/header.php"); ?>

<link rel="stylesheet" href="css/style.css">

	<?php

if(isset($_POST["registrar"])){


if(!empty($_POST['nombre']) && !empty($_POST['telefono']) && !empty($_POST['correo']) && !empty($_POST['codigo'])&& !empty($_POST['documento'])) {
	$nombre=$_POST['nombre'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];
	$codigo=$_POST['codigo'];
	$docum=$_POST['documento'];
	

	/*$consulta= mysql_query("SELECT * FROM `videojuego`");
	$fil=mysql_num_rows($consulta);*/
			


	include "plantillas/conexion.php";
	$consulta= "SELECT correo_c,codigo_c FROM cliente WHERE correo_c='$correo' AND codigo_c= '$codigo'";
	var_dump($_POST);
	//echo $consulta;	
	$fila=mysqli_query($conexion,$consulta);
	$numrows=mysqli_num_rows($fila);
	echo $numrows;

	if($numrows==0)
	{
		$sql="INSERT INTO cliente VALUES($docum,'$nombre','$telefono', '$correo', '$codigo')";
		echo $sql;
		$result=mysqli_query($conexion,$sql);
		$result;
		if($result){
		 $message = "Cuenta Correctamente Creada";
	} else {
		 $message = "Error al ingresar datos de la informacion!";
	}

	} else {
	 $message = "El nombre de usuario ya existe! Por favor, intenta con otro!";
	}

} 	else {
	 $message = "Todos los campos no deben de estar vacios!";
}
}
?>

<?php if (!empty($message)) {echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} ?>
	
<div class="container mregister">
			<div id="login">
	<h1>REGISTRAR</h1>
<form name="registerform" id="registerform" action="registro.php" method="post">
	<p>
		<label for="user_login">Nombre Completo<br />
		<input type="text" name="nombre" id="nombre" class="input" size="50" value="" placeholder="Ingrese su Nombre" /></label>
	</p>
	
	<p>
		<label for="user_pass">Documento<br />
		<input  type="text" name="documento" id="documento" class="input" value="" size="20" placeholder="Ingrese su Documento" /></label>
	</p>
	
	<p>
		<label for="user_pass">Telefono<br />
		<input  type="text" name="telefono" id="telefono" class="input" value="" size="20" placeholder="Ingrese su Telefono"/></label>
	</p>

	<p>
		<label for="user_pass">Correo<br />
		<input name="correo" id="correo" class="input" value="" size="50" placeholder="Ingrese su Correo"/></label>
	</p>
	
	<p>
		<label for="user_pass">Contraseña<br />
		<input type="password" name="codigo" id="codigo" class="input" value="" size="20" placeholder="Ingrese su Contraseña"/></label>
	</p>	
	

		<p class="submit">
		<input type="submit" name="registrar" id="registrar" class="button" value="Registrar" />
	</p>
	
	<p class="regtext">Ya tienes una cuenta? <a href="ingresaruser.php" >Entra Aquí!</a>!</p>
</form>
	
	</div>
	</div>
	
	<?php include("plantillas/footer.php"); ?>