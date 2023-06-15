<?php
require_once("librerias/configServer.php");
require_once("librerias/consulSQL.php");

$jugador = $_GET['var'];

$consulta = ejecutarSQL::consultar("select * from jugador where idjugador = $jugador");
$consultajug = mysqli_fetch_assoc($consulta);

if (isset($_POST["ok"])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $apodo = $_POST['apodo'];
    $posicion = $_POST['posicion'];
    
    $insertar = consultasSQL::UpdateSQL("jugador", "nombres ='$nombre', apellidos = '$apellido', apodo='$apodo', posicion='$posicion'", "idjugador = $jugador");
    print "<script>window.setTimeout(function() { window.location = 'http://localhost/EXAMEN/admin_jug' }, 0);</script>";
}
?>

<div class="container mt-5">
    <form method=post>
        <div class="card">
            <div class="card-header">
                Actualizar jugador
            </div>
            <div class="card-body">

                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Nombres</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="nombre" id="inputName" placeholder="Ingrese el nombre" value="<?=$consultajug["nombres"]?>" require>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Apellidos</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="apellido" id="inputName" placeholder="Ingrese los apellidos" value="<?=$consultajug["apellidos"]?>" require>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Apodo</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="apodo" id="inputName" placeholder="Ingrese el apodo" value="<?=$consultajug["apodo"]?>" require>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Posición</label>
                    <div class="col-8">
                        <select class="form-control" name="posicion" value="<?=$consultajug["posicion"]?>">
                            <option value='all'>[--Seleccione una posición--]</option>
                            <option value="Portero">Portero</option>
                            <option value="Delantero">Delantero</option>
                            <option value="Defensa">Defensa</option>
                            <option value="Mediocampista">Mediocampista</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" name=ok class="btn btn-primary">Actualizar jugador</button>
                </div>
            </div>
        </div>
    </form>
</div>