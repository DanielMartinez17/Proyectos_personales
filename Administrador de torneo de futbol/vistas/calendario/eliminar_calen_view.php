<?php
require_once("librerias/configServer.php");
require_once("librerias/consulSQL.php");

$idEvento = $_GET['var'];
?>
<a class='btn btn-primary btn-sm' href='admin.calen'>
  <button type='but' name='editar' id='editar' class='btn btn-primary' style="float: left;">Regresar</button>
</a>
<div class='container'>
    <div class='alert alert-primary' role='alert'>
        <strong>Eliminar Evento</strong> 
    </div>
    <strong><h2 style="margin-left: 15%;">¿Esta seguro de eliminar el partido?</h2></strong>
</div>

<form action="" method="post">
  <div class="offset-sm-4 col-sm-8">
    <button type="submit" value="eliminar" name=eliminar id= "eliminar" class="btn btn-primary">Eliminar partido</button>
  </div>
</form>

<?php
if(isset($_POST["eliminar"])) {

    $eliminar = consultasSQL::UpdateSQL("calendario", "estado = 0", "idprogramacion= $idEvento");

    print "<script>window.setTimeout(function() { window.location = 'http://localhost/EXAMEN/admin_calen' }, 0);</script>";

}
?>