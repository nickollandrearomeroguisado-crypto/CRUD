<?php

require '../../db/conexion.php';

$errores = [];
$id_salida = "";
$fecha = "";
$hora = "";
$destino = "";
$id = $_GET['id'];

$query = "SELECT * FROM Salidas WHERE id = ".$id.";";
$resultado = mysqli_query($conex, $query);

$id_salida = mysqli_real_escape_string($conex, $_POST['id_cedula']);
$fecha = mysqli_real_escape_string($conex, $_POST['fecha']);
$hora = mysqli_real_escape_string($conex, $_POST['hora']);
$destino = mysqli_real_escape_string($conex, $_POST['destino']);

if (!$errores) {
    $query = "DELETE FROM Salidas WHERE id = ".$id.";";
    $resultado = mysqli_query($conex, $query);

    $msg1 = ($resultado) ? "Eliminación con éxito" : "Error al hacer la eliminación";
    $state = ($resultado) ? 22 : 23;
    header("Location: ../../pag/salidas.php?state=$state msg=$msg1");
} else {

}
return $errores;