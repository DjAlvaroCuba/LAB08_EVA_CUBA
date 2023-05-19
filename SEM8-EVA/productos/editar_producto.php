<?php
include('../conexion.php');
$conexion = conectar();
    if(isset($_POST['enviar'])){
        $id=$_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $stock = $_POST['stock'];
        $precioventa = $_POST['precioventa'];
        
        $sql="update producto set nombre='".$nombre."',descripcion='".$descripcion."', stock='".$stock."', precioventa='".$precioventa."' where id='".$id."'";
        $resultado = mysqli_query($conexion,$sql);

        if($resultado){
            echo "<script languaje='JavaScript'>
            alert ('Producto actualizado');
            location.assign('autores.php')</script>
            ";
        } else {
            echo "<script languaje='JavaScript'>
            alert ('Producto no actualizado');
            location.assign('autores.php')</script>
            ";
        }
        mysqli_close($conexion);

    
    }else{
        $id=$_GET['id'];
        $sql="select*from producto where id='".$id."'";
        $resultado=mysqli_query($conexion,$sql);

        $producto=mysqli_fetch_assoc($resultado);
        $id = $producto['id'];
        $nombre = $producto['nombre'];
        $descripcion = $producto['descripcion'];
        $stock = $producto['stock'];
        $precioventa = $producto['precioventa'];
        
        mysqli_close($conexion);}
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR PRODUCTO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
</head>
<body>

    <h1>EDITAR PRODUCTOO</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label >Nombre</label>
        <input type="text" name="nombre" value="<?php echo $nombre;?>"> <br>

        <label >Descripcion/label>
        <input type="text" name="descripcion" value="<?php echo $descripcion;?>"> <br>

        <label >Stock</label>
        <input type="text" name="stock" value="<?php echo $stock;?>"> <br>

        <label >Precioventa</label>
        <input type="text" name="precioventa" value="<?php echo $precioventa;?>"> <br>

        
         <input type="hidden" name="id" value="<?php echo $id;?>">


        <input type="submit" name="enviar" value="actualizar">
        <a href="usuarios.php">Regresar</a>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>