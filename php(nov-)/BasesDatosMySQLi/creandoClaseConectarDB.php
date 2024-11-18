<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
require_once ('autoloader.php');
require_once ('configDB.php');

error_reporting(0);
mysqli_report(MYSQLI_REPORT_OFF);

$conexion = mysqli_connect(SERVERNAME,  USERNAME, PASSWORD, BASEDATOS);

if (!$conexion) {
    die("la conexion ha fallado " .mysqli_connect_error());
}else{
    echo "<h2>Conexion realizada corectamente</h2>";
    mysqli_close($conexion);
}


?>


</body>
</html>