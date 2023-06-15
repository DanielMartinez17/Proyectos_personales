<?php
session_start();
include_once('consulSQL.php');

class cls_login{

    public function inicio($datos){
        $sql="select * from albitros where usuario='$datos[0]' and contraseña='$datos[1]'";
        $rs=ejecutarSQL::consultar($sql);
        if($rs->num_rows>0){
            $_SESSION["registro"]="1";
            print "<script>window.setTimeout(function() { window.location = 'http://localhost/EXAMEN/index.php' }, 0);</script>";
        }else{
            header("location:../login.php");
        }
    }
}

?>