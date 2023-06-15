<?php
require_once("librerias/configServer.php");
require_once("librerias/consulSQL.php");

$equipo = $_GET['var'];

$consulta = ejecutarSQL::consultar("select * from equipos where idequipos = $equipo");
$consultaequ = mysqli_fetch_assoc($consulta);

if (isset($_POST["ok"]) && !$_POST['nombre'] == "") {
    $nombre = $_POST['nombre'];

    $insertar = consultasSQL::UpdateSQL("equipos", "nombre_equipo='$nombre', estado=1", "idequipos = $equipo");
    print "<script>window.setTimeout(function() { window.location = 'http://localhost/EXAMEN/admin_equ' }, 0);</script>";
}

?>


<div class="container mt-5">
    <form method=post>
        <div class="card">
            <div class="card-header">
                Actualizar equipo
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Nombre del equipo</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="nombre" id="inputName" placeholder="Ingrese el nombre del equipo" value="<?=$consultaequ["nombre_equipo"]?>">
                    </div>
                </div>

            </div>
            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" name=ok class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </form>
</div>