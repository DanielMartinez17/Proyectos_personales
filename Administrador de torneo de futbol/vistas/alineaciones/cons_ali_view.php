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

?>


<div class="container mt-5">
    <form method=post>
        <div class="card">
            <div class="card-header">
                <h5>Jugadores de <?= $equi1 ?></h5>
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