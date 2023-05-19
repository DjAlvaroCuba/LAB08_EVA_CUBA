<?php
 $id=$_GET['id'];
 include('../conexion.php');
 $conexion = conectar();
 $sql="delete from usuario where id='".$id."'";
 $resultado=mysqli_query($conexion,$sql);
 if($resultado) {
    echo "<script languaje='JavaScript'>
    alert ('Usuario  eliminado');
    location.assign('autores.php')</script>
    ";
 }else {
    echo "<script languaje='JavaScript'>
            alert ('Usuario no eliminado');
            location.assign('autores.php')</script>
            ";
 }

?>