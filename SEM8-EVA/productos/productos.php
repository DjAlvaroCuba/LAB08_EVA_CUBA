<?php

include('../conexion.php');

// Abrimos la conexión a la BD MySQL
$conexion = conectar();

// Definimos la consulta SQL
$sql = 'SELECT id, nombre, descripcion,stock,precioventa FROM producto';

// Ejecjutamos el query en la conexión abierta
$resultado = mysqli_query($conexion, $sql);
if (!$resultado) {
    // handle the error
    echo "Error en la ejecución de la consulta: " . mysqli_error($conexion);
    exit;
}
// Cerramos la conexión
desconectar($conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    
</head>
<body>
    <h1>Productos</h1>
    <div>
        <a href="agregar_p.html">Nuevo Producto</a>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>descripcion</th>
                    <th>stock</th>
                    <th>precioventa</th>

                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            <?php
               
                while($producto = mysqli_fetch_array($resultado)) {
                    $id = $producto['id'];
                    $nombre = $producto['nombre'];
                    $descripcion = $producto['descripcion'];
                    $stock = $producto['stock'];
                    $precioventa = $producto['precioventa'];
                   
                    
                    echo '<tr>';
                    echo '<td>' . $id . '</td>';
                    echo '<td>' . $nombre . '</td>';
                    echo '<td>' . $descripcion . '</td>';
                    echo '<td>' . $stock . '</td>';
                    echo '<td>' . $precioventa. '</td>';
                    echo "<td><a href='editar_producto.php?id=".$producto['id']."'>Editar</a>";
                    echo "<td><a href='eliminar_producto.php?id=".$producto['id']."'>Eliminar</a>";
                }
                    ?>
            </tbody>
        </table>
    </div>
    <a href="../index.html">Regresar pagina de inicio</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>