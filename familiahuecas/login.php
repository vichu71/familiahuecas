
<?php

require_once 'configpro.php';
$email = $_POST["email"];
$pass = $_POST["pass"];
//$hashed_password = password_hash($pass, PASSWORD_DEFAULT);
$hashed_password = hash('sha256', $pass);

$link->set_charset("utf8");

$res = $link->query("SELECT * FROM usuario where email = '$email' and password='$hashed_password'");

$row_cnt = mysqli_num_rows($res);

if ($row_cnt == 1) {


    echo json_encode(array('success' => 1));
} else {
    echo json_encode(array('success' => 0));
}




