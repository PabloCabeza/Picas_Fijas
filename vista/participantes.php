<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Participantes</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="description" content="."/>
        <meta name="keywords" content=""/>
        <meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="expires" content="23 de enero de 2020"><!--Inicio de construcción de la página-->
		<meta name="MobileOptimized" content="width">
		<meta name="HandheldFriendly" content="true">

	    <link rel="stylesheet" type="text/css" href="../css/EstilosPicas_Fijas.css"/> 
	    <link rel="stylesheet" type="text/css" href="css/MediaQuery_EstilosPicas_Fijas.css"/>
        <link rel="stylesheet" type="text/css" href="../iconos/icono_tilde_exis/style_tilde_exis.css"/><!--galeria icomoon.io  -->
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>    

        <script type="text/javascript" src="../javascript/Funciones_varias.js"></script>
    </head>

    <body>
        <div class="contendor_10">
            <a class="a_1" href="../index.php">Home</a>
        </div>
        <div>  
            <div onclick= "ocultarMenu()">
                <h2>Participantes</h2>      
                <div class="contenedor_2"> 
                    <table class="table_2">
                        <thead>
                            <tr>
                                <th>Nº</th>
                                <th class="th_1" colspan="2">PARTICIPANTE</th>
                                <th>RETO LOGRADO</th>
                                <th>FECHA</th>
                                <th>HORA</th>
                            </tr>
                        </thead>
                            <?php
                                $i = 1;

                                //Se accede al servidor de base de datos
                                include("../conexion/Conexion_BD.php");

                                //se consulta el puntaje de los participantes y se muestra en una tabla
                                $Consulta_2 = $conexion->query("SELECT usuario.nombre, usuario.Fotografia, pruebas_usuario.reto_logrado, pruebas_usuario.fecha_reto FROM usuario INNER JOIN pruebas_usuario ON usuario.ID_Usuario=pruebas_usuario.ID_Usuario") or die($conexion->error); 
                                while($registros= mysqli_fetch_array($Consulta_2)){
                                    //Se cambia el formato a la fecha
                                    $Fecha = $registros["fecha_reto"];
                                    $Fecha = date_create($Fecha);
                                    $Fecha = date_format($Fecha, 'd-m-y');

                                    //Se cambia el formato a la hoa
                                    $Hora = $registros["fecha_reto"];
                                    $Hora = date_create($Hora);
                                    $Hora = date_format($Hora, 'h:i a');	
                            ?>
                        <tbody>
                            <tr>
                                <td class="tabla_3"><?php echo $i;?></td>
                                <td class="tabla_5"><img class="img_1" src="../images/<?php echo $registros['Fotografia'];?>"></td>
                                <td class=""><?php echo $registros["nombre"];?></td>
                                <td class="tabla_3">
                                    <?php
                                        if($registros["reto_logrado"]){ ?>
                                            <span class='icon icon-checkmark'></span> <?php 
                                        }
                                        else{  ?>
                                            <span class='icon icon-cross'></span>
                                            <?php
                                        }   ?>
                                </td> 
                                <td class=""><?php echo $Fecha;?></td>  
                                <td class=""><?php echo $Hora;?></td>          
                            </tr>
                            <?php $i++; }   ?>  
                        </tbody>
                    </table>  
                    <a href="../index.php" class="label_1 label_3">Tomar el reto</a>  
                </div>
            </div>  
        </div>
    </body>
</html>