<?php
    require "conecta.php";
    $con = conecta();

    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $rol_id = $_REQUEST['rol_id'];
    $apellido = $_REQUEST['apellido'];
    $correo = $_REQUEST['correo'];
    $genero = $_REQUEST['genero'];
    $plan = $_REQUEST['plan'];

    $passEnc= md5($password);
    $sql = "INSERT INTO usuarios
    (username, password,  rol_id, apellido, correo, genero, plan)
    VALUES ('$username', '$passEnc ', '$rol_id', '$apellido', '$correo', '$genero', '$plan')";

    $res = $con->query($sql);

    echo "Datos insertados correctamente";
    
    header("Location: admin.php");
?>
