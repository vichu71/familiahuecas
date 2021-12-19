<?php

// Incluimos el fichero de conexion a la base de datos
require_once 'configpro.php';
// Condicional para revisar el correo electronico
if (isset($_POST['email']) && !empty($_POST['email'])) {

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    // Consulta para verificar la existencia del correo
    $res = $link->query("SELECT * FROM usuario where email = '$email'");

    $row_cnt = mysqli_num_rows($res);

    if ($row_cnt == 1) {


        //Si el correo electrónico ya existe muestra false
        echo 'false';
    } else {
        echo 'true';
    }
}