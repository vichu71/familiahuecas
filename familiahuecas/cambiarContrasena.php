
<?php
  
   require_once 'configpro.php';
 
   $email= $_POST["email"];
   $pass= $_POST["pass"];
        //$hashed_password = password_hash($pass, PASSWORD_DEFAULT);
   $hashed_password = hash('sha256', $pass);
     
   $link->set_charset("utf8");
     $SQL =  "UPDATE `usuario` SET `password`= '$hashed_password' where email= '$email';" ;
   
   $res= $link->query($SQL);
  
if ($res) {
   
 /*   $to = $email;
$subject = "Alta en la web familia huecas";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$message = "Hola:<br> Tu alta en la web de famila huecas ha sido registrada correctamente";
mail($to, $subject, $message, $headers);*/
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
        