<?php

// include = para conectar a la base de datos
// ingresar el nombre del archivo en comillas simples 'conexion.php' 
include ("conexion.php");

//if(isset($_POST['add'])){
//(isset(($_POST['titulo'], $_POST['tipo'],$_POST['proyecto'],$_POST['fecha'],$_POST['observaciones'])  
  //       and ($_POST['titulo']!='',$_POST['tipo']!='',$_POST['proyecto']!='',$_POST['fecha']!='',$_POST['observaciones']!=''))){  
    // valida que se hayan enviado y que no esten vacios
    $titulo= mysqli_real_escape_string($enlace,(strip_tags($_POST["titulo"],ENT_QUOTES)));
    $capacitacion= mysqli_real_escape_string($enlace,(strip_tags($_POST["capacitacion"],ENT_QUOTES)));
    $tema= mysqli_real_escape_string($enlace,(strip_tags($_POST["tema"],ENT_QUOTES)));
    $localidad= mysqli_real_escape_string($enlace,(strip_tags($_POST["localidad"],ENT_QUOTES)));
    $fecha= substr($_POST["fecha"],6,4).substr($_POST["fecha"],3,2).substr($_POST["fecha"],0,2).substr($_POST["fecha"],11,2).substr($_POST["fecha"],14,2).'00';
    $hora1= ($_POST ["hora1"]);
    $hora2= ($_POST ["hora2"]);
    $asistentes= ($_POST ["asistentes"]);
    $empresas= ($_POST ["empresas"]);
    $observaciones= mysqli_real_escape_string($enlace,(strip_tags($_POST["observaciones"],ENT_QUOTES)));
    $visible  = 1;  
    
    $consultaIgual = mysqli_query($enlace, "SELECT * FROM modulos WHERE titulo_modulo='$titulo'");
    if(mysqli_num_rows($consultaIgual) == 0){
            $insert = mysqli_query($enlace, "INSERT INTO modulos(titulo_modulo, id_capacitacion, tema, id_localidad, fecha, hora_inicio, hora_fin, cantidad_asistentes, cantidad_empresas, observaciones, visible)
                                                VALUES('$titulo', '$capacitacion', '$tema', '$localidad','$fecha', '$hora1', '$hora2', '$observaciones', '$visible')") 
                                                or die(mysqli_error($enlace));
            if($insert){
                echo '<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Los datos han sido guardados con éxito.</div>';
            }else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
            }
         
    }else{
        echo '<div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Error. La Asistencia ya existe!</div>
        <script> windows class="history go(-1)</script>';
    } 
//}

mysqli_close($enlace);

?>