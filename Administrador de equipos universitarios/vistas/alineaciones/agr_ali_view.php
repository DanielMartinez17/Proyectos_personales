<?php
require_once("librerias/configServer.php");
require_once("librerias/consulSQL.php");

$datos = unserialize($_GET['var']);

$consulta = ejecutarSQL::consultar("SELECT nombre_equipo FROM equipos WHERE idequipos = $datos[2]");
$consultaequ1 = mysqli_fetch_assoc($consulta);
$equi1 = $consultaequ1["nombre_equipo"];

$consulta2 = ejecutarSQL::consultar("SELECT nombre_equipo FROM equipos WHERE idequipos = $datos[3]");
$consultaequ2 = mysqli_fetch_assoc($consulta2);
$equi2 = $consultaequ2["nombre_equipo"];

if (isset($_POST["ok"])) {
    $idjugador = $_POST['selecJugador'];
    $numero = $_POST['numero'];
    $idpartido = $datos[4];
    $idequipo = $datos[2];

    $insertar = consultasSQL::InsertSQL("alineacion", "idjugador, idpartido, idequipo, numero", "'$idjugador','$idpartido','$idequipo','$numero'");

}

if (isset($_POST["ok1"])) {
    $idjugador = $_POST['selecJugador'];
    $numero = $_POST['numero'];
    $idpartido = $datos[4];
    $idequipo = $datos[3];

    $insertar = consultasSQL::InsertSQL("alineacion", "idjugador, idpartido, idequipo, numero", "'$idjugador','$idpartido','$idequipo','$numero'");

}
?>

<div class="container mt-5">
    <form method=post>
        <div class="card">
            <div class="card-header">
                <h5>Jugadores de <?= $equi1 ?></h5>
            </div>
            <div class="card-body">

                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Nombre del jugador</label>
                    <div class="col-8">
                        <select class="form-control" name="selecJugador">
                            <option value='all'>[--Seleccione un jugador--]</option>
                            <?php
                            $consulta = ejecutarSQL::consultar("SELECT idjugador, CONCAT( nombres,' ',apellidos) AS nombrejugador FROM jugador ");
                            while ($fila = mysqli_fetch_assoc($consulta)) {
                                echo "<option value='" . $fila["idjugador"] . "'>" . $fila["nombrejugador"] . "</option> ";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Número de jugador</label>
                    <div class="col-8">
                        <input type="number" class="form-control" name="numero" id="inputName" placeholder="Seleccione un número" require>
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
                                <th scope="col">Nombre del <br> jugador</th>
                                <th scope='col'>Número</th>
                            </tr>
                        </thead>
                        <?php
                        $consulta = ejecutarSQL::consultar("SELECT 
                        A.*,
                        (SELECT CONCAT(nombres,' ',apellidos) FROM jugador WHERE A.idjugador = idjugador) AS nombrejugador
                        FROM alineacion A
                        WHERE idequipo = $datos[2]");

                        while ($fila = mysqli_fetch_array($consulta)) {
                            $id = $fila['idalineacion'];
                            echo "<tbody>
                        <th scope='col'></th>
                        <th name='id' scope='col'>$fila[idalineacion]</th>
                        <th scope='col'>$fila[nombrejugador]</th>
                        <th scope='col'>$fila[numero]</th>                
                        </tbody>";
                        }

                    
                        ?>

                    </table>
                </div>
            </div>
        </div>
    </form>
</div>

<br><br><br>

<div class="container mt-5">
    <form method=post>
        <div class="card">
            <div class="card-header">
                <h5>Jugadores de <?= $equi2 ?></h5>
            </div>
            <div class="card-body">

                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Nombre del jugador</label>
                    <div class="col-8">
                        <select class="form-control" name="selecJugador">
                            <option value='all'>[--Seleccione un jugador--]</option>
                            <?php
                            $consulta = ejecutarSQL::consultar("SELECT idjugador, CONCAT( nombres,' ',apellidos) AS nombrejugador FROM jugador ");
                            while ($fila = mysqli_fetch_assoc($consulta)) {
                                echo "<option value='" . $fila["idjugador"] . "'>" . $fila["nombrejugador"] . "</option> ";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Número de jugador</label>
                    <div class="col-8">
                        <input type="number" class="form-control" name="numero" id="inputName" placeholder="Seleccione un número" require>
                    </div>
                </div>
                
            </div>

            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" name=ok1 class="btn btn-primary">Agregar jugador</button>
                </div>
            </div>

            <div class="card-footer text-muted">

                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre del <br> jugador</th>
                                <th scope='col'>Número</th>
                            </tr>
                        </thead>
                        <?php
                        $consulta = ejecutarSQL::consultar("SELECT 
                        A.*,
                        (SELECT CONCAT(nombres,' ',apellidos) FROM jugador WHERE A.idjugador = idjugador) AS nombrejugador
                        FROM alineacion A
                        WHERE idequipo = $datos[3]");

                        while ($fila = mysqli_fetch_array($consulta)) {
                            $id = $fila['idalineacion'];
                            echo "<tbody>
                        <th scope='col'></th>
                        <th name='id' scope='col'>$fila[idalineacion]</th>
                        <th scope='col'>$fila[nombrejugador]</th>
                        <th scope='col'>$fila[numero]</th>                
                        </tbody>";
                        }

                    
                        ?>

                    </table>
                </div>
            </div>
        </div>
    </form>
</div>