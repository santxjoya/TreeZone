<?php
session_start();
include_once 'RegistroUsuario.php';
    $usuario = new Usuario(0,$_POST['email'],md5($_POST['password']),0);
    $result=$usuario->iniciar();
    // $long = count ($result);
    //     for ($i = 0; $i < $long; $i++){
    //         echo $result [$i];
    //     }
        if($result > 0){
            $_SESSION['email'] = $_POST['email'];
            echo "<script>window.location='../View/Mapa.php';
            </script>";
        }else{
            echo "No se encuentra registrado";
        } 
?>