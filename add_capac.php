<?php

// include = para conectar a la base de datos
// ingresar el nombre del archivo en comillas simples 'conexion.php' 
include ("conexion.php");

//if(isset($_POST['add'])){
//(isset(($_POST['titulo'], $_POST['tipo'],$_POST['proyecto'],$_POST['fecha'],$_POST['observaciones'])  
  //       and ($_POST['titulo']!='',$_POST['tipo']!='',$_POST['proyecto']!='',$_POST['fecha']!='',$_POST['observaciones']!=''))){  
    // valida que se hayan enviado y que no esten vacios
    $titulo= mysqli_real_escape_string($enlace,(strip_tags($_POST["titulo"],ENT_QUOTES)));
    $tipo= mysqli_real_escape_string($enlace,(strip_tags($_POST["tipo"],ENT_QUOTES)));
    $proyecto  = mysqli_real_escape_string($enlace,(strip_tags($_POST["proyecto"],ENT_QUOTES)));
    $fecha= substr($_POST["fecha"],6,4).substr($_POST["fecha"],3,2).substr($_POST["fecha"],0,2).substr($_POST["fecha"],11,2).substr($_POST["fecha"],14,2).'00';
    $observaciones= mysqli_real_escape_string($enlace,(strip_tags($_POST["observaciones"],ENT_QUOTES)));
    $visible  = 1;  
    
    $consultaIgual = mysqli_query($enlace, "SELECT * FROM capacitaciones WHERE titulo_capacitacion='$titulo'");
    if(mysqli_num_rows($consultaIgual) == 0){
            $insert = mysqli_query($enlace, "INSERT INTO capacitaciones(titulo_capacitacion,id_tipo_capacitacion,id_proyecto, fecha_inicio,observaciones,visible)
                                                VALUES('$titulo', '$tipo','$proyecto','$fecha','$observaciones', '$visible')") 
                                                or die(mysqli_error($enlace));
           /* if($insert){
                echo "<script>
              alert('Datos enviados correctamente');
              window.location= 'new_capacitacion.php'
          </script>";   
            }else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
            }*/
         
    }else{
        echo '<div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Error. La Asistencia ya existe!</div>
        <script> windows class="history go(-1)</script>';
    } 
//}

mysqli_close($enlace);
header("Location: ../../new_capacitacion.php");
?>