<?php
    // require "../db/obtener_usuario.php";
    // require "../includes/users/delete.php";
    // require "../db/conexion.php";
    
    $idUser = $_GET['id'];
    // var_dump($idUser);
    // exit;
    $errores = [];
    
    $query = "SELECT * FROM Usuario WHERE id= ".$idUser.";";
    $usuario = mysqli_query($conex, $query);


    $addUser = delete_user();
    // $usuario = obtener_usuario();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminación</title>
</head>
<body>
    <form action="" method= "POST">
        <?php
            foreach ($usuario as $data) {
        ?>
        <h2>Eliminación de Usuarios</h2>
        <label for="cedula">Cédula:</label>
        <input type="text" name="Cedula" id="Cedula" value="<?php echo $data['Cedula'];?>"><br>
    
        <label for="name">Nombre:</label>
        <input type="text" name="Nombre" id="Nombre" value="<?php echo $data['Nombre'];?>"><br>

        <label for="name">Apellido:</label>
        <input type="text" name="Apellido" id="Apellido" value="<?php echo $data['Apellido'];?>"><br>

        <label for="email">Email:</label>
        <input type="email" name="Email" id="Email" value="<?php echo $data['Email'];?>"><br>

        <label for="telefono">Telefono:</label>
        <input type="number" name="Telefono" id="Telefono" value="<?php echo $data['Telefono'];?>"><br>

        <label for="password">Contraseña Actual:</label>
        <input type="password" name="password" id="password"><br>

        <input type="submit" name="eliminar" value="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este registro?');"><br>

        <a href="../pag/user.php">Cancelar</a>

        <?php
            }
        ?>
    </form>

    <?php

        if($addUser) {
            foreach ($addUser as $error) {
                echo "<p> .$error. </p>";
            }
        }
    ?>

</body>
</html>