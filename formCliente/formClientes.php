<?php
    require "../db/obtener_cliente.php";
    require "../includes/clientes/create.php";

    $addUser = create_client();
    $clientes = obtener_clientes();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <form action="" method="POST">
        <h2>Registro de Clientes</h2>
        <label for="identificador">Identificador:</label>
        <input type="text" name="identificador" id="identificador"><br>

        <label for="name">Nombre:</label>
        <input type="text" name="nombre" id="nombre"><br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido"><br>

        <label for="telefono">Telefono:</label>
        <input type="number" name="telefono" id="telefono"><br>

        <label for="email">Correo:</label>
        <input type="email" name="email" id="email"><br>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion"><br>

        <input type="submit" name="agregar" value="Agregar"><br>

        <a href="../pag/cliente.php">Cancelar</a>
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