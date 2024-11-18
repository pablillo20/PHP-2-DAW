<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<h2>Inicio de Sesión</h2>
<form method="post" action="">
    <input type="text" name="username" placeholder="Usuario" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <input type="submit" value="Iniciar Sesión">
</form>

<?php
// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar si el usuario y la contraseña son correctos
    if ($username === "usuario" && $password === "1234") {
        // Redirigir a la página
        header("Location: exito.html");
        exit();
    } else {

        header("Location: fallo.html");
        exit();
    }
}
?>

</body>
</html>
