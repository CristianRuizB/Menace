<!DOCTYPE>
<html>
<head>
    <title>ELIMINAR REGISTROS</title>
</head>
<body>
    <?php
        $server = "localhost";
        $usuario = "root";
        $contra = "";
        $bd = "menace";
        $conexion = mysqli_connect($server, $usuario, $contra, $bd);
        $clave = $_POST['txtClave'];
        if ($conexion && $clave != ''){
            $ejecuta = mysqli_query($conexion, "DELETE FROM usuarios WHERE id = '$clave'");
            $var="REGISTRO ELIMINADO!!!";
            echo "<script>alert('$var');window.history.back();</script>";
        }
        else{
            $var="ERROR AL ELIMINAR EL REGISTRO!!!";
            echo "<script>alert('$var');window.history.back();</script>";
        }
         
        mysqli_close($conexion);
    ?>
</body>
</html>