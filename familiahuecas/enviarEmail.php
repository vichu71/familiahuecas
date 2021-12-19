
<?php
 //$servidor = "https://www.familiahuecas.es";
  $servidor = "localhost/hollowfamily";
   $email= $_POST["email"];
  
        //$hashed_password = password_hash($pass, PASSWORD_DEFAULT);
   $hashed_password = hash('sha256', $email);
     
  
    $to = $email;
$subject = "Recuperación de contraseña";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$message = "Hola:<br>Pincha el siguiente enlace para crear otra contraseña: <a href='$servidor/recuperar.php?v=$hashed_password'> CrearContraseña</a>";
mail($to, $subject, $message, $headers);
   echo $hashed_password;
echo $message;
	/*	$res = $link->query("SELECT * FROM usuario");

while($f = $res->fetch_object()){
    echo $f->nombre.' <br/>';
     echo $f->email.' <br/>';
        $modal

} */  
        