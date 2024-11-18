<?php	
    /*
     * con la clase DOMDocument validamos empleados.xml usando
     * el esquema departamento.xsd
     */
    $path ="./xml/";
    $archivoXML = "empleados.xml";
    $archivoXSD = "departamento.xsd";
    $dept = new DOMDocument();
	$dept->load( $path . $archivoXML );
	$res = $dept->schemaValidate($path . $archivoXSD);
	if ($res){ 
	   echo "El fichero es válido";
	} 
	else { 
	   echo "Fichero no válido"; 
	}