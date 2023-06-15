<?php
require_once("librerias/configServer.php");
require_once("librerias/consulSQL.php");

if (isset($_POST["ok"])) {
    $nombre = $_POST['nombre'];
    $inicio = $_POST['fechInicio'];
    $fin = $_POST['fechFin'];

    if ($insertar = consultasSQL::InsertSQL("torneo", "nombre_torneo, fecha_inicio, fecha_fin, estado", "'$nombre','$inicio','$fin','1'")) {
        echo '<h2>Se ha registado correctamente</h2>';
    } else {
        echo '<h2>Error al registrar</h2>';
    }
}

?>
<div class="container mt-5">
    <form method=post>
        <div class="card">
            <div class="card-header">
                Administrar Torneos
            </div>
            <div class="card-body">

                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Nombre del torneo</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="nombre" id="inputName" placeholder="Ingrese el nombre" require>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Fecha de inicio</label>
                    <div class="col-8">
                        <input type="date" class="form-control" name="fechInicio" id="inputName" placeholder="Seleccione el inicio" require>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Fecha de finalización</label>
                    <div class="col-8">
                        <input type="date" class="form-control" name="fechFin" id="inputName" placeholder="Seleccione el final" require>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" name=ok class="btn btn-primary">Agregar torneo</button>
                </div>
            </div>

            <div class="card-footer text-muted">

                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre torneo</th>
                                <th scope='col'>Fecha Inicio</th>
                                <th scope="col">Fecha Finalización</th>
                                <th scope="col">Estado</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <?php
                        $consulta = ejecutarSQL::consultar("select * from torneo where estado = 1");

                        while ($fila = mysqli_fetch_array($consulta)) {
                            $id = $fila['idtorneo'];
                            $estado = "";
                            $hoy= strtotime(date("y-m-d"));

                            if (strtotime($fila["fecha_fin"]) < $hoy) {
                                $estado = "Finalizado";
                            }elseif (strtotime($fila["fecha_fin"]) >= $hoy ) {
                                $estado = "Activo";
                            }

                            echo "<tbody>
                        <th scope='col'></th>
                        <th name='id' scope='col'>$fila[idtorneo]</th>
                        <th scope='col'>$fila[nombre_torneo]</th>
                        <th scope='col'>$fila[fecha_inicio]</th>
                        <th scope='col'>$fila[fecha_fin]</th>
                        <th scope='col'>$estado</th>
                        <th scope='col'>
                        <button type='submit' name='eliminar' class='btn btn-primary' id='liveAlertBtn'>Eliminar</button>
                        </th>
                        <th><a href='' class='btn btn-warning'>Editar</a></th>                 
                        </tbody>";
                        }

                        if (isset($_POST["eliminar"])) {
                            $eliminar = consultasSQL::UpdateSQL("torneo", "estado = 0","idtorneo=$id");
                            print "<script>window.setTimeout(function() { window.location = 'http://localhost/EXAMEN/admin_tor' }, 0);</script>";
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>
    </form>
</div>