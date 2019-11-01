<?php

// include = para conectar a la base de datos
// ingresar el nombre del archivo en comillas simples 'conexion.php' 
include ("conexion.php");
 
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
        if($insert) {
          print "<script>alert(\"Registro exitoso.\");window.location='../../new_capacitacion.php';</script>";
        }
        else {
          print "<script>alert(\"No se pudo guardar el registro.\");window.location='../../new_capacitacion.php';</script>";
          }
    }
    else { 
    print "<script>alert(\"El titulo de capacitacion ya existe.\");window.location='../../new_capacitacion.php';</script>";
    } 

mysqli_close($enlace);
?>