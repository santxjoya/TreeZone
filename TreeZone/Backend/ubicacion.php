<?php
    include_once 'RegistroUbicacion.php';
    include_once 'RegistroUsuario.php';
    session_start();
    $email = $_SESSION['email'];
    $user = Usuario::mostrar($email);
    $id_user = $user[0]['user_id'];
    
    $lugarFrecuente = new Ubicacion($_POST['nombre'],$_POST['direccion'],$id_user,$_POST['localidad']);
    $lugarFrecuente->guardar();
    header("Location: ../View/Mapa.php");
?>