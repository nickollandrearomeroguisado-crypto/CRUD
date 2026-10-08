<?php

function create_user() {
    require './../db/conexion.php';

    $errores = [];
    // $resultado = false;
    $Cedula = "";
    $Nombre = "";
    $Apellido = "";
    $Email = "";
    $Password = "";
    $c_password = "";
    $Telefono = "";

    if (isset($_POST['agregar'])) {
        // $Cedula = $_POST['Cedula'];
        // $Nombre = $_POST['Nombre'];
        // $Apellido = $_POST['Apellido'];
        // $Email = $_POST['Email'];
        // $Password = $_POST['Password'];
        // $c_password = $_POST['c_password'];
        // $Telefono = $_POST['Telefono'];

        $Cedula = mysqli_real_escape_string($conex, $_POST['Cedula'] ?? '');    //eliminar caracteres especiales
        $Nombre = mysqli_real_escape_string($conex, $_POST['Nombre'] ?? '');
        $Apellido = mysqli_real_escape_string($conex, $_POST['Apellido'] ?? '');
        // $Email = mysqli_real_escape_string($conex, $_POST['Email']);
        $Email = mysqli_real_escape_string($conex, filter_var($_POST['Email'] ?? ''));
        $Password = mysqli_real_escape_string($conex, $_POST['Password'] ?? '');
        $c_password = mysqli_real_escape_string($conex, $_POST['c_password'] ?? '');
        $Telefono = mysqli_real_escape_string($conex, $_POST['Telefono'] ?? '');

        //ctype_digit solamente valida números naturales positivos
        if (!ctype_digit($Cedula)) {
            $errores[] = "Ingrese el número de cédula";
        }

        if (!$Nombre) {
            $errores[] = "Ingrese un nombre"; //nos muestra el mensaje de error si el campo esta vacio
        }

        if (!$Apellido) {
            $errores[] = "Ingrese un apellido";
        }

        if (!$Email) {
            $errores[] = "Ingrese el correo";
        }

        if (!$Password) {
            $errores[] = "Ingrese la contraseña";
        }

        if ($Password != $c_password) {
            $errores[] = "Las contraseñas no coinciden";
        } else {
            $Password = password_hash($Password, PASSWORD_BCRYPT); //sirve para que no muestre la contraseña ingresada
        }

        if (!$Telefono) {
            $errores[] = "Ingrese el telefono";
        }

        $query = "SELECT * FROM Usuario WHERE cedula = '".$Cedula."';";
        $resultado = mysqli_query($conex, $query);

        // echo '<pre>';
        // var_dump($resultado);
        // echo '</pre>';
        // exit;

        if ($resultado -> num_rows) {
            $errores[] = "El usuario ya existe";
        }

        if (!$errores) {
            // echo "Creando usuario....";
            // exit;
            $query = "INSERT INTO Usuario(Cedula, Nombre, Apellido, Email, Password, Telefono) VALUES ('".$Cedula."', '".$Nombre."', '".$Apellido."', '".$Email."', '".$Password."','".$Telefono."');";
            $resultado = mysqli_query($conex, $query);
            $msg1= ($resultado) ? "Usuario agregado con éxito" : "Error al agregar usuario";
            $message = ($resultado) ? 0 : 1;

            header("Location: ../pag/user.php?state=$message msg=$msg1");
            // if ($resultado) {
            //     // header('Location: ../pag/user.php?state=0');
            //     echo "Usuario agregado con éxito";
            // } else {
            //     // header('Location: ../pag/user.php?state=1');
            //     echo "Error al agregar usuario";
            // }
            // // var_dump($query);

        } else {
            // return $errores;
        }
        
        return $errores;
        return $resultado;
    }

    // if (isset($_POST['agregar'])) {
    //     $Id_Usuario = mysqli_escape_string($conex, $_POST['ID']);
    //     $Nombre = mysqli_escape_string($conex, $_POST['Nombre']);
    //     $Apellido = mysqli_escape_string($conex, $_POST ['Apellido']);

    //     if(!$Nombre) {
    //         $errores[] = "Ingrese un numero";
    //     } elseif (!$Apellido) {
    //         $errores[] = "Ingrese un apellido";
    //     } 

    //     $query = "SELECT * FROM Usuario WHERE Nombre = '".$Nombre."';";
    //     $res = mysqli_query($conex, $query);
    //     if ($res -> num_rows) {
    //         $errores[] = "Usuario existente";
    //     }
    //     // var_dump($numeracion);
    //     // exit;

    //     $numeracion = obtener_usuarios();
         
    //     if (!$errores) {
    //         $query = "INSERT INTO Usuario(Id_Usuario, Nombre, Apellido) VALUES ('$Id_Usuario', '$Nombre', '$Apellido');";
    //         $resultado = mysqli_query($conex, $query);
    //     }
    // }
    // return $resultado;
}

// function cerrarSesion() {
//     // session_destroy();
//     $_SESSION['Cedula'] = "";
// }