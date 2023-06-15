<?php
require_once("librerias/configServer.php");
require_once("librerias/consulSQL.php");

$consulta = ejecutarSQL::consultar("select * from equipos where estado = 1");


if (isset($_POST["ok"])) {
    $equipo1 = $_POST['equLocal'];
    $equipo2 = $_POST['equVisitante'];
    $fecha = $_POST['fecha'];
    $jornada = $_POST['jornada'];
    $estado = 1;
    $idtorneo = $_POST['selecTorneo'];

    if ($equipo1 != $equipo2) {
        $insertar = consultasSQL::InsertSQL("calendario", "equipo1, equipo2, fecha, jornada, estado, idtorneo", "'$equipo1','$equipo2','$fecha','$jornada','$estado','$idtorneo'");
    }else {
        echo '<h2>Error al registrar: equipo visitante no puede ser igual al equipo local</h2>';
    }
}


?>

<div class="container mt-5">
    <form method=post>
        <div class="card">
            <div class="card-header">
                Calendario
            </div>
            <div class="card-body">

                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Equipo local</label>
                    <div class="col-8">
                        <select class="form-control" name="equLocal">
                            <option value='all'>[--Seleccione un equipo--]</option>
                            <?php
                            $consulta = ejecutarSQL::consultar("select * from equipos where estado = 1");
                            while ($fila = mysqli_fetch_assoc($consulta)) {
                                echo "
                                
                                <option value='" . $fila["idequipos"] . "'>" . $fila["nombre_equipo"] . "</option>
                                ";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Equipo visitante</label>
                    <div class="col-8">
                        <select class="form-control" name="equVisitante">
                            <option value='all'>[--Seleccione un equipo--]</option>
                            <?php
                            $consulta = ejecutarSQL::consultar("select * from equipos where estado = 1");
                            while ($fila = mysqli_fetch_assoc($consulta)) {
                                echo "
                                
                                <option value='" . $fila["idequipos"] . "'>" . $fila["nombre_equipo"] . "</option>
                                ";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Fecha del partido</label>
                    <div class="col-8">
                        <input type="date" class="form-control" name="fecha" id="inputName" placeholder="seleccione una fecha" require>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Jornada</label>
                    <div class="col-8">
                        <select class="form-control" name="jornada">
                        <option value='all'>[--Seleccione una jornada--]</option>
                        <option value="1">Jornada 1 (Matutino)</option>
                        <option value="2">Jornada 2 (Vespertino)</option>
                        <option value="3">Jornada 3 (Nocturno)</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Torneos</label>
                    <div class="col-8">
                        <select class="form-control" name="selecTorneo">
                            <option value='all'>[--Seleccione un torneo--]</option>
                            <?php
                            $consulta = ejecutarSQL::consultar("select * from torneo where estado = 1");
                            while ($fila = mysqli_fetch_assoc($consulta)) {
                                echo "<option value='" . $fila["idtorneo"] . "'>" . $fila["nombre_torneo"] . "</option> ";
                            }
                            ?>
                        </select>
                    </div>
                </div>

            </div>

            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" name=ok class="btn btn-primary">Agregar equipo</button>
                </div>
            </div>
            <caption style="font-size: 50;"></caption>
            <div class="card-footer text-muted">

            </div>
        </div>
    </form>
</div>
<div class="container mt-5">

    <form method=post>
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label"></label>
            <div class="col-8">
                <select class="form-control" name="selecTorneo">
                    <option value='all'>Mostrar todos los eventos</option>
                    <?php
                    $consulta = ejecutarSQL::consultar("select * from torneo where estado = 1");
                    while ($fila = mysqli_fetch_assoc($consulta)) {
                        echo "<option value='" . $fila["idtorneo"] . "'>" . $fila["nombre_torneo"] . "</option> ";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8">
                <button type="submit" name=mostrarCalen class="btn btn-primary">Mostrar calendario</button>
            </div>
        </div>
    </form>


    <?php
    // Obtiene los eventos para el mes actual desde la base de datos
    $events = [];
    $sql = "";
    $torneo = "";

    if (isset($_POST["mostrarCalen"])) {
        $torneo = $_POST['selecTorneo'];

        if ($torneo == "all") {
            $sql = "SELECT
            C.idprogramacion,
            (SELECT nombre_equipo FROM equipos WHERE C.equipo1=idequipos) AS equipo1,
            (SELECT nombre_equipo FROM equipos WHERE C.equipo2=idequipos) AS equipo2,
            C.fecha,
            C.jornada,
            C.estado,
            (SELECT nombre_torneo FROM torneo WHERE C.idtorneo=idtorneo) AS idtorneo
            FROM
            calendario C
            WHERE estado = 1";
            $result = ejecutarSQL::consultar($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $events[$row["fecha"]][] = $row;
                }
            }
        } else {
            $sql = "SELECT
            C.idprogramacion,
            (SELECT nombre_equipo FROM equipos WHERE C.equipo1=idequipos) AS equipo1,
            (SELECT nombre_equipo FROM equipos WHERE C.equipo2=idequipos) AS equipo2,
            C.fecha,
            C.jornada,
            C.estado,
            (SELECT nombre_torneo FROM torneo WHERE C.idtorneo=idtorneo) AS idtorneo
            FROM
            calendario C
            WHERE idtorneo = $torneo AND estado = 1";
            $result = ejecutarSQL::consultar($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $events[$row["fecha"]][] = $row;
                }
            }
        }
    }else {
        if (isset($_GET['var'])) {
            $var =$_GET['var'] ;
            $torneo = $var;
            if ($var == "all") {
                $sql = "SELECT
                C.idprogramacion,
                (SELECT nombre_equipo FROM equipos WHERE C.equipo1=idequipos) AS equipo1,
                (SELECT nombre_equipo FROM equipos WHERE C.equipo2=idequipos) AS equipo2,
                C.fecha,
                C.jornada,
                C.estado,
                (SELECT nombre_torneo FROM torneo WHERE C.idtorneo=idtorneo) AS idtorneo
                FROM
                calendario C
                WHERE estado = 1";
                $result = ejecutarSQL::consultar($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $events[$row["fecha"]][] = $row;
                    }
                }
            } else {
                $sql = "SELECT
                C.idprogramacion,
                (SELECT nombre_equipo FROM equipos WHERE C.equipo1=idequipos) AS equipo1,
                (SELECT nombre_equipo FROM equipos WHERE C.equipo2=idequipos) AS equipo2,
                C.fecha,
                C.jornada,
                C.estado,
                (SELECT nombre_torneo FROM torneo WHERE C.idtorneo=idtorneo) AS idtorneo
                FROM
                calendario C
                WHERE idtorneo = $var AND estado = 1 ";
                $result = ejecutarSQL::consultar($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $events[$row["fecha"]][] = $row;
                    }
                }
            }
        }
        
    }

    // Obtiene el mes actual o establece un mes dado por el usuario
    $current_month = isset($_GET['month']) ? $_GET['month'] : date('m');
    $current_year = isset($_GET['year']) ? $_GET['year'] : date('Y');
    // Obtiene el número de días en el mes actual
    $num_days = cal_days_in_month(CAL_GREGORIAN, $current_month, $current_year);

    // Crea una matriz con los nombres de los meses
    $months = [
        1 => 'Enero',
        2 => 'Febrero',
        3 => 'Marzo',
        4 => 'Abril',
        5 => 'Mayo',
        6 => 'Junio',
        7 => 'Julio',
        8 => 'Agosto',
        9 => 'Septiembre',
        10 => 'Octubre',
        11 => 'Noviembre',
        12 => 'Diciembre'
    ];



    // Inicializa el número de día para el primer día del mes actual
    $day_num = 1;

    // Imprime la tabla HTML del calendario
    echo '<table style="border: 5px; border-color: black;" class="table table-primary">';
    echo '<caption style="font-size: 50pt; padding-left: 35%;">' . $months[(int)$current_month] . ' ' . $current_year . '</caption>';


    // Itera sobre las filas del calendario
    while ($day_num <= $num_days) {
        echo '<tr>';

        // Itera sobre las celdas de la fila actual   
        for ($i = 1; $i <= 7; $i++) {
            echo '<td>';

            // Comprueba si el día actual es válido
            if ($day_num <= $num_days) {
                // Imprime el número de día actual
                echo "<strong><h2>$day_num</h2></strong>";

                // Comprueba si hay eventos programados para el día actual
                $date = date("Y-m-d", strtotime($current_year . "/" . $current_month . "/" . $day_num));
                if (isset($events[$date])) {
                    foreach ($events[$date] as $event) {
                        
                        echo '<br><div style=" background-color:aliceblue;">' ."Código: ". $event['idprogramacion']
                        ."<br><h6 align = 'center'>".$event['equipo1']." vr ".$event['equipo2']."</h6>";

                        $id= $event['idprogramacion'];
                    }

                    echo '<br>';
                    echo "<form method='get' action='eliminar_calen'>
                    <input type='hidden' name= 'var' value='$id' >
                    <input type='submit' value='Eliminar' style='background-color: lightcoral;'>
                    </form>
                    </div>
                    ";
                }
            }

            echo '</td>';

            // Incrementa el número de día
            $day_num++;
        }

        echo '</tr>';
    }

    echo '</table>';

    // Crea los botones para navegar por los meses
    $prev_month = (($current_month - 1) < 1) ? 12 : ($current_month - 1);
    $prev_year = ($prev_month == 12) ? ($current_year - 1) : $current_year;
    $next_month = (($current_month + 1) > 12) ? 1 : ($current_month + 1);
    $next_year = ($next_month == 1) ? ($current_year + 1) : $current_year;

    echo '<a style="padding-left: 45%;" href="?month=' . $prev_month . '&year=' . $prev_year . '&var=' .$torneo. '">Anterior</a> | ';
    echo '<a href="?month=' . $next_month . '&year=' . $next_year . '&var=' .$torneo. '">Siguiente</a>';
    ?>
</div>