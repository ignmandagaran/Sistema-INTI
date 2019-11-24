<?php

// include = para conectar a la base de datos
// ingresar el nombre del archivo en comillas simples 'conexion.php' 
include ("conexion.php");

    $fecha = substr($_POST["fecha"],6,4).substr($_POST["fecha"],3,2).substr($_POST["fecha"],0,2).substr($_POST["fecha"],11,2).substr($_POST["fecha"],14,2).'00';
    $dedicacion= mysqli_real_escape_string($enlace,(strip_tags($_POST["dedicacion"],ENT_QUOTES)));
    $usuario= mysqli_real_escape_string($enlace,(strip_tags($_POST["usuario"],ENT_QUOTES)));
    $visible  = 1;

    if($dedicacion<0){
        print "<script>alert(\"No se pudo guardar el registro. La dedicacíon no puede ser menor a 0.\");window.location='../../perfil.php';</script>"
    }

    $query = "INSERT INTO `dedicaciones` (`fecha`, `dedicacion`, `usuario`, `visible`)
              VALUES('$fecha', '$dedicacion','$usuario','$visible')";

        $insert = mysqli_query($enlace,$query) or die(mysqli_error($enlace));
        if($insert){
            print "<script>alert(\"Registro exitoso.\");window.location='../../perfil.php';</script>";
        }
         else{
          print "<script>alert(\"No se pudo guardar el registro.\");window.location='../../perfil.php';</script>";
         }

mysqli_close($enlace);

?>