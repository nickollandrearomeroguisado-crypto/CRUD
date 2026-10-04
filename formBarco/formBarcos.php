<?php
    require "../db/obtener_barcos.php";
    require "../includes/barcos/create.php";

    $addBoat = create_boat();
    $barcos = obtener_barcos();
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
        <h2>Registro de Barcos</h2>
        <label for="numero_matricula">Número de Matricula:</label>
        <input type="text" name="numero_matricula" id="numero_matricula"><br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre"><br>

        <label for="numero_amarre">Número de Amarre:</label>
        <input type="number" name="numero_amarre" id="numero_amarre"><br>

        <label for="numero_cuota">Número de Cuota:</label>
        <input type="number" name="numero_cuota" id="numero_cuota"><br>

        <input type="submit" name="agregar" value="Agregar"><br>

        <a href="../pag/barcos.php">Cancelar</a>
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