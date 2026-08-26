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

// insertar_usuarios();

function create_user(string $Id_Usuario, string $Nombre, string $Apellido) : mysqli_result| bool {
    require 'conexion.php';

    $errores = [];
    $resultado = false;

    $Id_Usuario = "";
    $Nombre = "";
    $Apellido = "";

    if (isset($_POST['agregar'])) {
        $Id_Usuario = mysqli_escape_string($conex, $_POST['ID']);
        $Nombre = mysqli_escape_string($conex, $_POST['Nombre']);
        $Apellido = mysqli_escape_string($conex, $_POST ['Apellido']);

        if(!$Nombre) {
            $errores[] = "Ingrese un numero";
        } elseif (!$Apellido) {
            $errores[] = "Ingrese un apellido";
        } 

        $query = "SELECT * FROM Usuario WHERE Nombre = '".$Nombre."';";
        $res = mysqli_query($conex, $query);
        if ($res -> num_rows) {
            $errores[] = "Usuario existente";
        }
        // var_dump($numeracion);
        // exit;

        $numeracion = obtener_usuarios();
         
        if (!$errores) {
            $query = "INSERT INTO Usuario(Id_Usuario, Nombre, Apellido) VALUES ('$Id_Usuario', '$Nombre', '$Apellido');";
            $resultado = mysqli_query($conex, $query);
        }
    }
    return $resultado;
}

// create_user("3", "Daniel", "Ruiz");