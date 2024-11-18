<?php
if (isset($_COOKIE['color_fondo'])) {
    $color_fondo = $_COOKIE['color_fondo'];
} else {
    $color_fondo = '#FFFFFF';
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['color'])) {
    $color_fondo = $_POST['color'];
    setcookie('color_fondo', $color_fondo, time() + (60 * 60 * 24 * 30), "/");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elige tu color de fondo</title>
    <style>
        body {
            background-color: <?php echo $color_fondo; ?>;
            color: #333;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        form {
            margin-top: 20px;
        }
        select {
            padding: 10px;
            font-size: 16px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h1>Elige tu color de fondo</h1>
<form method="POST" action="">
    <label for="color">Selecciona un color:</label>
    <select name="color" id="color">
        <option value="#FFFFFF" <?php echo ($color_fondo == '#FFFFFF') ? 'selected' : ''; ?>>Blanco</option>
        <option value="#FF5733" <?php echo ($color_fondo == '#FF5733') ? 'selected' : ''; ?>>Rojo</option>
        <option value="#33FF57" <?php echo ($color_fondo == '#33FF57') ? 'selected' : ''; ?>>Verde</option>
        <option value="#3357FF" <?php echo ($color_fondo == '#3357FF') ? 'selected' : ''; ?>>Azul</option>
        <option value="#FFFF33" <?php echo ($color_fondo == '#FFFF33') ? 'selected' : ''; ?>>Amarillo</option>
    </select>
    <button type="submit">Guardar color</button>
</form>
</body>
</html>
