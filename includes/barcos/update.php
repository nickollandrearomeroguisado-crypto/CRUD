<?php

function update_boat() {
    require '../db/conexion.php';

    $errores = [];
    $numero_matricula = "";
    $nombre = "";
    $numero_amarre = "";
    $numero_cuota = "";
    $id = $_GET['id'];

    if (isset($_POST['actualizar'])) {
        $numero_matricula = mysqli_real_escape_string($conex, $_POST['numero_matricula']);
        $nombre = mysqli_real_escape_string($conex, $_POST['nombre']);
        $numero_amarre = mysqli_real_escape_string($conex, $_POST['numero_amarre']);
        $numero_cuota = mysqli_real_escape_string($conex, $_POST['numero_cuota']);

        if (!$numero_matricula) {
            $errores[] = "Ingrese el número de matricula";
        }

        if (!$nombre) {
            $errores[] = "Ingrese el nombre";
        }

        if (!$numero_amarre) {
            $errores[] = "Ingrese el número de amarre";
        }

        if (!$numero_cuota) {
            $errores[] = "Ingrese el número de la cuota";
        }

        if (!$errores) {
            $query = "UPDATE Barcos SET numero_matricula = '".$numero_matricula."', nombre= '".$nombre."', numero_amarre= '".$numero_amarre."', numero_cuota= '".$numero_cuota."' WHERE id = ".$id.";";
            $resultado = mysqli_query($conex, $query);

            $msg1 = ($resultado) ? "Actualización agregada con éxito" : "Error al hacer la actualización";
            $message = ($resultado) ? 14 : 15;

            header("Location: ../pag/barcos.php?state=$message, msg=" .$msg1);

        } else {

        }
        return $errores;
    }
}