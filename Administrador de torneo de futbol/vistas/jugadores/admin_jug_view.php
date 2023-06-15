<?php
require_once("librerias/configServer.php");
require_once("librerias/consulSQL.php");

if (isset($_POST["ok"])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $apodo = $_POST['apodo'];
    $posicion = $_POST['posicion'];
    
    $insertar = consultasSQL::InsertSQL("jugador", "nombres, apellidos, apodo, posicion", "'$nombre','$apellido','$apodo','$posicion'");

}

?>
<div class="container mt-5">
    <form method=post>
        <div class="card">
            <div class="card-header">
                Administrar Jugadores
            </div>
            <div class="card-body">

                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Nombres</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="nombre" id="inputName" placeholder="Ingrese el nombre" require>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Apellidos</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="apellido" id="inputName" placeholder="Ingrese los apellidos" require>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Apodo</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="apodo" id="inputName" placeholder="Ingrese el apodo" require>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Posición</label>
                    <div class="col-8">
                        <select class="form-control" name="posicion">
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
                    <button type="submit" name=ok class="btn btn-primary">Agregar jugador</button>
                </div>
            </div>

            <div class="card-footer text-muted">

                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope='col'>Apellido</th>
                                <th scope="col">Apodo</th>
                                <th scope="col">Posicion</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <?php
                        $consulta = ejecutarSQL::consultar("select * from jugador");

                        while ($fila = mysqli_fetch_array($consulta)) {
                            $id = $fila['idjugador'];
                            echo "<tbody>
                        <th scope='col'></th>
                        <th name='id' scope='col'>$fila[idjugador]</th>
                        <th scope='col'>$fila[nombres]</th>
                        <th scope='col'>$fila[apellidos]</th>
                        <th scope='col'>$fila[apodo]</th>
                        <th scope='col'>$fila[posicion]</th>
                        <th scope='col'>
                        <button type='submit' name='eliminar' class='btn btn-primary' id='liveAlertBtn'>Eliminar</button>
                        </th>
                        <th>
                        <form method='get' action='edit_jug'>
                            <input type='hidden' name= 'var' value='$id' >
                            <input  class='btn btn-warning' type='submit' value='Editar'>
                        </form>
                        </th>                 
                        </tbody>";
                        }

                        if (isset($_POST["eliminar"])) {
                            $eliminar = consultasSQL::DeleteSQL("jugador", "idjugador= $id");
                            print "<script>window.setTimeout(function() { window.location = 'http://localhost/EXAMEN/admin_jug' }, 0);</script>";
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>
    </form>
</div>