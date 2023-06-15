<?php
require_once("librerias/configServer.php");
require_once("librerias/consulSQL.php");

$datos = $_GET['var'];

$consulta = ejecutarSQL::consultar("SELECT
P.idpartidos,
C.equipo1,
(SELECT nombre_equipo FROM equipos WHERE C.equipo1 = idequipos) AS nombreequipo1,
P.golesequipo1,
C.equipo2,
(SELECT nombre_equipo FROM equipos WHERE C.equipo2 = idequipos) AS nombreequipo2,
P.golesequipo2
FROM
partidos P 
INNER JOIN calendario C ON P.idprogramacion = C.idprogramacion
WHERE P.idpartidos = $datos;
");
$consultaequ = mysqli_fetch_assoc($consulta);

$contador1 = $consultaequ["golesequipo1"];
$contador2 = $consultaequ["golesequipo2"];

if (isset($_POST["ok"])) {
    $idjugador = $_POST['selecJugador'];
    $idpartido = $consultaequ["idpartidos"];
    $minuto = $_POST['minuto'];
    $insertar = consultasSQL::InsertSQL("goles", "idpartido,idjugador, minuto", "'$idpartido','$idjugador','$minuto'");
}


?>

<div class="container mt-5">
    <form method=post>
        <div class="card">
            <div class="card-header">
                <h5>Equipo: <?= $consultaequ["nombreequipo1"] ?><br>Goles: <?= $contador1 ?></h5>
                <h5>Equipo: <?= $consultaequ["nombreequipo2"] ?><br>Goles: <?= $contador2 ?></h5>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Nombre del jugador</label>
                    <div class="col-8">
                        <select class="form-control" name="selecJugador">
                            <option value='all'>[--Seleccione un jugador--]</option>
                            <?php
                            $consulta1 = ejecutarSQL::consultar(
                                'SELECT DISTINCT
                            J.idjugador,
                            CONCAT(J.nombres," ",J.apellidos) AS nombreJugador
                            FROM
                            jugador J
                            INNER JOIN alineacion A ON A.idjugador = J.idjugador
                            INNER JOIN equipos E ON A.idequipo = E.idequipos
                            WHERE A.idequipo =' . $consultaequ['equipo1'] . ' OR A.idequipo =' . $consultaequ['equipo1']
                            );
                            while ($fila = mysqli_fetch_assoc($consulta1)) {
                                echo "<option value='" . $fila["idjugador"] . "'>" . $fila["nombreJugador"] . "</option> ";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Minuto de anotación</label>
                    <div class="col-8">
                        <input type="number" class="form-control" name="minuto" id="inputName" placeholder="Seleccione el minuto" require>
                    </div>
                </div>

            </div>
            <?php
            if ($contador1 > 0) {
                echo '<div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" name=ok class="btn btn-primary">Agregar jugador</button>
                </div>
            </div>
        </div>';
            }
            ?>

        </div>
    </form>
</div>