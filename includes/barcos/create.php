<?php

function create_boat() {
    require './../db/conexion.php';

    $errores = [];
    $numero_matricula = "";
    $nombre = "";
    $numero_amarre = "";
    $numero_cuota = "";

    if (isset($_POST['agregar'])) {
        $numero_matricula = mysqli_real_escape_string($conex, $_POST['numero_matricula'] ?? '');
        $nombre = mysqli_real_escape_string($conex, $_POST['nombre'] ?? '');
        $numero_amarre = mysqli_real_escape_string($conex, $_POST['numero_amarre'] ?? '');
        $numero_cuota = mysqli_real_escape_string($conex, $_POST['numero_cuota'] ?? '');

        if (!$numero_matricula) {
            $errores[] = "Ingrese el número de matricula";
        }

        if (!$nombre) {
            $errores[] = "Ingrese un nombre";
        }

        if (!$numero_amarre) {
            $errores[] = "Ingrese el número de amarre";
        }

        if (!$numero_cuota) {
            $errores[] = "Ingrese el número del cuota";
        }

        $query = "SELECT * FROM Barcos WHERE numero_matricula = '".$numero_matricula."';";
        $resultado = mysqli_query($conex, $query);

        if ($resultado -> num_rows) {
            $errores[] = "El barco ya existe";
        }

        if (!$errores) {
            $query = "INSERT INTO Barcos(numero_matricula, nombre, numero_amarre, numero_cuota) VALUES ('".$numero_matricula."', '".$nombre."', '".$numero_amarre."', '".$numero_cuota."');";
            $resultado = mysqli_query($conex, $query);

            $msg1 = ($resultado) ? "Barco agregado con éxito" : "Error al agregar barco";
            $message = ($resultado) ? 12 : 13;

            header("Location: ../pag/barcos.php?state=$message msg=$msg1");

        } else {

        }
        return $errores;
    }
}