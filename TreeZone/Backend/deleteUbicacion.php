<?php
include_once 'RegistroUbicacion.php';
    $ubic_id = $_POST['ubic_id'];
    $delete = Ubicacion::eliminar($ubic_id);
    header("Location: ../View/Mapa.php");
?>