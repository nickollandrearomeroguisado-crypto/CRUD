<?php
    require "../includes/barcos/update.php";
    require "../db/conexion.php";

    $idBoat = $_GET['id'];
    $errores = [];

    $query = "SELECT * FROM Barcos WHERE id= ".$idBoat.";";
    $barco = mysqli_query($conex, $query);

    $addBoat = update_boat();
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
            foreach ($barco as $data) {
        ?>
        <h2>Actualización de Barcos</h2>
        <label for="numero_matricula">Número de Matricula:</label>
        <input type="text" name="numero_matricula" id="numero_matricula" value="<?php echo $data['numero_matricula']; ?>"><br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $data['nombre']; ?>"><br>

        <label for="numero_amarre">Número de Amarre:</label>
        <input type="number" name="numero_amarre" id="numero_amarre" value="<?php echo $data['numero_amarre']; ?>"><br>

        <label for="numero_cuota">Número de Cuota:</label>
        <input type="number" name="numero_cuota" id="numero_cuota" value="<?php echo $data['numero_cuota']; ?>"><br>

        <input type="submit" name="actualizar" value="Actualizar"><br>

        <a href="../pag/barcos.php">Cancelar</a>

        <?php
            }
        ?>

    </form>

    <?php
        if($addBoat) {
            foreach ($addBoat as $error) {
                echo "<p> .$error. </p>";
            }
        }
    ?>

</body>
</html>