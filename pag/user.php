<?php
    require "../db/obtener_usuario.php";
    require "../includes/users/create.php";
    require "../crear/crearUsuario.php";
    require "../includes/funciones.php";
    // require_once '../db/conexion.php';
    // validarSession();

    $usuarios = obtener_usuarios();
    // $id = 1
    // session_start();
    // if(!isset($_SESSION['Cedula'])){
    //     header('Location: ../index.php');
    // }
    // exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
    <form action="" method= "GET">
   <table>
    <thead>
        <tr>
            <th>Cédula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
                while($user = mysqli_fetch_assoc($usuarios)) {
            ?>

            <tr>
                <td><?php echo $user['Cedula'] ?></td>
                <td><?php echo $user['Nombre'] ?></td>
                <td><?php echo $user['Apellido'] ?></td>
                <td><?php echo $user['Email'] ?></td>
                <td><?php echo $user['Telefono'] ?></td>
                <td>
                    <a href="../form/formUpdate.php?id=<?php echo $user['ID'];?>">Actualizar</a>
                    <a href="../includes/users/delete.php?id=<?php echo $user['ID'];?>" onclick="return confirm('¿Estás seguro de eliminar este registro?');">Eliminar</a>
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
</body>
</html>



