<title>Detalles de cliente</title>
<a href="login.php">Volver al menú</a>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap');
	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'Roboto Condensed', sans-serif;
	}
    .divDer{
        margin: 0px 0px 0px 83%;
    }
    .divIzq {
        margin: 2% 0px 0px 5%;
    }

    .tabla {
        display: table;
        width: 1200px;
        margin: auto;
    }

    .head{
        display: table-row;
        text-align: center;
        line-height: 50px;
        height: 50px;
        background-color: #000080;
        color: white;
    }

    .filas1{
        display: table-row;
        background-color: #BCEEFF;
    }

    .filas2 {
        display: table-row;
        background-color: #F3D9FF;
    }

    .celdas {
        display: table-cell;
        border: 1px solid black;
        text-align: center;
        vertical-align: middle;
        width: 15%;
    }

    body {
        background: url(https://scontent.fgdl9-1.fna.fbcdn.net/v/t39.30808-6/310772659_111961908349073_5624039281500180957_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeGrZjLnHoB9rHA-96zlA8XmudoUfGonTw652hR8aidPDuRh17ocbWrQeMVJgnW6WsqlO6Byl2nvVhvEtG6f9cYD&_nc_ohc=YUEHNSozImkAX8Smrfm&_nc_ht=scontent.fgdl9-1.fna&oh=00_AfAOPikg8y-nX_12xmZiegtC1zZcbpGFM_WGC9pi96y-wQ&oe=648D70BB);
        background-size: 100vw 100vh;
		background-repeat: no-repeat;
        
    }

    a{
        color: black;
        font-weight: bold;
    }

    a:hover {
        color: blue;
    }

    a:active {
        color: red;
    }


    #mensaje {
        color: #F00;
        font-size: 18px;
        font-weight: bold;
        width: 400px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        margin:15px auto;
      }

      .cab{
        width:50%;
        border:1px dotted #f00;
        padding:8px;
        margin:auto;
        text-align: center;
        background: pink;
      }
</style>

<?php
require "conecta.php";
    $con = conecta();

    $sql = "SELECT * FROM usuarios WHERE rol_id = 3";

    $res = $con->query($sql);

    echo "<div align='center' style='font-weight: bold; font-size: 40px; margin-top: 30;'>Listado de clientes</div><br>";

    echo "<div class='tabla'>
        <div class='head'>
            <div class='celdas'>ID</div>
            <div class='celdas'>Nombre Completo</div>
            <div class='celdas'>Correo</div>
            <div class='celdas'>Género</div>
            <div class='celdas'>Tipo de cliente</div>

        </div>";
            while($row = $res->fetch_array()){
                $id = $row["id"];
                $nombre = $row["username"];
                $apellidos = $row["apellido"];
                $correo = $row["correo"];
                $genero = $row["genero"];
                $plan = $row["plan"];
                


                if($id%2==0) {
                    echo "<div class='filas1' id='tr$id'>
                        <div class='celdas'>$id</div>
                        <div class='celdas'>$nombre $apellidos</div>
                        <div class='celdas'>$correo</div>
                        <div class='celdas'>$genero</div>
                        <div class='celdas'>$plan</div>
                    </div>";
                } else {
                    echo "<div class='filas2' id='tr$id'>
                    <div class='celdas'>$id</div>
                        <div class='celdas'>$nombre $apellidos</div>
                        <div class='celdas'>$correo</div>
                        <div class='celdas'>$genero</div>
                        <div class='celdas'>$plan</div>
                    </div>";
                }
            }
    echo "</div>
        <div id='mensaje'></div>";
?>
