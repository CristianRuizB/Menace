<title>Eliminar cliente</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap');
	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'Roboto Condensed', sans-serif;
	}
    
    body, html {
        height: 100%;
    }
    body {
        margin: 0;
        padding: 0;
        background: gray;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    .form-box {
        width: 800px;
        height: 800px;
        padding: 40px;
        background: #151919;
        text-align: center;
    }

    .form-title {
        color: #fff;
        text-transform: uppercase;
        text-align: center;
        font-weight: 300;
        font-size: 50px;
    }
    .form-box input[type="text"],
    .form-box input[type="submit"] {
        border: 0;
        background: none;
        display: block;
        margin: 20px auto;
        padding: 30px 20px;
        text-align: center;
        border: 2px solid #3742fa;
        width: 400px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s;
    }

    .bad {
        text-align: center;
        width: 80%;
        padding: 20px;
        background-color: #a22;
        border-radius: 24px;
        color: #fff
    }   
    
    .form-box input[type="text"]:focus{
        width: 280px;
        border-color: white;
    }
    .form-box input[type="submit"] {
        border: 0;
        background: #5352ed;
        cursor: pointer;
        border: 2px solid #3742fa;
    }

    .form-box input[type="submit"]:hover {
        background: none;
    }

    .boton {
        text-align: center;
        text-decoration:none;
        font-weight: 20px;
        font-size: 30px;
        color:white;
        padding-top:30px;
        padding-bottom:30px;
        padding-left:30px;
        padding-right:30px;
        background-color:#151919;
        border-width: 6px;
        border-style: solid;
        border-color: #FFFFFF;
    }

</style>
<html>
<head>
</head>
<body>
    <form action="elimin.php" method="POST" class="form-box">
        <h1 class="form-title">ELIMINAR REGISTRO</h1><br/><br/><br/><br/><br/><br/><br/>
        <input type="text" placeholder="ID" name="txtClave"> <br/>
        <input type="submit" value="ELIMINAR REGISTRO" class= "btnEliminar"> <br/><br/><br/>
        <a href="login.php" class="boton">INICIO</a>
    </form>
</body>
</html>