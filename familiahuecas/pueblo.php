<!DOCTYPE html>
<html lang="es" class="htmlportal">
    <head>
        <meta charset="UTF-8">
        <title>Familia Huecas portal</title>
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Hind:300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/style_tabla.css">

    </head>
    <body>
        <nav class="nav">
            <ul>
                <li><a href="#">Start</a>
                <li><a href="#">O nas</a>
                <li class="drop"><a href="#">Oferta</a>
                    <ul class="dropdown">
                        <li><a href="#">Oferta 01</a></li>
                        <li><a href="#">Oferta 02</a></li>
                        <li><a href="#">Oferta 03</a></li>
                    </ul>
                </li>
                <li><a href="#">Aktualności</a>
                <li><a href="#">Kontakt</a>
            </ul>
        </nav>
        <div id="buscar">
            <form id="loginform" name="loginform" method="POST">
                <input type="text" name="buscar">
                <input class="submit" type="submit" value="Cambiar contraseña"/>
            </form>

        </div>
        <div id="container-pueblo">


            <?php
            require_once 'configpro.php';

            /* $result  = $link->query("SELECT * FROM terrenos");
              $row = $result->fetch_assoc();
              $num_total_rows = mysqli_num_rows($result); */
            $CantidadMostrar = 10;
            $compag = (int) (!isset($_GET['pag'])) ? 1 : $_GET['pag'];
            $TotalReg = $link->query("SELECT * FROM terrenos");
            //Se divide la cantidad de registro de la BD con la cantidad a mostrar 
            $TotalRegistro = ceil($TotalReg->num_rows / $CantidadMostrar);

            //Consulta SQL
            $consultavistas = "SELECT * FROM terrenos
						ORDER BY
						terrenos.id ASC
						LIMIT " . (($compag - 1) * $CantidadMostrar) . " , " . $CantidadMostrar;
            $consulta = $link->query($consultavistas);
            ?>

            <table class="bordered">
                <thead> <t><th>ID</th><th>POLIGONO</th><th>PARCELA</th><th>ESTADO</th><th>ANIO_CAMBIO_ESTADO</th><th>H_SOL</th><th>PARAJE</th><th>EXTENSION</th><th>LABOR</th>
                    <th>AUX1</th><th>ITP</th><th>REF_CATASTRAL</th><th>REG_PROPIEDAD</th><th>NUM_REGISTRO</th><th>ANTERIOR_PROPIETARIO</th><th>ESCR_GANANCIALES</th><th>PROPIETARIO</th><th>OBSERVACIONES</th></tr>
                    </thead>
                    <?php
                    while ($f = $consulta->fetch_object()) {

                        $id = $f->ID;
                        $poligono = $f->POLIGONO;
                        $parcela = $f->PARCELA;
                        $estado = $f->ESTADO;
                        $aniocambioestado = $f->ANIO_CAMBIO_ESTADO;
                        $h_sol = $f->H_SOL;
                        $paraje = $f->PARAJE;
                        $extension = $f->EXTENSION;
                        $labor = $f->LABOR;
                        $aux1 = $f->AUX1;
                        $itp = $f->ITP;
                        $ref_catastral = $f->REF_CATASTRAL;
                        $reg_propiedad = $f->REG_PROPIEDAD;
                        $num_registro = $f->NUM_REGISTRO;
                        $anterior_propietario = $f->ANTERIOR_PROPIETARIO;
                        $escr_gananciales = $f->ESCR_GANANCIALES;
                        $propietario = $f->PROPIETARIO;
                        $observaciones = $f->OBSERVACIONES;
                        ?>
                        <tr><td><?= $id ?></td><td><DIV><?= $poligono ?></div></td><td><?= $parcela ?></td><td><?= $estado ?></td><td><?= $aniocambioestado ?></td><td><?= $h_sol ?></td><td><?= $paraje ?></td><td><?= $extension ?>v<td><?= $labor ?></td><td><?= $aux1 ?></td><td><?= $itp ?></td><td><?= $ref_catastral ?></td><td><?= $reg_propiedad ?></td><td><?= $num_registro ?></td><td><?= $anterior_propietario ?></td><td><?= $escr_gananciales ?></td><td><?= $propietario ?></td><td><?= $observaciones ?></td></tr>
                        <?php
                    }
                    ?>
            </table>
            <?php
            //Operacion matematica para botón siguiente y atrás 
            $IncrimentNum = (($compag + 1) <= $TotalRegistro) ? ($compag + 1) : 1;
            $DecrementNum = (($compag - 1)) < 1 ? 1 : ($compag - 1);

            echo "<div ><table border=0><tr><td><a href=\"?pag=" . $DecrementNum . "\">◀</a></td>";
            //Se resta y suma con el numero de pag actual con el cantidad de 
            //números  a mostrar
            $Desde = $compag - (ceil($CantidadMostrar / 2) - 1);
            $Hasta = $compag + (ceil($CantidadMostrar / 2) - 1);

            //Se valida
            $Desde = ($Desde < 1) ? 1 : $Desde;
            $Hasta = ($Hasta < $CantidadMostrar) ? $CantidadMostrar : $Hasta;
            //Se muestra los números de paginas
            for ($i = $Desde; $i <= $Hasta; $i++) {
                //Se valida la paginacion total
                //de registros
                if ($i <= $TotalRegistro) {
                    //Validamos la pag activo
                    if ($i == $compag) {
                        echo "<td><a href=\"?pag=" . $i . "\">" . $i . "</a></td>";
                    } else {
                        echo "<td><a href=\"?pag=" . $i . "\">" . $i . "</a></td>";
                    }
                }
            }
            echo "<td class=\"btn\"><a href=\"?pag=" . $IncrimentNum . "\">▶</a></td></tr></table></div>";
            ?>
        </div>



        <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
        <script  src="./js/script_portal.js"></script>
    </body>
</html>