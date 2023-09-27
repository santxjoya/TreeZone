<?php
require_once 'conexion.php';
class Usuario{
    private $id;
    private $nombre;
    private $email;
    private $contraseña;
    private $residencia;
    const TABLA = 'usuarios';

    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getContraseña(){
        return $this->contraseña;
    }
    public function getResidencia(){
        return $this->residencia;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setContraseña($contraseña){
        $this->contraseña = $contraseña;
    }

    public function __construct($nombre, $email, $contraseña,$residencia, $id=null)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->contraseña = $contraseña;
        $this->residencia = $residencia;
        $this->id = $id;
    }
    public function guardar(){
        $conexion = new Conexion();
        {
            $consulta = $conexion->prepare('INSERT INTO '. self::TABLA . '(user_name,user_email,user_password, user_residencia)VALUES(:user_name, :user_email, :user_password, :user_residencia)');
            $consulta->bindParam(':user_name',$this->nombre);
            $consulta->bindParam(':user_email',$this->email);
            $consulta->bindParam(':user_password',$this->contraseña);
            $consulta->bindParam(':user_residencia',$this->residencia);
            $consulta->execute();
            $this->id = $conexion->lastInsertId();
        }
    }
    public static function mostrar($email){
        $conexion = new Conexion();
        $consulta = $conexion->prepare(" SELECT * FROM " . self::TABLA . " WHERE user_email = '$email'");
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }
    public function iniciar(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE user_email = "'.$this->email.'" AND user_password = "'.$this->contraseña.'"');
        $consulta->execute();
        $registros = $consulta->fetchColumn();
        $result = $consulta->fetchAll();
        // $long = count ($result);
        // for ($i = 0; $i < $long; $i++){
        //     echo $result [$i];
        // }
        return $registros;
    }
    public static function editar($name,$residencia,$password,$email){
        $conexion = new Conexion();
        $consulta = $conexion->prepare(" UPDATE usuarios
        SET user_name = '$name', user_residencia = '$residencia', user_password ='$password'
        WHERE user_email = '$email'");
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }
}
?>