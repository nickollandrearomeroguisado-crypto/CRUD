<?php
    // require "../db/obtener_usuario.php";
    require "../includes/users/update.php";
    require "../db/conexion.php";
    
    $idUser = $_GET['id'];
    // var_dump($idUser);
    // exit;
    $errores = [];
    
    $query = "SELECT * FROM Usuario WHERE id= ".$idUser.";";
    $usuario = mysqli_query($conex, $query);
    // var_dump($usuario);
    // exit;
    $Password = "";

    if (isset($_POST['actualizar'])) {
        $Password = mysqli_real_escape_string($conex, $_POST['password'] ?? '');
        // var_dump($Password);
        // exit;
    }

    $addUser = update_user();
    // $usuario = obtener_usuario();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización</title>
</head>
<body>
    <form action="" method= "POST">
        <?php
            foreach ($usuario as $data) {
        ?>
        <h2>Actualización de Usuarios</h2>
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

        <label for="n_password">Nueva Contraseña:</label>
        <input type="password" name="n_password" id="n_password"><br>

        <label for="c_password">Confirmar Contraseña:</label>
        <input type="password" name="c_password" id="c_password"><br>

        <input type="submit" name="actualizar" value="Actualizar"><br>

        <a href="../pag/user.php">Cancelar</a>

        <?php
            $passDB = $data['New_Password'];
            // var_dump($passDB);
            // exit;

            $validarPassword = password_verify($Password, $passDB);
            // var_dump($validarPassword);
            // exit;

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