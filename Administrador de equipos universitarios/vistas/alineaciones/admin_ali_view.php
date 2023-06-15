<?php
require_once("librerias/configServer.php");
require_once("librerias/consulSQL.php");
?>

<div class="container mt-5">
    <form method=post>
        <div class="card">
            <div class="card-header">
                Partidos
            </div>
            
            <div class="card-footer text-muted">
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Código de<br> partido</th>
                                <th scope="col">Equipo 1</th>
                                <th scope='col'>Equipo 2</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Jornada</th>
                                <th scope="col">Torneo</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <?php
                        $consulta = ejecutarSQL::consultar("SELECT
                        C.idprogramacion,
                        (SELECT nombre_equipo FROM equipos WHERE C.equipo1=idequipos) AS equipo1,
                        (SELECT nombre_equipo FROM equipos WHERE C.equipo2=idequipos) AS equipo2,
                        (SELECT idequipos FROM equipos WHERE C.equipo1=idequipos) AS idequipo1,
                        (SELECT idequipos FROM equipos WHERE C.equipo2=idequipos) AS idequipo2,
                        (SELECT idpartidos FROM partidos WHERE C.idprogramacion=idprogramacion) AS idpartido,
                        C.fecha,
                        C.jornada,
                        C.estado,
                        (SELECT nombre_torneo FROM torneo WHERE C.idtorneo=idtorneo) AS idtorneo
                        FROM
                        calendario C
                        INNER JOIN partidos P ON C.idprogramacion= P.idprogramacion
                        ");

                        while ($fila = mysqli_fetch_array($consulta)) {
                            $id = [
                                1 => $fila['idprogramacion'],
                                2 => $fila['idequipo1'],
                                3 => $fila['idequipo2'],
                                4 => $fila['idpartido']
                            ];
                            $id = serialize($id);

                            echo "<tbody>
                            <th scope='col'></th>
                            <th name='id' scope='col'>$fila[idprogramacion]</th>
                            <th scope='col'>$fila[equipo1]</th>
                            <th scope='col'>$fila[equipo2]</th>
                            <th scope='col'>$fila[fecha]</th>
                            <th scope='col'>$fila[jornada]</th>
                            <th scope='col'>$fila[idtorneo]</th>
                            <th scope='col'>
                                <form method='get' action='agr_ali'>
                                    <input type='hidden' name= 'var' value='$id' >
                                    <input type='submit' class='btn btn-primary' value='Agregar alineaciones'>
                                </form>
                            </th>
                            <th scope='col'>
                                <form method='get' action='cons_ali'>
                                    <input type='hidden' name= 'var' value='$id' >
                                    <input type='submit' class='btn btn-primary' value='Ver alineaciones'>
                                </form>  
                            </tbody>";
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>
    </form>
</div>