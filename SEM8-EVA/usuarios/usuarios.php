<?php

include('../conexion.php');

// Abrimos la conexión a la BD MySQL
$conexion = conectar();

// Definimos la consulta SQL
$sql = 'SELECT id, nombre, apellido_paterno,apellido_materno,direccion,email,telefono,password_p  FROM usuario';

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
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    
</head>
<body>
    <h1>Usuarios</h1>
    <div>
        <a href="agregar_u.html">Nuevo Usuario</a>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido_paterno</th>
                    <th>Apellido_materno</th>
                    <th>Direccion</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>password_p</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            <?php
               
                while($usuario = mysqli_fetch_array($resultado)) {
                    $id = $usuario['id'];
                    $nombre = $usuario['nombre'];
                    $apellido_paterno = $usuario['apellido_paterno'];
                    $apellido_materno = $usuario['apellido_materno'];
                    $direccion = $usuario['direccion'];
                    $email = $usuario['email'];
                    $telefono = $usuario['telefono'];
                    $password_p = $usuario['password_p'];
                    
                    echo '<tr>';
                    echo '<td>' . $id . '</td>';
                    echo '<td>' . $nombre . '</td>';
                    echo '<td>' . $apellido_paterno . '</td>';
                    echo '<td>' . $apellido_materno . '</td>';
                    echo '<td>' . $direccion . '</td>';
                    echo '<td>' . $email . '</td>';
                    echo '<td>' . $telefono . '</td>';
                    echo '<td>' . $password_p . '</td>';
                    echo "<td><a href='editar_usuario.php?id=".$usuario['id']."'>Editar</a>";
                    echo "<td><a href='eliminar_usuario.php?id=".$usuario['id']."'>Eliminar</a>";
                }
                    ?>
            </tbody>
        </table>
    </div>
    <a href="../index.html">Regresar pagina de inicio</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>