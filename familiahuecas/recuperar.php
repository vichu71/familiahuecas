<!DOCTYPE html>
<html lang="en" class="htmllogin">
    <head>
        <meta charset="UTF-8">
        <title>Familia Huecas Recuperar</title>
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Hind:300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <link rel="stylesheet" href="./css/style.css">

    </head>
    <body>
        <?php
        $emailToken = $_GET["v"];
        require_once 'configpro.php';

        $res = $link->query("SELECT * FROM usuario where emailtoken = '$emailToken'");

        $row_cnt = mysqli_num_rows($res);
        while ($f = $res->fetch_object()) {

            $emailbbdd = $f->emailtoken;
            $email = $f->email;
        }
        if ($emailbbdd == $emailToken) {
            ?>

            <!-- Forgotten Password Container -->

            <div id="forgotten-container">
                <h1>Recuperar contraseña</h1>
                <h3> <?=$email?></h3>
                <span class="close-btn-recuperar">
                    <img src="img/icono_cerrar_oliva.png" width="30px"></img>
                </span>

                <form id="recuperarformresponse" name="recuperarformresponse" method="POST">
                    <input type="hidden" name="email" id="email" value="<?=$email?>">
                    
                    <input type="password" name="pass" id="pass" placeholder="Nueva contraseña">
                    <input type="password" name="pass2" id="pass2" placeholder="Repite contraseña">
                    <input class="submit" type="submit" value="Cambiar contraseña"/>
                    <table> 
                        <tr class="trtexttagErrorRecupera"><td colspan="2"aling="left" width="450px"> 

                                <a class="red-btn" href="#" >La contraseña no se ha podido modificar</a>

                            </td>

                        </tr>
                        <tr class = "trOkRecupera"><td colspan = "2"aling = "left" width = "450px">

                                <a class = "orange-btn" href = "#" >La contraseña se ha modificado correctamente</a>

                            </td>

                        </tr>
                    </table>
                    <!--<a href = "#" >Recuperar contraseña</a>-->
                </form>
            </div>
           <?php } else{?>
             <div id="forgotten-container">
                <h1>Recuperar contraseña</h1>
                <table> 
                        <tr class="trErrorRecuperando"><td colspan="2"aling="left" width="450px"> 

                                <a class="red-btn" href="#" >Error en el proceso de recuperar contraseña</a>

                            </td>

                        </tr>
                     
                    </table>
             </div>
               
               <?php
               
            }
            ?>

        <!-- partial -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>

        <script  src="./js/script.js"></script>
        <script  src="./js/funciones.js"></script> 
        <script src="./js/ValidarRegistro.js"></script>
        <script type="text/javascript">
             $("tr.trtexttagErrorRecupera").hide();
              $("tr.trOkRecupera").hide();
             
             // $( "#email" ).prop( "disabled", true );
            $('document').ready(function ()
            {
                $("#forgotten-container").fadeIn();

            });
        </script>

    </body>
</html>