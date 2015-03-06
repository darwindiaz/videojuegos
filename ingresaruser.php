<?php
session_start();
?>

<?php   include("plantillas/conexion.php");
        include("plantillas/header.php"); 
        ?>
<link rel="stylesheet" href="css/style.css">

<?php

if(isset($_SESSION["session_username"])){
 //echo "Session is set"; // for testing purposes
header("Location: principal.php");
}

if(isset($_POST['login'])){

if(!empty($_POST['correo']) && !empty($_POST['codigo'])&& !empty($_POST['docum'])) {
    $correo=$_POST['correo'];
    $codigo=$_POST['codigo'];
    $docum=$_POST['docum'];

    include "plantillas/conexion.php";
    $consulta="SELECT id_c,correo_c,codigo_c,nombre_c FROM cliente WHERE id_c=$docum AND correo_c='$correo' AND codigo_c= '$codigo'";  
    $filas=mysqli_query($conexion,$consulta);
    $numrows=mysqli_num_rows($filas);
    if($numrows!=0)
    {
    while($row=mysqli_fetch_assoc($filas))
    {
    $dbusername=$row['correo_c'];
    $dbpassword=$row['id_c'];
    }

    if($correo == $dbusername && $docum == $dbpassword)

    {

    $_SESSION['session_username']=$correo;
    $_SESSION['session_id']=$docum;

    /* Redirect browser */
   header("Location:principal.php");

    }
    } else {

 $message =  "Nombre de usuario ó contraseña invalida!";
    }

} else {
    $message = "Todos los campos son requeridos!";
}
}
?>
    <div class="container mlogin">
        <div id="login">
            <h1>VIDEOJUEGO</h1>
            <form name="login" id="login" action="ingresaruser.php" method="POST">
                <p>
                    <label for="user_login">Documento<br />
                    <input type="text" name="docum" id="docum" class="input" value="" size="20" placeholder="Ingrese su Documento" /></label>
                </p>
                <p>
                    <label for="user_login">Correo<br />
                    <input type="text" name="correo" id="correo" class="input" value="" size="50" placeholder="Ingrese su Correo" /></label>
                </p>
                <p>
                    <label for="user_pass">Contraseña<br />
                    <input type="password" name="codigo" id="codigo" class="input" value="" size="20" placeholder="Ingrese su Contraseña"/></label>
                </p>
                <p class="submit">
                    <input type="submit" name="login" class="button" value="Entrar" />
                </p>
                <p class="regtext">No estas registrado? <a href="registro.php" >Registrate Aquí</a>!</p>

                </p>
                <p class="madm"><a href="administrador.php" >ADMINISTRADOR</a>!</p>
            </form>

        </div>

    </div>
	
	<?php include("plantillas/footer.php"); ?>
	
	<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
	