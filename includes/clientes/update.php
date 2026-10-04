<?php

function update_client() {
    require '../db/conexion.php';

    $errores = [];
    $identificador = "";
    $nombre = "";
    $apellido = "";
    $telefono = "";
    $email = "";
    $direccion = "";
    $id = $_GET['id'];

    if (isset($_POST['actualizar'])) {
        $identificador = mysqli_real_escape_string($conex, $_POST['identificador']);
        $nombre = mysqli_real_escape_string($conex, $_POST['nombre']);
        $apellido = mysqli_real_escape_string($conex, $_POST['apellido']);
        $telefono = mysqli_real_escape_string($conex, $_POST['telefono']);
        $email = mysqli_real_escape_string($conex, filter_var($_POST['email']));
        $direccion = mysqli_real_escape_string($conex, $_POST['direccion']);

        if (!$identificador) {
            $errores[] = "Ingrese el número de identificador";
        }

        if (!$nombre) {
            $errores[] = "Ingrese un nombre";
        }

        if (!$apellido) {
            $errores[] = "Ingrese un apellido";
        }

        if (!$telefono) {
            $errores[] = "Ingrese el telefono";
        }

        if (!$email) {
            $errore[] = "Ingrese el correo";
        }

        if (!$direccion) {
            $errores[] = "Ingrese la dirección";
        }

        if (!$errores) {
            $query = "UPDATE Cliente SET identificador = '".$identificador."', nombre = '".$nombre."', apellido = '".$apellido."', telefono = '".$telefono."', email = '".$email."', direccion = '".$direccion."' WHERE id = ".$id.";";
            $resultado = mysqli_query($conex, $query);

            $msg1 = ($resultado) ? "Actualización agregada con éxito" : "Error al hacer la actualización";
            $message = ($resultado) ? 8 : 9;

            header("Location: ../pag/cliente.php?state=$message, msg=" .$msg1);

        } else {

        }
        return $errores;
    }
}