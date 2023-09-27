<?php
include_once 'RegistroUsuario.php';
    $usuario = new Usuario($_POST['user'],$_POST['email'],md5($_POST['password']),$_POST['residencia']);
    if(md5($_POST['password']) == md5($_POST['Cpassword'])){
        $usuario->guardar();
        echo "<script>window.location='../Index.html';
            </script>";
    }else{
        echo ' las contraseñas no coinciden';
    }


?>