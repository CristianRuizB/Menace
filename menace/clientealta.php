
<?php
    echo "<div align='center' style='font-weight: bold; font-size: 40px;'>Alta de Clientes</div><br>";
    echo "<HR noshade align='center' style='margin-bottom: 30;'>";
?>


<html>
 <head>
  <title>Alta de Clientes</title>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
    function valida() {
      var username = document.forma01.username.value;
      var apellido = document.forma01.apellido.value;
      var password = document.forma01.password.value;
      var rol = document.forma01.rol_id.value;
      var correo = document.forma01.password.value;

      if(username === "" || apellido === "" || password === "" || rol === ""|| correo ==="0") {
        $('#mensaje').html('Faltan campos por llenar');
        setTimeout(function() {
          $('#mensaje').html('');
        }, 5000);
        return false;
      }
      return true;
    }
  </script>
  <a href="login.php">Volver al menú</a>
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap');
	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'Roboto Condensed', sans-serif;
	}  

    .divIzq {
        margin: 2% 0px 0px 5%;
        color: white;
    }

    label{
      display: inline-block;
      width: 80px;
    }

    input, textarea, select {
      width: 250px;
      margin:2px auto;
      box-sizing: border-box;
    }

    body{
      background: url(https://png.pngtree.com/thumb_back/fh260/background/20210903/pngtree-mens-clothing-store-sportswear-shopping-photography-map-with-pictures-image_796890.jpg);
      background-size: 100vw 100vh;
		  background-repeat: no-repeat;
    }

    a {
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
      height: 20px;
      line-height: 20px;
      background-color: #000000;
      color: #ffffff;
      font-size: 16px;
      font-weight: bold;
      width: 250px;
      text-align: center;
      margin: 10px auto;
      padding: 5px;
      border-radius: 5px;
    }

    #mensaje2 {
      height:20px;
      line-height:22px;
      color: #F00;
      font-size: 15px;
      font-weight: bold;
      width: 250px;
      text-align: center;
      float: right;
      position: relative;
    }
  </style>
 </head>
 <body>
	<form enctype="multipart/form-data" name="forma01" action="clientesalva.php" method="POST" align="center">
    <label for="username" style='color: white;'>Nombre</label>
		<input type="text" name="username" placeholder="Escribe el nombre">
    <br>
    <label for="password" style='color: white;' >Password</label>
    <input type="password" name="password" placeholder="Escribe el password">
    <br>
    <label for="rol_id" style='color: white;'>Rol</label>
    <input type="text" name="rol_id" placeholder="Escribe el rol">
    <br>
		<label for="apellido" style='color: white;'>Apellidos</label>
		<input type="text" name="apellido" placeholder="Escribe los apellidos">
    <br>
    <label for="correo" style='color: white;'>Correo</label>
    <input type="email" name="correo" id="correo" placeholder="Escribe el correo">
    <br>
    <label for="genero" style='color: white;'>Género</label>
    <input type="text" name="genero" placeholder="Escribe el genero">
    <br>
    <label for="plan" style='color: white;'>Tipo</label>
    <input type="text" name="plan" placeholder="Escribe el tipo de usuario">
    <br>
    <label for="edad" style='color: white;'>Telefono</label>
    <input type="text" name="edad" placeholder="Escribe el telefono">
    <br>
		<input style="background-color: gray; width: 150px; margin: 10px auto;" onclick="return valida();" type="submit" value="Guardar">
    <div id="mensaje"></div>
	</form>
 </body>
</html>
