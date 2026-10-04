<?php
    // require "./../includes/funciones.php";
    include "db/conexion.php";
    
    // $addUser = create_user();

    // var_dump(mysqli_fetch_assoc($usuarios));
    if (isset($_POST['validar-usuario'])) {
        // require '../db/conexion.php';
        
        $userForm = $_POST['dni-form'];
        $pwForm = $_POST['pw-form'];
        $userDB = "";
        $pwDB = "";

        $query = "SELECT * FROM Usuario WHERE cedula = '{$userForm}';";
        // var_dump($query);
        $usuarios = mysqli_query($conex, $query);
        // var_dump($usuarios);

        // foreach ($usuarios as $data) {
        //     var_dump($data); 
        // }

        // exit;
        if ($usuarios-> num_rows > 0) {
            foreach ($usuarios as $usuario) {
                $userDB = $usuario['Cedula'];
                $pwDB = $usuario['Password'];
            }
            $autenticado = password_verify($pwForm, $pwDB); //identifica si la contraseña esta en la bases de datos
            if ($userForm === $userDB && $autenticado) {
                // session_start();
                $_SESSION['Cedula'] = $userDB; 
                header("Location: pag/dashboard.php");
                exit;
            } else {
                echo "Usuario o contraseña incorrectos";
            }
            // echo "validamos usuario";
        } else {
            echo "Usuario o contraseña incorrectos";
        }
    }

// $_SESSION //Guardar un estado 
?>