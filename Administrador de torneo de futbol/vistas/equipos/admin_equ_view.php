<?php
require_once("librerias/configServer.php");
require_once("librerias/consulSQL.php");

if (isset($_POST["ok"]) && !$_POST['nombre'] == "") {
    $nombre = $_POST['nombre'];
    $insertar = consultasSQL::InsertSQL("equipos", "nombre_equipo, estado", "'$nombre', 1");
}

?>

<div class="container mt-5">
    <form method=post>
        <div class="card">
            <div class="card-header">
                Administrar Equipos
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Nombre del equipo</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="nombre" id="inputName" placeholder="Ingrese el nombre del equipo">
                    </div>
                </div>

            </div>
            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" name=ok class="btn btn-primary">Agregar equipo</button>
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
                        <th scope='col'></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                
                <?php
                $consulta = ejecutarSQL::consultar("select * from equipos where estado= 1");

                while ($fila = mysqli_fetch_array($consulta)) {
                    $id = $fila['idequipos'];
                    echo "<tbody>
                    <th scope='col'></th>
                    <th name='id' scope='col'>$fila[idequipos]</th>
                    <th scope='col'>$fila[nombre_equipo]</th>
                    <th scope='col'>
                    
                    <button type='submit' name='eliminar' class='btn btn-primary' id='liveAlertBtn'>Eliminar</button>
                    </th>  
                    <th>
                        <form method='get' action='edit_equ'>
                            <input type='hidden' name= 'var' value='$id' >
                            <input  class='btn btn-warning' type='submit' value='Editar'>
                        </form>
                    </th> 
            
                    </tbody>";
                }

                if (isset($_POST["eliminar"])) {
                    $eliminar = consultasSQL::UpdateSQL("equipos", "estado = 0", "idequipos= $id");
                    print "<script>window.setTimeout(function() { window.location = 'http://localhost/EXAMEN/admin_equ' }, 0);</script>";
                }
                ?>

            </table>
        </div>
            </div>
        </div>
    </form>
</div>