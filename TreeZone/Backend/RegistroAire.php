<?php
require_once 'conexion.php';
class Aire{


    const TABLA = 'aire';


    public function mostrar(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare(" SELECT * FROM sector INNER JOIN aire ON sector.sect_id = aire.aire_id;");
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }
    public static function graficas(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare("SELECT * FROM sector INNER JOIN aire ON sector.sect_id = aire.aire_id; ");
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;

    }

    
}   
?>