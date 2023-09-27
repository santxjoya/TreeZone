<?php
    include_once 'RegistroUsuario.php';
    session_start();
    $email = $_SESSION['email'];
    $user = Usuario::mostrar($email);
    $name = $_POST['user'];
    $residencia = $_POST['residencia'];
    $password = md5($_POST['password']);
    if(md5($_POST['password']) == md5($_POST['Cpassword'])){
        $result=Usuario::editar($name,$residencia,$password,$email);
        header("Location: ../View/Mapa.php");
    }else{
        echo ' las contraseñas no coinciden';
    }
?>