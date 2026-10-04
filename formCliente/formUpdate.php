<?php
    require "../includes/clientes/update.php";
    require "../db/conexion.php";

    $idClient = $_GET['id'];
    $errores = [];

    $query = "SELECT * FROM Cliente WHERE id= ".$idClient.";";
    $cliente = mysqli_query($conex, $query);

    $addClient = update_client();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización</title>
</head>
<body>
    <form action="" method="POST">
        <?php
            foreach ($cliente as $data) {
        ?>
        <h2>Actualización de Clientes</h2>
        <label for="identificador">Identificador:</label>
        <input type="text" name="identificador" id="identificador" value="<?php echo $data['identificador']; ?>"><br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $data['nombre']; ?>"><br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" value="<?php echo $data['apellido']; ?>"><br>

        <label for="telefono">Telefono:</label>
        <input type="number" name="telefono" id="telefono" value="<?php echo $data['telefono']; ?>"><br>

        <label for="email">Correo:</label>
        <input type="email" name="email" id="email" value="<?php echo $data['email']; ?>"><br>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion" value="<?php echo $data['direccion']; ?>"><br>

        <input type="submit" name="actualizar" value="Actualizar"><br>

        <a href="../pag/cliente.php">Cancelar</a>

        <?php
            }
        ?>

    </form>

    <?php
        if($addClient) {
            foreach ($addClient as $error) {
                echo "<p> .$error. </p>";
            }
        }
    ?>

</body>
</html>