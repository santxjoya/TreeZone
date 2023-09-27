<?php 
require_once 'conexion.php';
class Ubicacion{
    private $ubic_id;
    private $ubic_name;
    private $direccion;
    private $user_id;
    private $sect_id;
    const TABLA = 'ubicacion';

    public function getId(){
        return $this->ubic_id;
    }
    public function getIdUser(){
        return $this->user_id;
    }
    public function getIdSect(){
        return $this->sect_id;
    }
    public function getNombre(){
        return $this->ubic_name;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function setNombre($ubic_name){
        $this->ubic_name = $ubic_name;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    
    public function __construct($ubic_name, $direccion, $user_id, $sect_id, $ubic_id=null)
    {
        $this->ubic_name = $ubic_name;
        $this->direccion = $direccion;
        $this->user_id = $user_id;
        $this->sect_id = $sect_id;
        $this->ubic_id = $ubic_id;
    }
    public function guardar(){
        $conexion = new Conexion();{
            $consulta = $conexion->prepare('INSERT INTO '. self::TABLA . '(ubic_name,ubic_frecuente,user_id,sect_id)VALUES(:ubic_name, :ubic_frecuente,:user_id,:sect_id)');
            $consulta->bindParam(':ubic_name',$this->ubic_name);
            $consulta->bindParam(':ubic_frecuente',$this->direccion);
            $consulta->bindParam(':user_id',$this->user_id);
            $consulta->bindParam(':sect_id',$this->sect_id);
            $consulta->execute();
            $this->ubic_id = $conexion->lastInsertId();

        }
    }
    public static function mostrar(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare(" SELECT * FROM ubicacion INNER JOIN sector ON ubicacion.sect_id = sector.sect_id;" );
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }
    public static function eliminar($ubic_id){
        $conexion = new Conexion();
        $consulta = $conexion->prepare(" DELETE FROM " . self::TABLA . " WHERE ubic_id = '$ubic_id'");
        $consulta->execute();
    }
}

?>