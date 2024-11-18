<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ej11: añadiendo atributos e hijos en un XML</title>
</head>
<body>
<?php
    const ARCHIVO_DATOS = "./xml/empleados.xml";
function escribeError($error){
    echo "<span style='color: red'>".$error."</span>";

}
/** Funcion que actualiza los datos para el empleado indicado. Si se pro
* @param $codigoEmpleado
* @param $telefonoEmpleado
* @param $codPostEmpleado
* @param $erroresProceso
* @return void
 */
function actualizaEmpleado($codigoEmpleado, $telefonoEmpleado, $codPostEmpleado, &$erroresProceso): ?bool{
    $resultado = false;
    $encontrado = false;
    if (file_exists(ARCHIVO_DATOS)) {
        $datos = simplexml_load_file(ARCHIVO_DATOS);

        if ($datos === false) {
            $erroresProceso = "Error al leer el fichero: " . ARCHIVO_DATOS;

        } else {
            foreach ($datos->empleado as $empleado) {
                if ((string)$empleado['codEmple'] === $codigoEmpleado) {
                    if ($telefonoEmpleado)
                        $empleado->addChild("telefono", $telefonoEmpleado);
                    if ($codPostEmpleado)
                        $empleado->addChild("codigoPostal", $codPostEmpleado);
                    $encontrado = true;
                    break;
                }
            }
            if ($encontrado)
                $resultado = $datos->asXML(ARCHIVO_DATOS);
            else
                $erroresProceso = "no existe el empleado indicado";
        }
    }
    return $resultado;
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    function filtrado($datos){
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }
    //validacion de los datos recibidos
    // codEmpleado ==========================================
    if(empty($_POST["codEmp"])){
        $errores["codEmpleado"] = "El código del empleado es requerido";
    }
    else {
        $codigoEmpleado = filtrado($_POST["codEmp"]);
        if (!preg_match("/^[a-z][0-9]{3}$/", $codigoEmpleado)){
            $errores["codEmpleado"] = "El código de empleado se compone de una letra seguida de tres números.";
        }
    }
    // telefono ===================================
    // el dato no es obligatorio, si lo informan lo actualizamos
    $telefonoEmpleado =$_POST["telefono"];
    $telefono_usuario = filter_var($telefonoEmpleado, FILTER_SANITIZE_NUMBER_INT);
    if(isset($telefonoEmpleado)&& strlen($telefonoEmpleado)>0) {
        if (strlen($telefonoEmpleado) != 9 || !preg_match("/^[0-9]+$/", $telefonoEmpleado)) {
            $errores["telefonoEmpleado"] = "El telefono han de ser 9 numeros";
        }
    }

    // El código postal tampoco es obligatorio, si se informa se actualiza en el el xml
    $codPostEmpleado =$_POST["codPost"];
    $codPostEmpleado = filtrado($codPostEmpleado);
    if ($codPostEmpleado){
        if (!preg_match("/^[0-9]{5}$/", $codPostEmpleado)){
            $errores["codPostEmpleado"] = "No se ha indicado un código postal correcto. Este ha de constar de cinco números.";
        }
    }

    //comprobamos caso se haya informado codigo empleado y no se hayan indicado valores a actualizar/informar
    if (!isset($errores) &&
        ($codigoEmpleado &&
            strlen($telefonoEmpleado) == 0 && strlen($codPostEmpleado) == 0)){
        $errores["general"]= "No se ha informado teléfono ni código postal para el empleado.";
    }
    if (!isset($errores) ) {//no hay errores, actualizamos datos
        if (!actualizaEmpleado($codigoEmpleado, $telefonoEmpleado, $codPostEmpleado, $erroresProceso)) {
            echo "<h2> Errores actualizando empleado: {$erroresProceso}</h2>";
        };
    }
    else {//tenenemos errores que corregir
        echo "<h2>FORMULARIO CON ERRORES:</h2>";
        echo "<h4>" . "Errores detectados: <span style='color: red'>{$errores["general"]} </span></h4>";
    }
}

?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
    <?php !isset($errores)? print("<h1>Nuevos datos para empleados:</h1>") : print("<h3> Datos empleados:</h3>"); ?>

    <label for="codEmp">Código del empleado del que actualizar los datos:</label>
    <input type="text" id="codEmp" name="codEmp" value="<?php (isset($codigoEmpleado)?print($codigoEmpleado):"");?>"/> <?php (isset($errores) && isset($errores["codEmpleado"]))? escribeError($errores["codEmpleado"]):print("");?> <br/>

    <label for="telefono">Teléfono del empleado:</label>
    <input type="text" id="telefono" name="telefono" value="<?php (isset($telefonoEmpleado)?print($telefonoEmpleado):"");?>"/> <?php (isset($errores) && isset($errores["telefonoEmpleado"]))? escribeError($errores["telefonoEmpleado"]):print("");?><br/>

    <label for="codPost">Código postal:</label>
    <input type="text" id="codPost" name="codPost" value="<?php (isset($codPostEmpleado)?print($codPostEmpleado):"");?>"/> <?php (isset($errores) && isset($errores["codPostEmpleado"]))? escribeError($errores["codPostEmpleado"]):print("");?> <br/>

    <input type="submit" value="Enviar">
</form>

</body>
</html>