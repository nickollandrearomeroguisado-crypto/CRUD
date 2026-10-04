<?php
    require "../db/obtener_barcos.php";
    require "../includes/barcos/create.php";
    require "../crear/crearBarcos.php";

    $barcos = obtener_barcos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcos</title>
</head>
<body>
    <form action="" method="GET">
        <table>
            <thead>
                <tr>
                    <th>Número de Matricula</th>
                    <th>Nombre</th>
                    <th>Número de Amarre</th>
                    <th>Número de Cuota</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($boat = mysqli_fetch_assoc($barcos)) {
                ?>

                <tr>
                    <td><?php echo $boat['numero_matricula'] ?></td>
                    <td><?php echo $boat['nombre'] ?></td>
                    <td><?php echo $boat['numero_amarre'] ?></td>
                    <td><?php echo $boat['numero_cuota'] ?></td>
                    <td>
                        <a href="../formBarco/formUpdate.php?id=<?php echo $boat['id']; ?>">Actualizar</a>
                        <a href="../includes/barcos/delete.php?id=<?php echo $boat['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este registro?');">Eliminar</a>
                    </td>
                </tr>

                <?php
                    }
                ?>

            </tbody>
        </table>

        <?php
            echo '<a href="dashboard.php">Volver al panel principal</a>';
        ?>

    </form>
</body>
</html>