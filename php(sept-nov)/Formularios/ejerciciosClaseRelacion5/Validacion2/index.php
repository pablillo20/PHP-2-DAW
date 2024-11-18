<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Empleo</title>
</head>
<body>
<?php
function escribeError($error){
    echo "<span style='color: red'>" . $error . "</span>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    function filtrado($datos){
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);
        return $datos;
    }

    // Inicializamos el array de errores
    $errores = [];

    // Nombre
    if (empty($_POST["nombre"])) {
        $errores["nombre"] = "El nombre es requerido";
    } else {
        $nombre_usuario = filtrado($_POST["nombre"]);
        if (!preg_match("/^[a-zA-Z]+$/", $nombre_usuario)) {
            $errores["nombre"] = "El nombre solo debe contener letras.";
        }
    }

    // Apellidos
    if (empty($_POST["apellidos"])) {
        $errores["apellidos"] = "Los apellidos son requeridos";
    } else {
        $apellidos_usuario = filtrado($_POST["apellidos"]);
        if (!preg_match("/^[a-zA-Z\s]+$/", $apellidos_usuario)) {
            $errores["apellidos"] = "Los apellidos solo deben contener letras y espacios.";
        }
    }

    // Teléfono
    $telefono_usuario = filter_var($_POST["telefono"], FILTER_SANITIZE_NUMBER_INT);
    if (strlen($telefono_usuario) != 9 || !preg_match("/^[0-9]+$/", $telefono_usuario)) {
        $errores["telefono"] = "El teléfono debe tener 9 números.";
    }

    // Email
    $email_usuario = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email_usuario, FILTER_VALIDATE_EMAIL) || empty($email_usuario)) {
        $errores["email"] = "El email no es válido o está vacío.";
    }

    // Empleo actual (radio)
    if (empty($_POST["empleo"])) {
        $errores["empleo"] = "Debe seleccionar su situación laboral actual.";
    } else {
        $empleo_usuario = filtrado($_POST["empleo"]);
    }

    // Lenguajes de programación (checkboxes)
    if (empty($_POST["lenguajes"])) {
        $errores["lenguajes"] = "Debe seleccionar al menos un lenguaje de programación.";
    } else {
        $lenguajes_usuario = $_POST["lenguajes"];
    }

    // URL de trabajos realizados
    if (empty($_POST["url"])) {
        $errores["url"] = "La URL de trabajos realizados es requerida.";
    } else {
        $url_usuario = filter_var($_POST["url"], FILTER_SANITIZE_URL);
        if (!filter_var($url_usuario, FILTER_VALIDATE_URL)) {
            $errores["url"] = "La URL no es válida.";
        }
    }

    // Si no hay errores, procesamos los datos
    if (empty($errores)) {
        header("Location: index.html"); // Redirigir a una página de éxito
        exit;
    } else {
        echo "<h2>FORMULARIO CON ERRORES:</h2>";
    }
} else {
    echo "<h2>FORMULARIO PARA EMPLEADOS</h2>";
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <p>Escriba los datos siguientes:</p>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php (isset($nombre_usuario)?print($nombre_usuario):'');?>" />
    <?php (isset($errores["nombre"]))? escribeError($errores["nombre"]):'';?><br/>

    <label for="apellidos">Apellidos:</label>
    <input type="text" id="apellidos" name="apellidos" value="<?php (isset($apellidos_usuario)?print($apellidos_usuario):'');?>" />
    <?php (isset($errores["apellidos"]))? escribeError($errores["apellidos"]):'';?><br/>

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" value="<?php (isset($telefono_usuario)?print($telefono_usuario):'');?>" />
    <?php (isset($errores["telefono"]))? escribeError($errores["telefono"]):'';?><br/>

    <label for="email">Correo:</label>
    <input type="text" id="email" name="email" value="<?php (isset($email_usuario)?print($email_usuario):'');?>" />
    <?php (isset($errores["email"]))? escribeError($errores["email"]):'';?><br/>

    <label for="empleo">Empleo actual:</label>
    <input type="radio" id="sin_empleo" name="empleo" value="sin empleo" <?php (isset($empleo_usuario) && $empleo_usuario == "sin empleo") ? print('checked') : '';?>/> Sin empleo
    <input type="radio" id="media_jornada" name="empleo" value="media jornada" <?php (isset($empleo_usuario) && $empleo_usuario == "media jornada") ? print('checked') : '';?>/> Media jornada
    <input type="radio" id="tiempo_completo" name="empleo" value="tiempo completo" <?php (isset($empleo_usuario) && $empleo_usuario == "tiempo completo") ? print('checked') : '';?>/> Tiempo completo
    <?php (isset($errores["empleo"]))? escribeError($errores["empleo"]):'';?><br/>

    <label for="lenguajes">Lenguajes que domina:</label><br/>
    <input type="checkbox" id="python" name="lenguajes[]" value="Python" <?php (isset($lenguajes_usuario) && in_array("Python", $lenguajes_usuario)) ? print('checked') : '';?>/> Python<br/>
    <input type="checkbox" id="php" name="lenguajes[]" value="PHP" <?php (isset($lenguajes_usuario) && in_array("PHP", $lenguajes_usuario)) ? print('checked') : '';?>/> PHP<br/>
    <input type="checkbox" id="javascript" name="lenguajes[]" value="JavaScript" <?php (isset($lenguajes_usuario) && in_array("JavaScript", $lenguajes_usuario)) ? print('checked') : '';?>/> JavaScript<br/>
    <input type="checkbox" id="java" name="lenguajes[]" value="Java" <?php (isset($lenguajes_usuario) && in_array("Java", $lenguajes_usuario)) ? print('checked') : '';?>/> Java<br/>
    <input type="checkbox" id="cpp" name="lenguajes[]" value="C++" <?php (isset($lenguajes_usuario) && in_array("C++", $lenguajes_usuario)) ? print('checked') : '';?>/> C++<br/>
    <?php (isset($errores["lenguajes"]))? escribeError($errores["lenguajes"]):'';?><br/>

    <label for="url">URL de tus trabajos realizados:</label>
    <input type="text" id="url" name="url" value="<?php (isset($url_usuario)?print($url_usuario):'');?>" />
    <?php (isset($errores["url"]))? escribeError($errores["url"]):'';?><br/>

    <input type="submit" value="Enviar">
</form>

</body>
</html>

