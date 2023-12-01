<?php
if (!isset($_POST["indice"])) return;

$indice = $_POST["indice"];
$cantidad = $_POST["cantidad"];
define("HOST", 'localhost');
    define("BD", 'menace');
    define("USER_BD", 'root');
    define("PASS_BD", '');

    $con = new mysqli(HOST, USER_BD, PASS_BD, BD);
    
    

session_start();

// Verifica si el índice existe en el carrito
if (isset($_SESSION["carrito"][$indice])) {
    // Obtiene la información del producto antes de quitarlo
    $productoQuitar = $_SESSION["carrito"][$indice];

    // Guarda la cantidad antes de quitar el producto
    $cantidadAntes = $productoQuitar->cantidad;

    // Restablece la cantidad en caso de que quitar sea exitoso
    array_splice($_SESSION["carrito"], $indice, 1);

    // Actualiza la existencia en la tabla de productos
    if ($cantidad > 0) {
        // Conecta a tu base de datos y realiza la actualización
        // Supongamos que tienes una conexión a la base de datos llamada $con
        // y una tabla llamada "productos" con columnas "codigo" y "existencia"
        // Ajusta esto según tu configuración
        $codigoProducto = $productoQuitar->codigo;
        $existenciaActual = obtenerExistenciaActual($con, $codigoProducto);
        $nuevaExistencia = $existenciaActual + $cantidad;
        actualizarExistencia($con, $codigoProducto, $nuevaExistencia);
    }
}

header("Location: ./vender.php?status=3");

// Funciones auxiliares (ajusta según tu configuración y método de conexión a la base de datos)
function obtenerExistenciaActual($con, $codigoProducto) {
    // Consulta la existencia actual del producto desde la base de datos
    // Ejemplo: SELECT existencia FROM productos WHERE codigo = '$codigoProducto'
    // Ejecuta la consulta y obtén el resultado
    // Ajusta según tu método específico para obtener datos de la base de datos
    $query = "SELECT existencia FROM productos WHERE codigo = '$codigoProducto'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['existencia'];
    } else {
        // Manejo de errores, ajusta según tus necesidades
        die("Error al obtener existencia: " . mysqli_error($con));
    }
}

function actualizarExistencia($con, $codigoProducto, $nuevaExistencia) {
    // Actualiza la existencia del producto en la base de datos
    // Ejemplo: UPDATE productos SET existencia = $nuevaExistencia WHERE codigo = '$codigoProducto'
    // Ajusta según tu método específico para actualizar datos en la base de datos
    $query = "UPDATE productos SET existencia = $nuevaExistencia WHERE codigo = '$codigoProducto'";
    $result = mysqli_query($con, $query);

    if (!$result) {
        // Manejo de errores, ajusta según tus necesidades
        die("Error al actualizar existencia: " . mysqli_error($con));
    }
}
?>