<!DOCTYPE html>
<html lang="en" class="htmllogin">
    <head>
        <meta charset="UTF-8">
        <title>Familia Huecas LogIn</title>
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Hind:300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <link rel="stylesheet" href="./css/style.css">

    </head>
    <body>
        <!-- partial:index.partial.html -->
        <div id="login-button">
            <img src="img/olivoFHsinfondo.png" height="10">
            </img>
            <h2>&nbsp;&nbsp;&nbsp;Bienvenido</h2>
        </div>

        <div id="container">
            <h1>Log In</h1>
            <span class="close-btn">
                <img src="img/icono_cerrar_oliva.png" width="30px"></img>
            </span>

             <form id="loginform" name="loginform" method="POST">
                <input type="email" name="email" placeholder="Correo Electrónico" required>
                <input type="password" name="pass" placeholder="Contraseña" required>
                <!--<a href="#">Entrar</a>-->
                <input class="submit" type="submit" value="Entrar"/>
                <table> 
                    <tr class="trtexttagErrorLogin"><td colspan="2"aling="left" width="350px"> 

                            <a class="red-btn" href="#" >Usuario no reconocido</a>

                        </td>

                    </tr></table>
                <div id="remember-container">
                    
                    <span id="forgotten">Recuperar contraseña</span>
                    <span id="registro">Registrarse</span>

                </div>

            </form>
        </div>

        <!-- Forgotten Password Container -->
        <div id="forgotten-container">
            <h1>Recuperar contraseña</h1>
            <span class="close-btn">
                <img src="img/icono_cerrar_oliva.png" width="30px"></img>
            </span>

            <form id="recuperarform" name="recuperarform" method="POST">
                <input type="email" name="email" placeholder="Correo">
                <input class="submit" type="submit" value="Recuperar contraseña"/>
                 <table> 
                    <tr class="trtexttagErrorRecupera"><td colspan="2"aling="left" width="450px"> 

                            <a class="red-btn" href="#" >Este correo no pertenece a ningun usuario</a>

                        </td>

                    </tr>
                 <tr class="trOkRecupera"><td colspan="2"aling="left" width="450px"> 

                            <a class="orange-btn" href="#" >Se envio un correo a la dirección indicada</a>

                        </td>

                    </tr>
                 </table>
               <!-- <a href="#" >Recuperar contraseña</a>-->
            </form>
        </div>
        <div id="registro-container">
            <!--<form action="registro.php" method="POST">-->
            <form id="registroform" name="registroform" method="POST">
                <h1>Registro</h1>
                <span class="close-btn">
                    <img src="img/icono_cerrar_oliva.png" width="30px"></img>
                </span>
                <div>
                    <table>
                        <div id="registro-correcto">

                        </div>
                        <tr><td aling="left" width="350px"> <input type="text" name="nombre" placeholder="Nombre" required> </td>
                            <td aling="right"  width="350px"> <input type="text" name="apellidos" placeholder="Apellidos" required> </td>
                        </tr>
                        <tr><td aling="left" width="350px"> <input type="text" name="usuario" placeholder="Usuario" required> </td>
                            <td aling="right"  width="350px"> <input type="email" id="email" name="email" placeholder="Correo electrónico" required> </td>
                        </tr>
                        <tr><td aling="left" width="350px"> <input type="password" id="pass" name="pass" placeholder="Contraseña" required> </td>
                            <td aling="right"  width="350px"> <input type="password" id = "pass2" name="pass2" placeholder="Repite contraseña" required> </td>
                        </tr>
                        <tr><td colspan="2"aling="left" width="350px"> 

                                <input class="submit" type="submit" value="Registrar"/>
                                <!--<a href="javascript:registrar()" >Registrar</a>-->

                            </td>

                        </tr>
                        <tr class="trtexttag"><td colspan="2"aling="left" width="350px"> 


                                <a class="orange-btn" href="#" >Usuario registrado correctamente</a>

                            </td>

                        </tr>
                        <tr class="trtexttagError"><td colspan="2"aling="left" width="350px"> 


                                <a class="red-btn" href="#" >Error en el alta de usuario</a>

                            </td>

                        </tr>

                    </table>

                </div>   
            </form>
            <div>
                <!-- partial -->
                <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>

                <script  src="./js/script.js"></script>
                <script  src="./js/funciones.js"></script> 
                <script src="./js/ValidarRegistro.js"></script>
                <script type="text/javascript">
                </script>

                </body>
                </html>