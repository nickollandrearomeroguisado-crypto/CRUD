<?php

// echo "Eliminado Usuario...";
require '../../db/conexion.php';

    $errores = [];
    $resultado = false;
    $Cedula = "";
    $Nombre = "";
    $Apellido = "";
    $Email = "";
    $Password = "";
    // $new_password = "";
    // $c_password = "";
    $Telefono = "";
    $id = $_GET['id'];
    $query = "SELECT * FROM Usuario WHERE ID = ".$id.";";
    $resultado = mysqli_query($conex, $query);

    $Cedula = mysqli_real_escape_string($conex, $_POST['Cedula']);
    $Nombre = mysqli_real_escape_string($conex, $_POST['Nombre']);
    $Apellido = mysqli_real_escape_string($conex, $_POST['Apellido']);
    $Email = mysqli_real_escape_string($conex, filter_var($_POST['Email']));
    $Password = mysqli_real_escape_string($conex, $_POST['password']);
    $Telefono = mysqli_real_escape_string($conex, $_POST['Telefono']);
    
    if (!$errores) {
        
        $query = "DELETE FROM Usuario WHERE ID = ".$id.";";
        $resultado = mysqli_query($conex, $query);
        
        $msg1= ($resultado) ? "Eliminación con éxito" : "Error al hacer la eliminación";
        $state = ($resultado) ? 4 : 5;
        header("Location: ../../pag/users.php?state=$state, msg=" .$msg1);

        // if ($resultado) {
            //     // header('Location: ../pag/user.php?state=4');
        //     echo "Eliminación con éxito";
        // } else {
        //     // header('Location: ../pag/user.php?state=5');
        //     echo "Error al hacer la eliminación";
        // }
    } else {
        // return $errores;
    }
    return $errores;
    return $resultado;
// }

    
