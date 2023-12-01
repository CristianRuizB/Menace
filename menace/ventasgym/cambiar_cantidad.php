<?php
if (!isset($_POST["cantidad"])) {
	exit("No hay cantidad");
    exit("No hay cantidad");
}
if (!isset($_POST["indice"])) {
	exit("No hay índice");
    exit("No hay índice");
}

$cantidad = floatval($_POST["cantidad"]);
$indice = intval($_POST["indice"]);

// Inicia la sesión
session_start();

// Verifica si la cantidad solicitada es mayor que la existencia en el carrito
if ($cantidad > $_SESSION["carrito"][$indice]->existencia) {
	header("Location: ./vender.php?status=5");
	exit;
    exit("La cantidad solicitada supera la existencia en el carrito");
}
$_SESSION["carrito"][$indice]->cantidad = $cantidad;
$_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precioVenta;

// Obtiene el producto del carrito
$productoEnCarrito = $_SESSION["carrito"][$indice];

// Verifica si hay suficiente existencia en la base de datos
if ($cantidad > $productoEnCarrito->existencia) {
    exit("No hay suficiente existencia en la base de datos");
}

// Actualiza la cantidad y el total en el carrito
$productoEnCarrito->cantidad = $cantidad;
$productoEnCarrito->total = $cantidad * $productoEnCarrito->precioVenta;

// Actualiza la existencia en la base de datos
actualizarExistenciaEnBD($productoEnCarrito->codigo, $productoEnCarrito->existencia - $cantidad);

// Redirecciona a la página de vender.php
header("Location: ./vender.php");

// Función para actualizar la existencia en la base de datos
function actualizarExistenciaEnBD($codigo, $nuevaExistencia) {
    // Realiza la conexión a la base de datos (reemplaza 'tudb', 'tuusuario', 'tupassword' y 'tuserver' con tus propios valores)
    $con = new mysqli('localhost', 'root', '', 'menace');

    // Verifica si hay errores en la conexión
    if ($con->connect_error) {
        die("Error de conexión a la base de datos: " . $con->connect_error);
    }

    // Actualiza la existencia en la base de datos
    $sql = "UPDATE productos SET existencia = $nuevaExistencia WHERE codigo = $codigo";

    if ($con->query($sql) === TRUE) {
        // Éxito en la actualización
        echo "Existencia actualizada en la base de datos";
    } else {
        // Error en la actualización
        echo "Error al actualizar la existencia en la base de datos: " . $con->error;
    }

    // Cierra la conexión a la base de datos
    $con->close();
}
?>