<?php
include('../conexion.php');
$conexion = conectar();
    if(isset($_POST['enviar'])){
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $apellido_paterno=$_POST['apellido_paterno'];
        $apellido_materno=$_POST['apellido_materno'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $password_p = $_POST['password_p'];
        
        $sql="update usuario set nombre='".$nombre."',apellido_paterno='".$apellido_paterno."', apellido_materno='".$apellido_materno."', direccion='".$direccion."',email='".$email."', telefono='".$telefono."',password_p='".$password_p."' where id='".$id."'";
        $resultado = mysqli_query($conexion,$sql);

        if($resultado){
            echo "<script languaje='JavaScript'>
            alert ('Usuario actualizado');
            location.assign('autores.php')</script>
            ";
        } else {
            echo "<script languaje='JavaScript'>
            alert ('Usuario no actualizado');
            location.assign('autores.php')</script>
            ";
        }
        mysqli_close($conexion);

    
    }else{
        $id=$_GET['id'];
        $sql="select*from usuario where id='".$id."'";
        $resultado=mysqli_query($conexion,$sql);

        $usuario=mysqli_fetch_assoc($resultado);
        $nombre=$usuario["nombre"];
        $apellido_paterno=$usuario["apellido_paterno"];
        $apellido_materno=$usuario["apellido_materno"];
        $direccion = $usuario['direccion'];
        $email = $usuario['email'];
        $telefono = $usuario['telefono'];
        $password_p = $usuario['password_p'];
        
        mysqli_close($conexion);}
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR USUARIO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
</head>
<body>

    <h1>EDITAR USUARIO</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label >Nombre</label>
        <input type="text" name="nombre" value="<?php echo $nombre;?>"> <br>

        <label >Apellido_paterno</label>
        <input type="text" name="apellido_paterno" value="<?php echo $apellido_paterno;?>"> <br>

        <label >apellido_materno</label>
        <input type="text" name="apellido_materno" value="<?php echo $apellido_materno;?>"> <br>

        <label >Direccion</label>
        <input type="text" name="direccion" value="<?php echo $direccion;?>"> <br>

        <label >Email</label>
        <input type="text" name="email" value="<?php echo $email;?>"> <br>

        <label >Telefono</label>
        <input type="text" name="telefono" value="<?php echo $telefono;?>"> <br>

        <label >Password</label>
        <input type="text" name="password_p" value="<?php echo $password_p;?>"> <br>

        
         <input type="hidden" name="id" value="<?php echo $id;?>">


        <input type="submit" name="enviar" value="actualizar">
        <a href="usuarios.php">Regresar</a>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>