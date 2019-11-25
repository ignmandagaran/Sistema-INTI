<?php

// include = para conectar a la base de datos
// ingresar el nombre del archivo en comillas simples 'conexion.php' 
include ("conexion.php");

    $fecha =  mysqli_real_escape_string($enlace,(strip_tags($_POST["fecha"],ENT_QUOTES)));
    $dedicacion= mysqli_real_escape_string($enlace,(strip_tags($_POST["dedicacion"],ENT_QUOTES)));
    $usuario= mysqli_real_escape_string($enlace,(strip_tags($_POST["usuario"],ENT_QUOTES)));
    $visible  = 1;

    $queryDedicaciones = "SELECT u.usuariominusculas, d.dedicacion, d.fecha FROM usuarios u INNER JOIN dedicaciones d ON d.usuario=u.usuariominusculas WHERE u.usuariominusculas='gustavo'";
    $resultado2 = mysqli_query($enlace,$queryDedicaciones);
    $datos2 = mysqli_fetch_array($resultado2);

    foreach ($resultado2 as $row){
        $fechaQuery = date("m/Y", strtotime($row["fecha"]));
        $fechaUpdate = date("Y-m", strtotime($row["fecha"]));
        $parsefecha = date("m/Y", strtotime($fecha));
        
        if($fechaQuery == $parsefecha){
          $queryUpDedicacion = "UPDATE dedicaciones SET dedicacion=$dedicacion WHERE `dedicaciones`.`fecha` LIKE '$fechaUpdate%' AND usuario='$usuario'";
          $update = mysqli_query($enlace,$queryUpDedicacion) or die(mysqli_error($enlace));
          if($update){
            print "<script>alert(\"Registro exitoso.\");window.location='../../matriz_privilegios.php';</script>";
            }
            else{
            print "<script>alert(\"No se pudo guardar el registro.\");window.location='../../matriz_privilegios.php';</script>";
        }
        }else{
            $date = DateTime::createFromFormat('m/Y',$fecha);
            $fechaUpdate = $date->format("Y-m-00");
            $query = "INSERT INTO `dedicaciones` (`fecha`, `dedicacion`, `usuario`, `visible`)
              VALUES('$fechaUpdate', '$dedicacion','$usuario','$visible')";
            $insert = mysqli_query($enlace,$query) or die(mysqli_error($enlace));

            if($insert){
                print "<script>alert(\"Registro exitoso.\");window.location='../../matriz_privilegios.php';</script>";
                }
                else{
                print "<script>alert(\"No se pudo guardar el registro.\");window.location='../../matriz_privilegios.php';</script>";
            }
        }
    }

mysqli_close($enlace);

?>