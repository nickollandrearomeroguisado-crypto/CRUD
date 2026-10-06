<?php
    require "../includes/salidas/update.php";
    require "../db/conexion.php";

    $idExit = $_GET['id'];
    $errores = [];

    $query = "SELECT * FROM Salidas WHERE id = ".$idExit.";";
    $salida = mysqli_query($conex, $query);

    $addExit = update_exit();
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
            foreach ($salida as $data) {
        ?>
        <h2>Actualización de Salidas</h2>
        <label for="id_salida">Id_Salida:</label>
        <input type="number" name="id_salida" id="id_salida" value="<?php echo $data['id_salida']; ?>"><br>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" value="<?php echo $data['fecha']; ?>"><br>

        <label for="hora">Hora:</label>
        <input type="time" name="hora" id="hora" value="<?php echo $data['hora']; ?>"><br>

        <label for="destino">Destino:</label>
        <input type="text" name="destino" id="destino" value="<?php echo $data['destino']; ?>"><br>

        <input type="submit" name="actualizar" value="Actualizar"><br>

        <a href="../pag/salidas.php">Cancelar</a>

        <?php
            }
        ?>

    </form>

    <?php
        if($addExit) {
            foreach ($addExit as $error) {
                echo "<p> .$error. </p>";
            }
        }
    ?>

</body>
</html>