<?php
    require './db/funciones.php';
    
    $usuarios = obtener_usuarios();
    $addUser = create_user();

    // var_dump(mysqli_fetch_assoc($usuarios));
    if (isset($_POST['validar-usuario'])) {
        require './db/conexion.php';
        
        $userForm = $_POST['dni-form'];
        $pwForm = $_POST['pw-form'];
        $userDB = "";
        $pwDB = "";

        $query = "SELECT * FROM Usuario WHERE cedula = '{$userForm}';";
        // var_dump($query);
        $usuarios = mysqli_query($conex, $query);
        // var_dump($usuarios);

        // foreach ($usuarios as $data) {
        //     var_dump($data); 
        // }

        // exit;
        if ($usuarios-> num_rows > 0) {
            foreach ($usuarios as $usuario) {
                $userDB = $usuario['Cedula'];
                $pwDB = $usuario['Password'];
            }
            $autenticado = password_verify($pwForm, $pwDB); //identifica si la contraseña esta en la bases de datos
            if ($userForm === $userDB && $autenticado) {
                echo "Usuario autenticado con éxito";
            } else {
                echo "Usuario o contraseña incorrectos";
            }
            // var_dump($autenticado);
            // exit;
            // echo "validamos usuario";
        } else {
            echo "Usuario o contraseña incorrectos";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo conexión DB</title>
</head>
<body>
    <form action="" method="POST">
        <label for="dni-form">Cédula</label>
        <input type="number" name="dni-form">
        <label for="pw-form">Contraseña</label>
        <input type="password" name="pw-form">

        <input type="submit" value="Enviar" name="validar-usuario">
    </form>
    <h1>Conexión con MySqli</h1>
    <table>
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Juanito</td>
                <td>Perez</td>
            </tr>
            <?php
                while($user = mysqli_fetch_assoc($usuarios)) {
            ?>

            <tr>
                <td><?php echo $user['Nombre'] ?></td>
                <td><?php echo $user['Apellido'] ?></td>
            </tr>

            <?php
                }  
            ?>

        </tbody>
    </table>

    <?php
    if ($addUser) {
        foreach ($addUser as $error) {
            echo "<p> .$error. </p>";
        }
    }
    ?>

    <form action="" method= "POST">
        <label for="cedula">Cédula:</label>
        <input type="text" name="Cedula" id="">
    
        <label for="name">Nombre:</label>
        <input type="text" name="Nombre" id="name">

        <label for="name">Apellido:</label>
        <input type="text" name="Apellido" id="last name">

        <label for="email">Email:</label>
        <input type="email" name="Email" id="email">

        <label for="password">Contraseña:</label>
        <input type="password" name="Password" id="password">

        <label for="password">Confirmar Contraseña:</label>
        <input type="password" name="c_password" id="c_password">

        <label for="telefono">Telefono:</label>
        <input type="number" name="Telefono" id="telefono">

        <input type="submit" name="agregar" value="Agregar">
    </form>
</body>
</html>