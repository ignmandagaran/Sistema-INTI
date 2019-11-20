<?php
session_start();
// include = para conectar a la base de datos
// ingresar el nombre del archivo en comillas simples 'conexion.php' 
include ("conexion.php");
  $usuarioRegistro = $_SESSION['usuario'];
  $usuario= mysqli_real_escape_string($enlace,(strip_tags($_POST["usuario"],ENT_QUOTES)));
  $nombre= mysqli_real_escape_string($enlace,(strip_tags($_POST["nombre"],ENT_QUOTES)));
  $apellido= mysqli_real_escape_string($enlace,(strip_tags($_POST["apellido"],ENT_QUOTES)));
  $nombreCompleto= $nombre." ".$apellido;
  $nombre= mysqli_real_escape_string($enlace,(strip_tags($_POST["nombre"],ENT_QUOTES)));
  $rolUsuario= mysqli_real_escape_string($enlace,(strip_tags($_POST["rol"],ENT_QUOTES)));
  $password= mysqli_real_escape_string($enlace,(strip_tags($_POST["password"],ENT_QUOTES)));
  $confirmPassword= mysqli_real_escape_string($enlace,(strip_tags($_POST["confirmPassword"],ENT_QUOTES)));
  $fecha_dedicacion = substr($_POST["fecha_dedicacion"],6,4).substr($_POST["fecha_dedicacion"],3,2).substr($_POST["fecha_dedicacion"],0,2).substr($_POST["fecha_dedicacion"],11,2).substr($_POST["fecha_dedicacion"],14,2).'00';
  $dedicacion= mysqli_real_escape_string($enlace,(strip_tags($_POST["dedicacion"],ENT_QUOTES)));
  $visible  = 1;
  $usuarioMinusculas = strtolower($usuario);
  $fecha_alta  = date ("YmdHis");
  $md5Password = md5($password);

  $consultaIgual = mysqli_query($enlace, "SELECT * FROM usuarios WHERE usuariominusculas='$usuarioMinusculas'");

  $query = "INSERT INTO `usuarios` (`usuario`, `usuariominusculas`, `clave`, `nombre`, `id_nodo`, `id_region`, `id_rol`, `fecha_alta`, `usuario_registro`,`visible`)
            VALUES('$usuario', '$usuarioMinusculas','$md5Password','$nombreCompleto', NULL, NULL, '$rolUsuario', '$fecha_alta', '$usuarioRegistro', '$visible')";
 
 $query2= "INSERT INTO `dedicaciones` (`id_dedicacion`, `fecha`, `dedicacion`, `usuario`, `visible`)
                        VALUES(NULL, '$fecha_dedicacion', '$dedicacion','$usuarioMinusculas','$visible')";

  if(mysqli_num_rows($consultaIgual) == 0){
    if($password==$confirmPassword){
      $insert = mysqli_query($enlace,$query) or die(mysqli_error($enlace));
      $insert2 = mysqli_query($enlace,$query2) or die(mysqli_error($enlace));
      if($insert&&$insert2){
        print "<script>alert(\"Registro exitoso.\");window.location='../../matriz_privilegios.php';</script>";
      }
      else{
        print "<script>alert(\"No se pudo guardar el registro.\");window.location='../../matriz_privilegios.php';</script>";
      }
    }
    else{
      print "<script>alert(\"Las contraseñas no coinciden.\");window.location='../../matriz_privilegios.phpp';</script>";
    }
  }
  else{ 
    print "<script>alert(\"El usuario ya esta en uso.\");window.location='../../matriz_privilegios.php';</script>";
    }

mysqli_close($enlace);

?>