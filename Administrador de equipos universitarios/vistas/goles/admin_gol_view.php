<?php
require_once("librerias/configServer.php");
require_once("librerias/consulSQL.php");
?>

<div class="container mt-5">
    <form method=post>
        <div class="card">
            <div class="card-header">
                Goles
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
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <?php
                        $consulta = ejecutarSQL::consultar("SELECT
                        P.idpartidos,
                        (SELECT nombre_equipo FROM equipos WHERE C.equipo1 = idequipos) AS equipo1,
                        P.golesequipo1,
                        (SELECT nombre_equipo FROM equipos WHERE C.equipo2 = idequipos) AS equipo2,
                        P.golesequipo2
                        FROM
                        partidos P 
                        INNER JOIN calendario C ON P.idprogramacion = C.idprogramacion
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
                            <th scope='col'>
                                <form method='get' action='desig_gol'>
                                    <input type='hidden' name= 'var' value='$id' >
                                    <input type='submit' class='btn btn-primary' value='Designar goles'>
                                </form>
                            </th>  
                            </tbody>";
                        } 
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>