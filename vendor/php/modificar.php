<?php

// include = para conectar a la base de datos
// ingresar el nombre del archivo en comillas simples 'conexion.php' 
include ("conexion.php");

 $id_usuario= mysqli_real_escape_string($enlace,(strip_tags($_POST["id_usuario"],ENT_QUOTES)));
 $nombre= mysqli_real_escape_string($enlace,(strip_tags($_POST["nombre"],ENT_QUOTES)));
 $apellido= mysqli_real_escape_string($enlace,(strip_tags($_POST["apellido"],ENT_QUOTES)));
 $nombreCompleto= $nombre." ".$apellido;
 $rolUsuario= mysqli_real_escape_string($enlace,(strip_tags($_POST["rol"],ENT_QUOTES)));
 $password= mysqli_real_escape_string($enlace,(strip_tags($_POST["password"],ENT_QUOTES)));
 $confirmPassword= mysqli_real_escape_string($enlace,(strip_tags($_POST["confirmPassword"],ENT_QUOTES)));
 $fecha_dedicacion = substr($_POST["fecha_dedicacion"],6,4).substr($_POST["fecha_dedicacion"],3,2).substr($_POST["fecha_dedicacion"],0,2).substr($_POST["fecha_dedicacion"],11,2).substr($_POST["fecha_dedicacion"],14,2).'00';
 $dedicacion= mysqli_real_escape_string($enlace,(strip_tags($_POST["dedicacion"],ENT_QUOTES)));
 $md5Password = md5($password);
  
 $update= mysqli_query($enlace, "UPDATE usuarios SET nombre='$nombreCompleto', id_rol=$rolUsuario, clave='$md5Password' WHERE usuariominusculas=$usuario") or die($enlace-->error);
 $update2= mysqli_query($enlace,"INSERT INTO `dedicaciones` (`fecha`, `dedicacion`, `usuario`, `visible`)
                                VALUES('$fecha_dedicacion', '$dedicacion','$usuario','$visible')")
                                or die($enlace-->error);

if($update&&$update2){
    print "<script>alert(\"Los cambios se han guardado correctamente.\");window.location='../../matriz_privilegios.php';</script>";                                                                
      }else
        print "<script>alert(\"No se pudo hacer la modificacion.\");window.location='../../matriz_privilegios.php';</script>";


?>