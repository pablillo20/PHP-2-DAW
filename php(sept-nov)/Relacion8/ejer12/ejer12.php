<?php
session_start(); // Iniciar la sesión

// Verificar si se ha enviado el formulario para agregar productos al carrito
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si ya existe la variable de sesión para los productos
    if (!isset($_SESSION['productosEnCesta'])) {
        $_SESSION['productosEnCesta'] = array();
    }

    // Obtener el producto y la cantidad desde el formulario
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];

    // Si el producto ya está en el carrito, sumar la cantidad
    if (isset($_SESSION['productosEnCesta'][$producto])) {
        $_SESSION['productosEnCesta'][$producto] += $cantidad;
    } else {
        // Si el producto no está, agregarlo al carrito
        $_SESSION['productosEnCesta'][$producto] = $cantidad;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de la Compra</title>
</head>
<body>

<h1>Formulario de Compra</h1>
<!-- Formulario para agregar productos al carrito -->
<form method="POST">
    <label for="producto">Producto:</label>
    <select name="producto" id="producto">
        <option value="producto1">Producto 1</option>
        <option value="producto2">Producto 2</option>
        <option value="producto3">Producto 3</option>
    </select>
    <br><br>

    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" id="cantidad" min="1" required>
    <br><br>

    <button type="submit">Comprar</button>
</form>

<hr>

<h2>Carrito de la Compra</h2>

<?php
// Comprobar si hay productos en la cesta
if (isset($_SESSION['productosEnCesta']) && count($_SESSION['productosEnCesta']) > 0) {
    echo "<ul>";
    // Mostrar los productos y sus cantidades
    foreach ($_SESSION['productosEnCesta'] as $producto => $cantidad) {
        echo "<li>$producto: $cantidad</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Tu carrito está vacío.</p>";
}
?>

</body>
</html>
