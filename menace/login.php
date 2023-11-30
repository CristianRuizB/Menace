<?php
    include_once 'database.php';
    
    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 

        // destroy the session 
        session_destroy(); 
    }
    
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: admin.php');
            break;
            case 2:
                header('location: empleado.php');
            break;
            case 3:
                header('location: cliente.php');
            break;
            default:
        }
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passEnc=md5($password);

        $db = new Database();
        $query = $db->connect()->prepare('SELECT *FROM usuarios WHERE username = :username AND password = :password');
        $query->execute(['username' => $username, 'password' => $passEnc]);

        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $rol = $row[3];
            
            $_SESSION['rol'] = $rol;
            switch($rol){
                case 1:
                    header('location: admin.php');
                break;
                case 2:
                    header('location: empleado.php');
                break;
                case 3:
                    header('location: cliente.php');
                break;
                default:
            }
        }else{
            // no existe el usuario
            $alert = "<script>alert('USUARIO INVÁLIDO');</script>";
            echo $alert;
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="login.php" method="POST" class="form-box">
        <h1 class="form-title">INGRESAR</h1>
        <input type="text" placeholder="Usuario" name="username">
        <input type="password" placeholder="Contraseña" name="password">
        <input type="submit" value="INGRESAR">
    </form>
    
</body>

</html>