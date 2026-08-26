<?php
    require './db/funciones.php';

    $usuarios = obtener_usuarios();

    // var_dump(mysqli_fetch_assoc($usuarios));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo conexión DB</title>
</head>
<body>
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

                if (isset($_POST['agregar'])) {
                    create_user($_POST['ID'], $_POST['Nombre'], $_POST['Apellido']);
                }
                    
            ?>

        </tbody>
    </table>
    <form method= "POST">
        <label for="name">Nombre:</label>
        <input type="text" name="Nombre" id="name">

        <label for="">Apellido:</label>
        <input type="text" name="Apellido" id="last name">

        <input type="text" name="ID" placeholder="Id_Usuario">
        
        <input type="submit" name="agregar" value="Agregar">
    </form>
</body>
</html>