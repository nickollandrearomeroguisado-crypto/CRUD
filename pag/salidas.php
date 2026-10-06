<?php
    require "../db/obtener_salidas.php";
    require "../includes/salidas/create.php";
    require "../crear/crearSalidas.php";

    $salidas = obtener_salidas();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salidas</title>
</head>
<body>
    <form action="" method="GET">
        <table>
            <thead>
                <tr>
                    <th>Id_Salida</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Destino</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($exit = mysqli_fetch_assoc($salidas)) {
                ?>

                <tr>
                    <td><?php echo $exit['id_salida'] ?></td>
                    <td><?php echo $exit['fecha'] ?></td>
                    <td><?php echo $exit['hora'] ?></td>
                    <td><?php echo $exit['destino'] ?></td>
                    <td>
                        <a href="../formSalida/formUpdate.php?id=<?php echo $exit['id'] ?>">Actualizar</a>
                        <a href="../includes/salidas/delete.php?id=<?php echo $exit['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este registro');">Eliminar</a>
                    </td>
                </tr>

                <?php
                    }
                ?>

            </tbody>
        </table>

        <?php
            echo '<a href="dashboard.php">Vover al panel principal</a>';
        ?>

    </form>
</body>
</html>