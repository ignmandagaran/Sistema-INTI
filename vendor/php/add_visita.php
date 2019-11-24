<?php

// include = para conectar a la base de datos
// ingresar el nombre del archivo en comillas simples 'conexion.php' 
include ("conexion.php");

//if(isset($_POST['add'])){
    $cuit= mysqli_real_escape_string($enlace,(strip_tags($_POST["cuit"],ENT_QUOTES)));
    $fecha= substr($_POST["fecha"],6,4).substr($_POST["fecha"],3,2).substr($_POST["fecha"],0,2).substr($_POST["fecha"],11,2).substr($_POST["fecha"],14,2).'00';
    $tipo= mysqli_real_escape_string($enlace,(strip_tags($_POST["tipo"],ENT_QUOTES)));
    $tipo2= mysqli_real_escape_string($enlace,(strip_tags($_POST["tipo2"],ENT_QUOTES)));
    $proyecto= mysqli_real_escape_string($enlace,(strip_tags($_POST["proyecto"],ENT_QUOTES)));
    $inicio= ($_POST ["inicio"]);//hora inicio
    $fin= ($_POST ["fin"]);//hora fin
    $asesor  = ($_POST["asesor"]);    $observaciones= mysqli_real_escape_string($enlace,(strip_tags($_POST["observaciones"],ENT_QUOTES)));
    $visible  = 1;  

    for($i=0; $i<COUNT($asesor); $i++){
      $asesor[$i];
    }
    $usuarios= implode($asesor , ',  ');

        if($tipo==1){//si no es una asistencia, se inserta tambien la fecha fin (la misma $fecha que fecha_inicio)
            $insert = mysqli_query($enlace, "INSERT INTO visitas(id_cliente, fecha, fecha_fin, id_tipo_visita, id_tipo_asistencia, id_proyecto, hora_inicio, hora_fin, usuarios, observaciones, visible)
                                                VALUES('$cuit', '$fecha', '$fecha', '$tipo', '$tipo2','$proyecto', '$inicio', '$fin', '$usuarios', '$observaciones', '$visible')") 
                                                or die(mysqli_error($enlace));                           
        }
        else{//sino la fecha_fin queda null hasta finalizar
          $insert = mysqli_query($enlace, "INSERT INTO visitas(id_cliente, fecha, id_tipo_visita, id_tipo_asistencia, id_proyecto, hora_inicio, hora_fin, usuarios, observaciones, visible)
                                                VALUES('$cuit', '$fecha', '$tipo', '$tipo2','$proyecto', '$inicio', '$fin', '$usuarios', '$observaciones', '$visible')") 
                                                or die(mysqli_error($enlace));
        }
          if($insert){
                  print "<script>alert(\"Registro exitoso.\");window.location='../../new_visita.php';</script>";                                                                
                 }
          
          else
              print "<script>alert(\"No se pudo guardar el registro.\");window.location='../../new_visita.php';</script>";
          
mysqli_close($enlace);

?>