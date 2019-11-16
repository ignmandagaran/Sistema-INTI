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
  $visible  = 1;
  $usuarioMinusculas = strtolower($usuario);
  $fecha_alta  = date ("YmdHis");
  $md5Password = md5($password);

  $consultaIgual = mysqli_query($enlace, "SELECT * FROM usuarios WHERE usuariominusculas='$usuarioMinusculas'");

  $query = "INSERT INTO `usuarios` (`usuario`, `usuariominusculas`, `clave`, `nombre`, `id_nodo`, `id_region`, `id_rol`, `fecha_alta`, `usuario_registro`,`visible`)
            VALUES('$usuario', '$usuarioMinusculas','$md5Password','$nombreCompleto', NULL, NULL, '$rolUsuario', '$fecha_alta', '$usuarioRegistro', '$visible')";

  if(mysqli_num_rows($consultaIgual) == 0){
    if($password==$confirmPassword){
      $insert = mysqli_query($enlace,$query) or die(mysqli_error($enlace));
      if($insert){
        print "<script>alert(\"Registro exitoso.\");window.location='../../register.php';</script>";
      }
      else{
        print "<script>alert(\"No se pudo guardar el registro.\");window.location='../../register.php';</script>";
      }
    }
    else{
      print "<script>alert(\"Las contraseñas no coinciden.\");window.location='../../register.php';</script>";
    }
  }
  else{ 
    print "<script>alert(\"El usuario ya esta en uso.\");window.location='../../register.php';</script>";
    }

mysqli_close($enlace);

?>