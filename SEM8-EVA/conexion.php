<?php
function conectar() {
    $user="root";
    $pass="";
    $server="localhost";
    $bd="eval02";
    $conexion = new mysqli($server,$user,$pass,$bd) or die ("No hay conexion a la base de datos");
    return $conexion;

}

function desconectar($conn) {
    mysqli_close($conn);
}

?>