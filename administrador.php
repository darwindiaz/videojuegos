<?php   include("plantillas/conexion.php");
        include("plantillas/header.php"); 
        ?>
<link rel="stylesheet" href="css/style.css">

<?php

if(isset($_SESSION["session_username"])){
header("Location: principal.php");
}

if(isset($_POST['video'])){

if(!empty($_POST['nomb']) && !empty($_POST['precio'])&& !empty($_POST['cons'])&& !empty($_POST['cat'])&& !empty($_POST['cant'])&& !empty($_POST['desc'])) {
    $nomb=$_POST['nomb'];
    $precio=$_POST['precio'];
    $cons=$_POST['cons'];
    $cat=$_POST['cat'];
    $cant=$_POST['cant'];
    $desc=$_POST['desc'];

    include "plantillas/conexion.php";
    $consulta="INSERT INTO `videojuego`(`nombre_v`, `descripcion_v`, `cantidad_v`, `precio_v`, `consola_v`, `id_cat`, `id_adm`) VALUES ('".$nomb."','".$desc."',".$cant.",".$precio.",'".$cons."',".$cat.",".$_SESSION["session_id"].")";  
    $filas=mysqli_query($conexion,$consulta);
    $numrows=mysqli_num_rows($filas);
    ?>
    <div class="container mlogin">
        <div id="login">
            <h1>REGISTRO DE VIDEOJUEGO</h1>
            <form name="video" id="video" action="ingresaruser.php" method="POST">
                <p>
                    <label for="user_login">Nombre<br />
                    <input type="text" name="nomb" id="nomb" class="input" value="" size="20" placeholder="Ingrese el Nombre" /></label>
                </p>
                <p>
                    <label for="user_login">Precio<br />
                    <input type="text" name="precio" id="precio" class="input" value="" size="50" placeholder="Ingrese el Precio" /></label>
                </p>
                <p>
                    <label for="user_login">Cosnola<br />
                    <select name="cons">
                    <option>Pc</option>
                    <option>X360</option>
                    <option>ps3</option>
                    <option>ps4</option>
                    </select>
                </p>
                <p>
                    <label for="user_login">Categoria<br />
                    <select name="cat">
                    <option>Autos</option>
                    <option>Aventura</option>
                    <option>Accion</option>
                    <option>Deportes</option>
                    </select>
                </p>
                <p>
                    <label for="user_login">Cantidad<br />
                    <input type="text" name="cant" id="cant" class="input" value="" size="50" placeholder="Ingrese Cantidad Stock" /></label>
                </p>
                <p>
                    <label for="user_login">Descripcion<br />
                    <textarea name="desc" rows="10" cols="43" placeholder="Ingrese la Descripcion"></textarea>
                </p>
                <p>
                    <label for="user_login">Imagen<br />
                    <input name="foto" type="file" id="foto" size="1" style=""/> 
                </p>


                <p class="submit">
                    <input type="submit" name="regis" class="button" value="Registrar" />
            </form>

        </div>

    </div>
	
	<?php include("plantillas/footer.php"); ?>
	
	<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
	