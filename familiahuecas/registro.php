
<?php
   
   require_once 'configpro.php';
   $nombre= $_POST["nombre"];
   $apellidos= $_POST["apellidos"];
   $usuario= $_POST["usuario"];
   $email= $_POST["email"];
   $pass= $_POST["pass"];
        //$hashed_password = password_hash($pass, PASSWORD_DEFAULT);
   $hashed_password = hash('sha256', $pass);
    $hashed_email = hash('sha256', $email);
     
   $link->set_charset("utf8");
       
   $res= $link->query("INSERT INTO `usuario` (`nombre`, `apellido`, `email`, `fecha`, `password`, `emailtoken`,`rol`,`usuario`) "
           . "VALUES ( '$nombre', '$apellidos', '$email', current_timestamp(),'$hashed_password','$hashed_email',0,'$usuario');");
if ($res) {
   
    $to = $email;
$subject = "Alta en la web familia huecas";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$message = "Hola:<br> Tu alta en la web de famila huecas ha sido registrada correctamente";
mail($to, $subject, $message, $headers);
    echo json_encode(array('success' => 1));
} else {
    echo json_encode(array('success' => 0));
}

	/*	$res = $link->query("SELECT * FROM usuario");

while($f = $res->fetch_object()){
    echo $f->nombre.' <br/>';
     echo $f->email.' <br/>';
        $modal

} */  
        