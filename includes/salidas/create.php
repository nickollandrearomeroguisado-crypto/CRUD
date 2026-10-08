<?php

function create_exit() {
    require './../db/conexion.php';

    $errores = [];
    $id_salida = "";
    $fecha = "";
    $hora = "";
    $destino = "";

    if (isset($_POST['agregar'])) {
        $id_salida = mysqli_real_escape_string($conex, $_POST['id_salida'] ?? '');
        $fecha = mysqli_real_escape_string($conex, $_POST['fecha'] ?? '');
        $hora = mysqli_real_escape_string($conex, $_POST['hora'] ?? '');
        $destino = mysqli_real_escape_string($conex, $_POST['destino'] ?? '');

        if (!$id_salida) {
            $errores[] = "Ingrese el id de salidas";
        }
        
        if (!$fecha) {
            $errores[] = "Ingrese la fecha";
        }

        if (!$hora) {
            $errores[] = "Ingrese la hora";
        }

        if (!$destino) {
            $errores[] = "Ingrese su destino";
        }

        $query = "SELECT * FROM Salidas WHERE id_salida = '".$id_salida."';";
        // var_dump($query);
        // exit;
        $resultado = mysqli_query($conex, $query);

        if ($resultado -> num_rows) {
            $errores[] = "La salida ya existe";
        }

        if (!$errores) {
            $query = "INSERT INTO Salidas(id_salida, fecha, hora, destino) VALUES ('".$id_salida."', '".$fecha."', '".$hora."', '".$destino."');";
            $resultado = mysqli_query($conex, $query);

            $msg1 = ($resultado) ? "Salida agregada con éxito" : "Error al agregar salida";
            $message = ($resultado) ? 18 : 19;
            header("Location: ../pag/salidas.php?state=$message msg=$msg1");
        } else {

        }
        return $errores;
    }
}