<?php

require '../../db/conexion.php';

$errores = [];
$identificador = "";
$nombre = "";
$apellido = "";
$telefono = "";
$email = "";
$direccion = "";
$id = $_GET['id'];

$query = "SELECT * FROM Cliente WHERE id = ".$id.";";
$resultado = mysqli_query($conex, $query);

$identificador = mysqli_real_escape_string($conex, $_POST['identificador']);
$nombre = mysqli_real_escape_string($conex, $_POST['nombre']);
$apellido = mysqli_real_escape_string($conex, $_POST['apellido']);
$telefono = mysqli_real_escape_string($conex, $_POST['telefono']);
$email = mysqli_real_escape_string($conex, $_POST['email']);
$direccion = mysqli_real_escape_string($conex, $_POST['direccion']);

if (!$errores) {

    $query = "DELETE FROM Cliente WHERE id = ".$id.";";
    $resultado = mysqli_query($conex, $query);
    
    $msg1 = ($resultado) ? "Eliminación con éxito" : "Error al hacer la eliminación";
    $state = ($resultado) ? 10 : 11;
    header("Location: ../../pad/cliente.php?state=$state, msg=" .$msg1);

} else {

}
return $errores;