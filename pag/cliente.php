<?php
    require "../db/obtener_cliente.php";
    require "../includes/clientes/create.php";
    require "../crear/crearCliente.php";

    $clientes = obtener_clientes();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>
    <form action="" method="GET">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefóno</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($client = mysqli_fetch_assoc($clientes)) {
                ?>

                <tr>
                    <td><?php echo $client['identificador'] ?>></td>
                    <td><?php echo $client['nombre'] ?>></td>
                    <td><?php echo $client['apellido'] ?></td>
                    <td><?php echo $client['telefono'] ?></td>
                    <td><?php echo $client['email'] ?></td>
                    <td><?php echo $client['direccion'] ?></td>
                    <td>
                        <a href="../formCliente/formUpdate.php?id=<?php echo $client['id']; ?>">Actualizar</a>
                        <a href="../includes/clientes/delete.php?id=<?php echo $client['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este registro?');">Eliminar</a>
                    </td>
                </tr>

                <?php
                    }
                ?>
            </tbody>
        </table>
        <?php
            echo '<a href="dashboard.php">Volver al panel principal</a>'
        ?>
    </form>
</body>
</html>