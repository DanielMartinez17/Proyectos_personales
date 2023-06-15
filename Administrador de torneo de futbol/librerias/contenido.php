<?php

class contenido{

    public function ver(){

        if(!(isset($_GET["url"]))){
            return "vistas/inicio.php";
        }
        $datos=explode("/",$_GET["url"]);

        if($datos[0]."_view.php"=="admin_equ_view.php"){
            return "vistas/equipos/".$datos[0]."_view.php";
            
        }elseif($datos[0]."_view.php"=="edit_equ_view.php"){
            return "vistas/equipos/".$datos[0]."_view.php";

        }elseif($datos[0]."_view.php"=="admin_jug_view.php"){
            return "vistas/jugadores/".$datos[0]."_view.php";

        }elseif($datos[0]."_view.php"=="edit_jug_view.php"){
            return "vistas/jugadores/".$datos[0]."_view.php";

        }elseif($datos[0]."_view.php"=="admin_calen_view.php"){
            return "vistas/calendario/".$datos[0]."_view.php";

        }elseif($datos[0]."_view.php"=="eliminar_calen_view.php"){
            return "vistas/calendario/".$datos[0]."_view.php";

        }elseif($datos[0]."_view.php"=="admin_tor_view.php"){
            return "vistas/torneo/".$datos[0]."_view.php";
            
        }elseif($datos[0]."_view.php"=="admin_part_view.php"){
            return "vistas/partidos/".$datos[0]."_view.php";

        }elseif($datos[0]."_view.php"=="agr_part_view.php"){
            return "vistas/partidos/".$datos[0]."_view.php";

        }elseif($datos[0]."_view.php"=="admin_gol_view.php"){
            return "vistas/goles/".$datos[0]."_view.php";
            
        }elseif($datos[0]."_view.php"=="desig_gol_view.php"){
            return "vistas/goles/".$datos[0]."_view.php";
            
        }elseif($datos[0]."_view.php"=="admin_ali_view.php"){
            return "vistas/alineaciones/".$datos[0]."_view.php";
            
        }elseif($datos[0]."_view.php"=="agr_ali_view.php"){
            return "vistas/alineaciones/".$datos[0]."_view.php";
            
        }elseif($datos[0]."_view.php"=="cons_ali_view.php"){
            return "vistas/alineaciones/".$datos[0]."_view.php";
            
        }elseif($datos[0]."_view.php"=="admin_resul_view.php"){
            return "vistas/resultados/".$datos[0]."_view.php";
            
        }elseif($datos[0]."_view.php"=="mostrar_resul_view.php"){
            return "vistas/resultados/".$datos[0]."_view.php";
            
        }

    }

    public function verificar_archivo($archivo){
       // echo getcwd();
       // echo "<br>".$archivo."_view.php";
        if(is_file("vistas/escuelas/".$archivo."_view.php")){
            return true;
        }else{
            return false;
        }
    }
}


?>