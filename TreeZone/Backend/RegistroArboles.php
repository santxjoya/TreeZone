<?php
require_once 'conexion.php';
class Arbol{

    const TABLA = 'sector';

    public function mostrar(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare(" SELECT * FROM " . self::TABLA . " WHERE id = '1'");
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }
    public static function graficas(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare(" SELECT * FROM " . self::TABLA);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;

    }

    
}   
?>