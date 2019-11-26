<?php

// include = para conectar a la base de datos
// ingresar el nombre del archivo en comillas simples 'conexion.php' 
include ("conexion.php");

    $fecha =  mysqli_real_escape_string($enlace,(strip_tags($_POST["fecha"],ENT_QUOTES)));
    $dedicacion= mysqli_real_escape_string($enlace,(strip_tags($_POST["dedicacion"],ENT_QUOTES)));
    $usuario= mysqli_real_escape_string($enlace,(strip_tags($_POST["usuario"],ENT_QUOTES)));
    $visible  = 1;

    $queryToIf = "SELECT u.usuariominusculas, d.dedicacion, DATE_FORMAT(d.fecha,'%m/%Y') as fecha FROM usuarios u INNER JOIN dedicaciones d ON d.usuario=u.usuariominusculas WHERE u.usuariominusculas='$usuario'";
    $resultado = mysqli_query($enlace,$queryToIf);
    $date = DateTime::createFromFormat('m/Y',$fecha);
    $fechaQuery = $date->format("Y-m-00");

    foreach ($resultado as $row){

        if($row["fecha"] == $fecha){
            $updateOrInsert = true;
            break;
        }else{
            $updateOrInsert = false;
        }
    }
        
        if($updateOrInsert){
          $queryUpDedicacion = "UPDATE dedicaciones SET dedicacion=$dedicacion WHERE `dedicaciones`.`fecha` LIKE '$fechaQuery%' AND usuario='$usuario'";
          $update = mysqli_query($enlace,$queryUpDedicacion) or die(mysqli_error($enlace));
          if($update){
            print "<script>alert(\"Registro exitoso.\");window.location='../../matriz_privilegios.php';</script>";
            }
            else{
            print "<script>alert(\"No se pudo guardar el registro.\");window.location='../../matriz_privilegios.php';</script>";
            }
        
        }else{
            $query = "INSERT INTO `dedicaciones` (`fecha`, `dedicacion`, `usuario`, `visible`)
              VALUES('$fechaQuery', '$dedicacion','$usuario','$visible')";
            $insert = mysqli_query($enlace,$query) or die(mysqli_error($enlace));

            if($insert){
                print "<script>alert(\"Registro exitoso.\");window.location='../../matriz_privilegios.php';</script>";
                }
                else{
                print "<script>alert(\"No se pudo guardar el registro.\");window.location='../../matriz_privilegios.php';</script>";
            }
        }

mysqli_close($enlace);

?>