<?php

function create_client() {
    require './../db/conexion.php';

    $errores = [];
    $identificador = "";
    $nombre = "";
    $apellido = "";
    $telefono = "";
    $email = "";
    $direccion = "";

    if (isset($_POST['agregar'])) {

        $identificador = mysqli_real_escape_string($conex, $_POST['identificador'] ?? '');
        $nombre = mysqli_real_escape_string($conex, $_POST['nombre'] ?? '');
        $apellido = mysqli_real_escape_string($conex, $_POST['apellido'] ?? '');
        $telefono = mysqli_real_escape_string($conex, $_POST['telefono'] ?? '');
        $email = mysqli_real_escape_string($conex, filter_var($_POST['email'] ?? ''));
        $direccion = mysqli_real_escape_string($conex, $_POST['direccion'] ?? '');

        if (!ctype_digit($identificador)) {
            $errores[] = "Ingrese el número de identificador";
        }

        if (!$nombre) {
            $errores[] = "Ingrese un nombre";
        }

        if (!$apellido) {
            $errores[] = "Ingrese un apellido";
        }

        if (!$telefono) {
            $errores[] = "Ingrese un telefono";
        }

        if (!$email) {
            $errores[] = "Ingrese un correo";
        }

        if (!$direccion) {
            $errores[] = "Ingrese la dirección";
        }

        $query = "SELECT * FROM Cliente WHERE identificador = '".$identificador."';";
        $resultado = mysqli_query($conex, $query);

        if ($resultado -> num_rows) {
            $errores[] = "El cliente ya existe";
        }

        if (!$errores) {
            $query = "INSERT INTO Cliente(identificador, nombre, apellido, telefono, email, direccion) VALUES ('".$identificador."', '".$nombre."', '".$apellido."', '".$telefono."', '".$email."', '".$direccion."');";
            $resultado = mysqli_query($conex, $query);
            $msg1 = ($resultado) ? "Cliente agregado con éxito" : "Error al agregar cliente";
            $message = ($resultado) ? 6 : 7;

            header("Location: ../pag/cliente.php?state=$message, msg=" . $msg1);
        } else {

        }

        return $errores;
    }
}