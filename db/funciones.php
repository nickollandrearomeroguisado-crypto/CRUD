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

function create_user() {
    require 'conexion.php';

    $errores = [];
    $resultado = false;
    $Cedula = "";
    $Nombre = "";
    $Apellido = "";
    $Email = "";
    $Password = "";
    $c_password = "";
    $Telefono = "";

    if (isset($_POST['agregar'])) {
        $Cedula = $_POST['Cedula'];
        $Nombre = $_POST['Nombre'];
        $Apellido = $_POST['Apellido'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $c_password = $_POST['c_password'];
        $Telefono = $_POST['Telefono'];

        // $Cedula = mysqli_escape_string($conex, $_POST['Cedula']);
        // $Nombre = mysqli_escape_string($conex, $_POST['Nombre']);
        // $Apellido = mysqli_escape_string($conex, $_POST['Apellido']);
        // $Email = mysqli_escape_string($conex, $_POST['Email']);
        // $Password = $_POST['Password'];
        // $c_password = $_POST['c_password'];
        // $Telefono = mysqli_escape_string($conex, $_POST['Telefono']);

        if (!$Cedula) {
            $errores[] = "Ingrese el número de cédula";
        }

        if (!$Nombre) {
            $errores[] = "Ingrese un nombre";
        }

        if (!$Apellido) {
            $errores[] = "Ingrese un apellido";
        }

        if (!$Email) {
            $errores[] = "Ingrese el correo";
        }

        if (!$Password) {
            $errores[] = "Ingrese la contraseña";
        }

        if ($Password != $c_password) {
            $errores[] = "Las contraseñas no coinciden";
        } else {
            $Password = password_hash($Password, PASSWORD_BCRYPT);
        }

        if (!$Telefono) {
            $errores[] = "Ingrese el telefono";
        }

        $query = "SELECT * FROM Usuario WHERE cedula = '".$Cedula."';";
        $resultado = mysqli_query($conex, $query);

        // echo '<pre>';
        // var_dump($resultado);
        // echo '</pre>';
        // exit;

        if ($resultado -> num_rows) {
            $errores[] = "El usuario ya existe";
        }

        if (!$errores) {
            // echo "Creando usuario....";
            // exit;
            $query = "INSERT INTO Usuario(Cedula, Nombre, Apellido, Email, Password, Telefono) VALUES ('".$Cedula."', '".$Nombre."', '".$Apellido."', '".$Email."', '".$Password."','".$Telefono."');";
            
            $resultado = mysqli_query($conex, $query);

            if ($resultado) {
                echo "Usuario agregado con éxito";
            } else {
                echo "Error al agregar usuario";
            }
            // var_dump($query);

        } else {
            // return $errores;
        }
        
        return $errores;
        return $resultado;
    }

    // if (isset($_POST['agregar'])) {
    //     $Id_Usuario = mysqli_escape_string($conex, $_POST['ID']);
    //     $Nombre = mysqli_escape_string($conex, $_POST['Nombre']);
    //     $Apellido = mysqli_escape_string($conex, $_POST ['Apellido']);

    //     if(!$Nombre) {
    //         $errores[] = "Ingrese un numero";
    //     } elseif (!$Apellido) {
    //         $errores[] = "Ingrese un apellido";
    //     } 

    //     $query = "SELECT * FROM Usuario WHERE Nombre = '".$Nombre."';";
    //     $res = mysqli_query($conex, $query);
    //     if ($res -> num_rows) {
    //         $errores[] = "Usuario existente";
    //     }
    //     // var_dump($numeracion);
    //     // exit;

    //     $numeracion = obtener_usuarios();
         
    //     if (!$errores) {
    //         $query = "INSERT INTO Usuario(Id_Usuario, Nombre, Apellido) VALUES ('$Id_Usuario', '$Nombre', '$Apellido');";
    //         $resultado = mysqli_query($conex, $query);
    //     }
    // }
    // return $resultado;
}

// create_user();