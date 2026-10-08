<?php
// echo "Actualizando Usuario...";
// require "../db/obtener_usuario.php";
// require "../db/conexion.php";
// include "../includes/funciones.php";

// validarSession();
    // $idUser = $_GET['id'];
    // $errores = [];
    
    // $query = "SELECT * FROM Usuario WHERE id= ".$idUser.";";

    // $usuario = mysqli_query($conex, $query);
    // var_dump($usuario);
    // exit;
    

function update_user() {
    require '../db/conexion.php';

    $errores = [];
    $resultado = false;
    $Cedula = "";
    $Nombre = "";
    $Apellido = "";
    $Email = "";
    $new_password = "";
    $Password = "";
    $c_password = "";
    $Telefono = "";
    $id = $_GET['id'];

    if (isset($_POST['actualizar'])) {
        // $Cedula = $_POST['Cedula'];
        // $Nombre = $_POST['Nombre'];
        // $Apellido = $_POST['Apellido'];
        // $Email = $_POST['Email'];
        // $Password = $_POST['Password'];
        // $c_password = $_POST['c_password'];
        // $Telefono = $_POST['Telefono'];

        $Cedula = mysqli_real_escape_string($conex, $_POST['Cedula']);
        $Nombre = mysqli_real_escape_string($conex, $_POST['Nombre']);
        $Apellido = mysqli_real_escape_string($conex, $_POST['Apellido']);
        // $Email = mysqli_real_escape_string($conex, $_POST['Email']);
        $Email = mysqli_real_escape_string($conex, filter_var($_POST['Email']));
        $Password = mysqli_real_escape_string($conex, $_POST['password']);
        $new_password = mysqli_real_escape_string($conex, $_POST['n_password']);
        $c_password = mysqli_real_escape_string($conex, $_POST['c_password']);
        $Telefono = mysqli_real_escape_string($conex, $_POST['Telefono']);

        // var_dump($Password, "   " ,$new_password, "   " , $c_password);
        // exit;
        if (!$Cedula) {
            $errores[] = "Ingrese el número de cédula";
        }

        if (!$Nombre) {
            $errores[] = "Ingrese un nombre";
        }

        if (!$Apellido) {
            $errores[] = "Ingrese un apellido";
        }

        if (!$Email) {
            $errores[] = "Ingrese el correo";
        }

        if (!$Password) {
            $errores[] = "Debe ingresar la contraseña actual";
        }

        if (!$new_password) {
            $errores[] = "Debe ingresar la nueva contraseña";
        }

        if ($new_password != $c_password) {
            $errores[] = "Las contraseñas no coinciden";
        } else {
            $new_password = password_hash($new_password, PASSWORD_BCRYPT);
        }

        if (!$Telefono) {
            $errores[] = "Ingrese el telefono";
        }

        // if ($resultado -> num_rows) {
        //     $errores[] = "El usuario ya existe";
        // }

        if (!$errores) {
                // echo "Creando usuario....";
                // exit;
                $query = "UPDATE Usuario SET Nombre = '".$Nombre."', Apellido = '".$Apellido."', Cedula = '".$Cedula."', Email = '".$Email."', Telefono = '".$Telefono."', Password = '".$new_password."' WHERE ID = ".$id.";";
                // var_dump($query);
                // exit;
                $resultado = mysqli_query($conex, $query);
                $msg1= ($resultado) ? "Actualización agregada con éxito" : "Error al hacer la actualización";
                $message = ($resultado) ? 2 : 3;

                header("Location: ../pag/user.php?state=$message msg=$msg1");
                // if ($resultado) {
                //     header('Location: ../pag/user.php?state=2');
                //     echo "Actualización agregada con éxito";
                // } else {
                //     header('Location: ../pag/user.php?state=3');
                //     echo "Error al hacer la actualización";
                // }
                // // var_dump($query);

        } else {
                // return $errores;
        }
            return $errores;
            return $resultado;
    }
}