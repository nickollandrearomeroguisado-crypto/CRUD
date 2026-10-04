<?php

function obtener_usuarios() {
    try {
        //1. Importar la conexion a la DB
        require 'conexion.php';

        //2. Consulta la Db
        $sql = "SELECT * FROM Usuario;";

        //3. Ejecutar la consulta con mysqli
        $query = mysqli_query($conex, $sql);

        //4. Acceder a los resultados
        // echo '<pre>';
        // var_dump(mysqli_fetch_assoc($query)); //trae los nombres de las columnas de usuario.
        // echo '</pre>';

        // echo '<pre>';
        // var_dump(mysqli_fetch_all($query)); //trae toda la informacion de usuario.
        // echo '</pre>';

        // echo '<pre>';
        // var_dump(mysqli_fetch_array($query)); //trae los identificadores y los nombrees de las columnas .
        // echo '</pre>';

        // echo '<pre>';
        // var_dump(mysqli_fetch_field($query)); //.
        // echo '</pre>';

        //5. Cierre de conexión
        // $cierre = mysqli_close($conex);
        // var_dump($cierre); 

        return $query;
    } catch (\Throwable $th) {
        var_dump($th);
    }
}

// function cerrarSesion() {
//     // session_destroy();
//     $_SESSION['Cedula'] = "";
// }