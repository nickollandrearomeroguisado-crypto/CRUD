<?php

function update_exit() {
    require '../db/conexion.php';

    $errores = [];
    $id_salida = "";
    $fecha = "";
    $hora = "";
    $destino = "";
    $id = $_GET['id'];

    if (isset($_POST['actualizar'])) {
        $id_salida = mysqli_real_escape_string($conex, $_POST['id_salida']);
        $fecha = mysqli_real_escape_string($conex, $_POST['fecha']);
        $hora = mysqli_real_escape_string($conex, $_POST['hora']);
        $destino = mysqli_real_escape_string($conex, $_POST['destino']);

        if (!$id_salida) {
            $errores[] = "Ingrese el id de la salida";
        }

        if (!$fecha) {
            $errores[] = "Ingrese la fecha";
        }

        if (!$hora) {
            $errores[] = "Ingrese la hora";
        }

        if (!$destino) {
            $errores[] = "Ingrese el destino";
        }

        if (!$errores) {
            $query = "UPDATE Salidas SET id_salida = '".$id_salida."', fecha = '".$fecha."', hora = '".$hora."', destino = '".$destino."' WHERE id = ".$id.";";
            $resultado = mysqli_query($conex, $query);

            $msg1 = ($resultado) ? "Actualización agregada con éxito" : "Error al hacer la actualización";
            $message = ($resultado) ? 20 : 21;
            header("Location: ../pag/salidas.php?state=$message, msg=" .$msg1);
        } else {

        }
        return $errores;
    }
}