<?php
$ex=$_POST['genero'];
echo "<form action='principal.php' name='ext' method='POST'>
		<input name='extra' type='hidden' value='$ex'/>
		</form>
		<script type='text/javascript'>
			document.ext.submit();
		</script>";
	
?>