<?php 
require_once 'conexion.php';
class Sectores{
    const TABLA = 'sector';
    public static function mostrar(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare(" SELECT * FROM " . self::TABLA );
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }
}

?>