<?php
require_once("librerias/configServer.php");
require_once("librerias/consulSQL.php");

$id = $_GET['var'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eliminar Autor</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
  
<a class='btn btn-primary btn-sm' href='autores.php'>
  <button type='but' name='editar' id='editar' class='btn btn-primary' style="float: left;">Regresar</button>
</a>
<div class='container'>
    <div class='alert alert-primary' role='alert'>
        <strong>Eliminar Autor</strong> 
    </div>
    <strong><h2 style="margin-left: 15%;">¿Esta seguro de eliminar el registro de este autor?</h2></strong>
</div>

<form action="" method="post">
  <div class="offset-sm-4 col-sm-8">
    <button type="submit" value="eliminar" name=eliminar id= "eliminar" class="btn btn-primary">Eliminar Autor</button>
  </div>
</form>

<?php
if(isset($_POST["eliminar"])) {

    $eliminar = consultasSQL::DeleteSQL("autor","id_autor = $id");

    print "<script>window.setTimeout(function() { window.location = 'http://localhost/Examen3/autores.php' }, 0);</script>";

}
?>
?>
