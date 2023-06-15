<?php
require_once("librerias/configServer.php");
require_once("librerias/consulSQL.php");
?>

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
                <button type="submit" name=mostrar class="btn btn-primary">Mostrar calendario</button>
            </div>
        </div>
    </form>



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
                                <th scope='col'>Goles del <br> equipo 1</th>
                                <th scope="col">Equipo 2</th>
                                <th scope="col">Goles del <br> equipo 2</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Jornada</th>
                                <th scope="col">Torneo</th>
                            </tr>
                        </thead>
                        <?php
                        if (isset($_POST["mostrar"])) {
                            $torneo = $_POST['selecTorneo'];

                            if ($torneo == "all") {
                                $consulta = ejecutarSQL::consultar("SELECT
                                P.idpartidos,
                                (SELECT nombre_equipo FROM equipos WHERE C.equipo1=idequipos) AS equipo1,
                                P.golesequipo1,
                                (SELECT nombre_equipo FROM equipos WHERE C.equipo2=idequipos) AS equipo2,
                                P.golesequipo2,
                                C.fecha,
                                C.jornada,
                                (SELECT nombre_torneo FROM torneo WHERE C.idtorneo = idtorneo) AS torneo
                                FROM
                                    partidos P
                                INNER JOIN calendario C ON P.idprogramacion=C.idprogramacion
                                    WHERE P.estado = 1");

                                        while ($fila = mysqli_fetch_array($consulta)) {
                                            $id = $fila['idpartidos'];
                                            echo "<tbody>
                                    <th scope='col'></th>
                                    <th name='id' scope='col'>$fila[idpartidos]</th>
                                    <th scope='col'>$fila[equipo1]</th>
                                    <th scope='col'>$fila[golesequipo1]</th>
                                    <th scope='col'>$fila[equipo2]</th>
                                    <th scope='col'>$fila[golesequipo2]</th>
                                    <th scope='col'>$fila[fecha]</th> 
                                    <th scope='col'>$fila[jornada]</th> 
                                    <th scope='col'>$fila[torneo]</th> 
                                    </tbody>";
                                }
                            }else {
                                $consulta = ejecutarSQL::consultar("SELECT
                                P.idpartidos,
                                (SELECT nombre_equipo FROM equipos WHERE C.equipo1=idequipos) AS equipo1,
                                P.golesequipo1,
                                (SELECT nombre_equipo FROM equipos WHERE C.equipo2=idequipos) AS equipo2,
                                P.golesequipo2,
                                C.fecha,
                                C.jornada,
                                (SELECT nombre_torneo FROM torneo WHERE C.idtorneo = idtorneo) AS torneo
                                FROM
                                    partidos P
                                INNER JOIN calendario C ON P.idprogramacion=C.idprogramacion
                                WHERE C.idtorneo =$torneo AND P.estado = 1");

                                        while ($fila = mysqli_fetch_array($consulta)) {
                                            $id = $fila['idpartidos'];
                                            echo "<tbody>
                                    <th scope='col'></th>
                                    <th name='id' scope='col'>$fila[idpartidos]</th>
                                    <th scope='col'>$fila[equipo1]</th>
                                    <th scope='col'>$fila[golesequipo1]</th>
                                    <th scope='col'>$fila[equipo2]</th>
                                    <th scope='col'>$fila[golesequipo2]</th>
                                    <th scope='col'>$fila[fecha]</th> 
                                    <th scope='col'>$fila[jornada]</th> 
                                    <th scope='col'>$fila[torneo]</th> 
                                    </tbody>";
                                }
                            }
                        }else {
                            $consulta = ejecutarSQL::consultar("SELECT
                            P.idpartidos,
                            (SELECT nombre_equipo FROM equipos WHERE C.equipo1=idequipos) AS equipo1,
                            P.golesequipo1,
                            (SELECT nombre_equipo FROM equipos WHERE C.equipo2=idequipos) AS equipo2,
                            P.golesequipo2,
                            C.fecha,
                            C.jornada,
                            (SELECT nombre_torneo FROM torneo WHERE C.idtorneo = idtorneo) AS torneo
                            FROM
                                partidos P
                            INNER JOIN calendario C ON P.idprogramacion=C.idprogramacion
                                WHERE P.estado = 1");

                                    while ($fila = mysqli_fetch_array($consulta)) {
                                        $id = $fila['idpartidos'];
                                        echo "<tbody>
                                <th scope='col'></th>
                                <th name='id' scope='col'>$fila[idpartidos]</th>
                                <th scope='col'>$fila[equipo1]</th>
                                <th scope='col'>$fila[golesequipo1]</th>
                                <th scope='col'>$fila[equipo2]</th>
                                <th scope='col'>$fila[golesequipo2]</th>
                                <th scope='col'>$fila[fecha]</th> 
                                <th scope='col'>$fila[jornada]</th> 
                                <th scope='col'>$fila[torneo]</th> 
                                </tbody>";
                            }
                        }



                        ?>

                    </table>
                </div>
            </div>
        </div>
    </form>
</div>