

<!doctype html>
<html lang="en-US">
<head>
<meta charset="utf-8">
<title>USUARIOS!!! </title>
<link href="css/login.css" rel="stylesheet" type="text/css">
<link href="css/dist/sweetalert2.css" rel="stylesheet">
<script src="css/dist/sweetalert2.min.js">
</script>	
</head>
<body>
<div id="login-form">
    <h1>INICIO DE SESION</h1>
    <fieldset>
        <form  method="post" action=otros/login_php.php >
            <input type="text" name=usuario required  placeholder='Usuario' > 
            <input type="password" name=Clave required placeholder='introduzca la clave' > 
            <input type="submit" value="Ingresar" name="ok2" >
            <footer class="clearfix">
            <p><span class="info">?</span>
			<a href="otros/registro.php">Registrarse</a></p>
		</footer>
		</form>
	</fieldset>
</div> 
</body>
</html>