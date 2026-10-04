<?php
    require "../db/obtener_salidas.php";
    require "../includes/salidas/create.php";

    $addExit = create_exit();
    $exits = obtener_salidas();
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
        <h2>Registro de Salidas</h2>
        <label for="id_salida">Id_Salida:</label>
        <input type="number" name="id_salida" id="id_salida"><br>

        <label for="fecha">Fecha:</label>
        <input type="text" name="fecha" id="fecha"><br>

        <label for="hora">Hora:</label>
        <input type="text" name="hora" id="hora"><br>

        <label for="destino">Destino:</label>
        <input type="text" name="destino" id="destino"><br>

        <input type="submit" name="agregar" value="Agregar"><br>

        <a href="../pag/salidas.php">Cancelar</a>
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