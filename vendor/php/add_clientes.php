<?php

// include = para conectar a la base de datos
// ingresar el nombre del archivo en comillas simples 'conexion.php' 
include ("conexion.php");

//if(isset($_POST['add'])){
    $cuit1= mysqli_real_escape_string($enlace,(strip_tags($_POST["cuit1"],ENT_QUOTES)));
    $cuit2= mysqli_real_escape_string($enlace,(strip_tags($_POST["cuit2"],ENT_QUOTES)));
    $cuit3= mysqli_real_escape_string($enlace,(strip_tags($_POST["cuit3"],ENT_QUOTES)));
    $cuit= $cuit1.$cuit2.$cuit3;
    $nombre= mysqli_real_escape_string($enlace,(strip_tags($_POST["nombre"],ENT_QUOTES)));
    $localidad= mysqli_real_escape_string($enlace,(strip_tags($_POST["localidad"],ENT_QUOTES)));
    $rubro= mysqli_real_escape_string($enlace,(strip_tags($_POST["rubro"],ENT_QUOTES)));
    $descripcion= mysqli_real_escape_string($enlace,(strip_tags($_POST["descripcion"],ENT_QUOTES)));
    $visible  = 1;  
    $consultaIgual = mysqli_query($enlace, "SELECT * FROM clientes WHERE cuit='$cuit'");
    if(mysqli_num_rows($consultaIgual) == 0){
            $insert = mysqli_query($enlace, "INSERT INTO clientes(nombre,cuit,rubro,id_localidad,actividad_principal,visible)
                                                VALUES('$nombre', '$cuit','$rubro','$localidad','$descripcion', '$visible')") 
                                                or die(mysqli_error($enlace));
            if($insert){
              print "<script>alert(\"Registro exitoso.\");window.location='../../new_capacitacion.php';</script>";
            }
         else{
          print "<script>alert(\"No se pudo guardar el registro.\");window.location='../../new_capacitacion.php';</script>";
         }
        }
        else{ 
        print "<script>alert(\"El titulo de capacitacion ya existe.\");window.location='../../new_capacitacion.php';</script>";
        }
//}

mysqli_close($enlace);

?>