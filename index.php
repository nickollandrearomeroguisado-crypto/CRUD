<?php
    include "pag/sigIn.php";
    // include "pag/cerrarSesion.php";
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
        <h1>Login</h1>

        <label for="dni-form">Cédula</label>
        <input type="number" name="dni-form"><br>
        <label for="pw-form">Contraseña</label>
        <input type="password" name="pw-form"><br>

        <input type="submit" value="Enviar" name="validar-usuario">
    </form>
    <style>
        *{
            text-align: center;
        }
    </style>
    <!-- <table>
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
            </tr> -->
            <?php
                //while($user = mysqli_fetch_assoc($usuarios)) {
            ?>

            <!-- <tr>
                <td><? //php echo $user['Nombre'] ?></td>
                <td><? //php echo $user['Apellido'] ?></td>
            </tr> -->

            <?php
                //}  
            ?>

        <!-- </tbody>
    </table> -->

    <?php
    // if ($addUser) {
    //     foreach ($addUser as $error) {
    //         echo "<p> .$error. </p>";
    //     }
    // }
    ?>
</body>
</html>