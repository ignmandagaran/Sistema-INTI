<?php

// include = para conectar a la base de datos
// ingresar el nombre del archivo en comillas simples 'conexion.php' 
include ("conexion.php");

$usuario= mysqli_real_escape_string($enlace,(strip_tags($_POST["idusuario"],ENT_QUOTES)));
$nombre= mysqli_real_escape_string($enlace,(strip_tags($_POST["nombre"],ENT_QUOTES)));
$apellido= mysqli_real_escape_string($enlace,(strip_tags($_POST["apellido"],ENT_QUOTES)));
$nombreCompleto= $nombre." ".$apellido;
$password= mysqli_real_escape_string($enlace,(strip_tags($_POST["password"],ENT_QUOTES)));
$confirmPassword= mysqli_real_escape_string($enlace,(strip_tags($_POST["confirmPassword"],ENT_QUOTES)));
$md5Password = md5($password);

$update= mysqli_query($enlace, "UPDATE usuarios SET nombre='$nombreCompleto', clave='$md5Password' WHERE id_usuario=$usuario");

if($update){
   print "<script>alert(\"Los cambios se han guardado correctamente.\");window.location='../../matriz_privilegios.php';</script>";                                                                
      }else
   print "<script>alert(\"No se pudo hacer la modificacion.\");window.location='../../matriz_privilegios.php';</script>";


?>