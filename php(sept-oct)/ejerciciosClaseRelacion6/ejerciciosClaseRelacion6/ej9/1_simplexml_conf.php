<?php
	/*
         simplexml_load_file lee un fichero XML y devuelve un objeto de la clase
         SimpleXMLElement. El fichero se manipula a través de este objeto
         */
$archivoXML = "./xml/empleados.xml";
if (file_exists($archivoXML)) {
    $datos = simplexml_load_file($archivoXML);
    echo "<br>";
    if ($datos === false) {
        echo "Error al leer el fichero";
    } else {
        /**  Lo recorremos como un array y obtenemos los hijos del elemento raiz */

        echo("<pre>");
        foreach ($datos as $valor) {
            print_r($valor);
            echo "<br>";
        }
        echo("</pre>");

        /** Otro ejemplo para extraer un string   */
        echo $datos->empleado[0]->nombre;
    }
} else
{
   echo "Error abriendo empleados.xml" ;
}


