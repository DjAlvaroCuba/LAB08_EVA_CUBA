<?php
 $id=$_GET['id'];
 include('../conexion.php');
 $conexion = conectar();
 $sql="delete from producto where id='".$id."'";
 $resultado=mysqli_query($conexion,$sql);
 if($resultado) {
    echo "<script languaje='JavaScript'>
    alert ('producto  eliminado');
    location.assign('autores.php')</script>
    ";
 }else {
    echo "<script languaje='JavaScript'>
            alert ('Producto no eliminado');
            location.assign('autores.php')</script>
            ";
 }

?>