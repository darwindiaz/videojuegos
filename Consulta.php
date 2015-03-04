<?php
class ClaseUno
    {
        public function Bienvenida($nombre)
       {
             return "Hola, ".$nombre;
       }
    }

    class ClaseDos extends ClaseUno
    {
        public function LlamarBienvenida()
       {
             return  ClaseUno:: Bienvenida('Yal Publicidad') ;
       }
    }

class imprimir{
	function impri($text){
			return $text;
	}
}

class C1{
	function consultarall($tabla){
		$consulta=mysql_query("SELECT * FROM ".$tabla);
		return $consulta;
	}
}

class C2{
	function calcularcol($consul){
		$fil=mysql_num_rows($consul);
		return $fil;
	}
}
class C3{
	function consultarvar($consul,$col,$nomcol){
		$resul=mysql_result($consul,$col,$nomcol);
		return $resul;
	}
}


?>