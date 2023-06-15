<?php
require_once("librerias/configServer.php");
require_once("librerias/consulSQL.php");

$idprogramacion =$_GET['var'] ;
?>

<div class="container mt-5">
    <form method=post>
        <div class='card'>
            <div class='card-header'>
                Administrar partidos
            </div>
            <div class='card-body'>
                <div class='mb-3 row'>
                    <label for='inputName' class='col-4 col-form-label'>Cantidad goles equipo 1</label>
                    <div class='col-8'>
                        <input type='number' class='form-control' name='cantgol1' id='inputName' placeholder='Ingrese los goles' require>
                    </div>
                </div>
                <div class='mb-3 row'>
                    <label for='inputName' class='col-4 col-form-label'>Cantidad goles equipo 1</label>
                    <div class='col-8'>
                        <input type='number' class='form-control' name='cantgol2' id='inputName' placeholder='Ingrese los goles' require>
                    </div>
                </div>
                <div class='mb-3 row'>
                    <div class='offset-sm-4 col-sm-8'>
                        <button type='submit' name=ok class='btn btn-primary'>Registrar goles</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="container mt-5">
<?php
if (isset($_POST["ok"])) {
    $cantgol1 = $_POST['cantgol1'];
    $cantgol2 = $_POST['cantgol2'];
    $estado = 1;

    $insertar = consultasSQL::InsertSQL("partidos", "golesequipo1, golesequipo2, estado, idprogramacion", "'$cantgol1','$cantgol2','$estado','$idprogramacion'");
    
    print "<script>window.setTimeout(function() { window.location = 'http://localhost/EXAMEN/admin_part' }, 0);</script>";
}
?>

</div>