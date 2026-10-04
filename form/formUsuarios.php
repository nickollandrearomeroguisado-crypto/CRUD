<?php
    require "../db/obtener_usuario.php";
    require "../includes/users/create.php";
    // require "../includes/users/update.php";
    // require "../includes/funciones.php";
    
    // session_start();
    // if(!isset($_SESSION['Cedula'])){
    //     header('Location: ../index.php');
    // }

    $addUser = create_user();
    $usuarios = obtener_usuarios();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <form action="" method= "POST">
        <h2>Registro de Usuarios</h2>
        <label for="cedula">Cédula:</label>
        <input type="text" name="Cedula" id="Cedula"><br>
    
        <label for="name">Nombre:</label>
        <input type="text" name="Nombre" id="Nombre"><br>

        <label for="name">Apellido:</label>
        <input type="text" name="Apellido" id="Apellido"><br>

        <label for="email">Email:</label>
        <input type="email" name="Email" id="Email"><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="Password" id="Password"><br>

        <label for="password">Confirmar Contraseña:</label>
        <input type="password" name="c_password" id="C_password"><br>

        <label for="telefono">Telefono:</label>
        <input type="number" name="Telefono" id="Telefono"><br>

        <input type="submit" name="agregar" value="Agregar"><br>

        <a href="../pag/user.php">Cancelar</a>
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

    