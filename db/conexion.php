<?php

$hostname = "localhost";
$username = "root";
$password = "123456";
$database = "Ejemplo";

$conex = mysqli_connect($hostname, $username, $password, $database);

// echo '<pre>';
// var_dump($conex);
// echo '</pre>';

// if ($conex) {
//      echo "Conexion Exitosa";
// }

// if (!$conex) {
//     echo "Hubo un error";
//     exit; 
// }