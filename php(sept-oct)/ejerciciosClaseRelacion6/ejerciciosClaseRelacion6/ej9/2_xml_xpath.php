<?php
    $archivoXML = "./xml/empleados.xml";
	$datos = simplexml_load_file($archivoXML);
        /*
         * el método xpath permite seleccionar elementos usando una expresión
         */

	$edades = $datos->xpath("//edad");
	foreach($edades as $valor){
		print_r($valor);
		echo "<br>";
	}