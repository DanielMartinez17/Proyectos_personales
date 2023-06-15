<?php


/* Clase para ejecutar las consultas a la Base de Datos*/
class ejecutarSQL {
    public static function conectar(){
        $con = new mysqli("localhost", "root", "", "examen3php");
        return $con;

        if($con->connect_error){
            die("Error en el servidor, verifique sus datos".$con->connect_error);
            
        }
       
       
        /* Codificar la información de la base de datos a UTF8*/
        mysqli_character_set_name($con);
         
    }
    public static function consultar($query) {
        $consul = mysqli_query(ejecutarSQL::conectar(),$query);
        return $consul;

    }   
}
/* Clase para hacer las consultas Insertar, Eliminar y Actualizar */
class consultasSQL{
    public static function InsertSQL($tabla, $campos, $valores) {
        if (!$consul = ejecutarSQL::consultar("insert into $tabla ($campos) VALUES($valores)")) {
            die("Ha ocurrido un error al insertar los datos en la tabla $tabla");
        }
        return $consul;
    }
    public static function DeleteSQL($tabla, $condicion) {
        if (!$consul = ejecutarSQL::consultar("delete from $tabla where $condicion")) {
            die("Ha ocurrido un error al eliminar los registros en la tabla $tabla");
        }
        return $consul;
    }
    public static function UpdateSQL($tabla, $campos, $condicion) {
        if (!$consul = ejecutarSQL::consultar("update $tabla set $campos where $condicion")) {
            die("Ha ocurrido un error al actualizar los datos en la tabla $tabla");
        }
        return $consul;
    }
}

