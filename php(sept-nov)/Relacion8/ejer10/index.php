<?php
// Función para comprobar usuario y contraseña
function comprobar_usuario($nombre, $clave) {
    if ($nombre === "usuario" && $clave === "1234") {
        return ['nombre' => $nombre, 'rol' => 0];
    } elseif ($nombre === "admin" && $clave === "1234") {
        return ['nombre' => "admin", 'rol' => 1];
    } else {
        return false;
    }
}

// Manejo del formulario y autenticación
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['usuario']) && !empty($_POST['clave'])) {
        $usu = comprobar_usuario($_POST['usuario'], $_POST['clave']);
        if ($usu === false) {
            $err = true;
            $usuario = htmlspecialchars($_POST['usuario']); // Evitar XSS
        } else {
            session_start();
            $_SESSION["usuario"] = $usu['nombre'];
            $_SESSION["rol"] = $usu['rol'];

            // Si el usuario selecciona "Recordarme"
            if (isset($_POST['recordarme'])) {
                setcookie("usuario", $usu['nombre'], time() + (30 * 24 * 60 * 60)); // 30 días
                setcookie("clave", $_POST['clave'], time() + (30 * 24 * 60 * 60));  // 30 días
            }

            header("Location: sesiones_principal.php");
            exit;
        }
    } else {
        $err = true;
        $usuario = '';
    }
} elseif (isset($_COOKIE['usuario']) && isset($_COOKIE['clave'])) {
    // Autenticación automática desde cookies
    $usu = comprobar_usuario($_COOKIE['usuario'], $_COOKIE['clave']);
    if ($usu !== false) {
        session_start();
        $_SESSION["usuario"] = $usu['nombre'];
        $_SESSION["rol"] = $usu['rol'];
        header("Location: sesiones_principal.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
<form method="POST" action="">
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" value="<?= isset($_COOKIE['$usuario'] ) ? htmlspecialchars($_COOKIE['$usuario']) : '' ?>" required>
    <label for="clave">Contraseña:</label>
    <input type="password" id="clave" name="clave" value="<?= isset($_COOKIE['$contraseña'] ) ? htmlspecialchars($_COOKIE['$contraseña']) : '' ?>" required>
    <label for="recordarme">
        <input type="checkbox" id="recordarme" name="recordarme"> Recordarme
    </label>
    <button type="submit">Iniciar Sesión</button>
</form>
<?php if (isset($err) && $err): ?>
    <p style="color:red">Usuario o contraseña incorrectos.</p>
<?php endif; ?>
</body>
</html>

