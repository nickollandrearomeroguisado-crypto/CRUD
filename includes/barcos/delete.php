<?php

require '../../db/conexion.php';

$errores = [];
$numero_matricula = "";
$nombre = "";
$numero_amarre = "";
$numero_cuota = "";
$id = $_GET['id'];

$query = "SELECT * FROM Barcos WHERE id = ".$id.";";
$resultado = mysqli_query($conex, $query);

$numero_matricula = mysqli_real_escape_string($conex, $_POST['numero_matricula']);
$nombre = mysqli_real_escape_string($conex, $_POST['nombre']);
$numero_amarre = mysqli_real_escape_string($conex, $_POST['numero_amarre']);
$numero_cuota = mysqli_real_escape_string($conex, $_POST['numero_cuota']);

if (!$errores) {
    $query = "DELETE FROM Barcos WHERE id = ".$id.";";
    $resultado = mysqli_query($conex, $query);

    $msg1 = ($resultado) ? "Eliminación con éxito" : "Error al hacer la elimiinación";
    $state = ($resultado) ? 16 : 17;
    header("Location: ../../pag/barcos.php?state=$state msg=$msg1");

} else {

}
return $errores;