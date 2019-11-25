<?php

// include = para conectar a la base de datos
// ingresar el nombre del archivo en comillas simples 'conexion.php' 
include ("conexion.php");
 
$queryUpdate = "UPDATE usuarios SET ";
$verificador = 0;
$visible = 1;

if (isset($_POST["usuario"])){
  $usuario= strtolower(mysqli_real_escape_string($enlace,(strip_tags($_POST["usuario"],ENT_QUOTES))));
 }else
  {
    $mensajeError = "<script>alert(\"No se pudo hacer la modificacion.\");window.location='../../modificar_usuario.php?usuario=$usuario';</script>";
    exit ($mensajeError);
  }

//Se verifica si la contraseña es la que ya tiene el usuario
$consulta = "SELECT * FROM `usuarios` WHERE usuariominusculas='".$usuario."'";

//Obtenemos los resultados
$resultado = mysqli_query($enlace, $consulta);
$datos = mysqli_fetch_array($resultado);


if (isset($_POST["nombreCompleto"])){
  $nombre= mysqli_real_escape_string($enlace,(strip_tags($_POST["nombreCompleto"],ENT_QUOTES)));
  if($datos['nombre']!=$nombre){
    if($verificador==0){
      $queryUpdate .= "nombre='$nombre'";
      ++$verificador;
    }else{
      $queryUpdate .= ", nombre='$nombre'";
    }
  }
}else
  {
    $mensajeError = "<script>alert(\"No se pudo hacer la modificacion.\");window.location='../../modificar_usuario.php?usuario=$usuario';</script>";
    exit ($mensajeError);
  }

if(isset($_POST["password"])&&isset($_POST["confirmPassword"])){
  $password= mysqli_real_escape_string($enlace,(strip_tags($_POST["password"],ENT_QUOTES)));
  $confirmPassword= mysqli_real_escape_string($enlace,(strip_tags($_POST["confirmPassword"],ENT_QUOTES)));
  if($password==$confirmPassword){
    if($datos["clave"]!=$password){
      $passwordMD5 = md5($password);
      $queryPass = "clave='$passwordMD5'";
      if($verificador==0){
        $queryUpdate .= $queryPass;
        ++$verificador;
      }else{
        $queryUpdate .= ", ".$queryPass;
      }
    }
  }
}else
  {
    $mensajeError = "<script>alert(\"No se pudo hacer la modificacion.\");window.location='../../modificar_usuario.php?usuario=$usuario';</script>";
    exit ($mensajeError);
  }

$queryUpdate .=" WHERE usuariominusculas=$usuario";
$update= mysqli_query($enlace, $queryUpdate) or die($enlace-->error);

//CARGA DE DEDICACION -->

$queryDedicaciones = "SELECT u.usuariominusculas, d.dedicacion, d.fecha FROM usuarios u INNER JOIN dedicaciones d ON d.usuario=u.usuariominusculas WHERE u.usuariominusculas='gustavo'";
$resultado2 = mysqli_query($enlace,$queryDedicaciones);
$datos2 = mysqli_fetch_array($resultado2);

if(isset($_POST["dedicacion"])){
  $dedicacion= mysqli_real_escape_string($enlace,(strip_tags($_POST["dedicacion"],ENT_QUOTES)));
}else{
 // $mensajeError = "<script>alert(\"No se pudo hacer la modificacion.\");window.location='../../modificar_usuario.php?usuario=$usuario';</script>";
 // exit ($mensajeError);
  }

if(isset($_POST["fecha_dedicacion"])){
  $fecha_dedicacion = mysqli_real_escape_string($enlace,(strip_tags($_POST["fecha_dedicacion"])));
  foreach ($resultado2 as $row){
    $fecha = $row["fecha"];
    $parsefecha = date("m/Y", strtotime($row['fecha']));
    if($fecha_dedicacion == $parsefecha){
      $queryUpDedicacion = "UPDATE `dedicaciones` SET `dedicacion` = '$dedicacion' WHERE `dedicaciones`.`fecha` LIKE '$fecha%' AND usuario='$usuario')";
    }
  }
}else{
  $mensajeError = "<script>alert(\"No se pudo hacer la modificacion.\");window.location='../../modificar_usuario.php?usuario=$usuario';</script>";
  exit ($mensajeError);
  }

//$update2 = mysqli_query($enlace, $queryUpDedicacion) or die($enlace-->error);

$insert= mysqli_query($enlace,"INSERT INTO `dedicaciones` (`fecha`, `dedicacion`, `usuario`, `visible`)
                                VALUES('$fecha_dedicacion', '$dedicacion','$usuario','$visible')")
                                or die($enlace-->error);

if($update&&$update2){
    print "<script>alert(\"Los cambios se han guardado correctamente.\");window.location='../../modificar_usuario.php?usuario=$usuario';</script>";                                                                
      }else
        print "<script>alert(\"No se pudo hacer la modificacion.\");window.location='../../modificar_usuario.php?usuario=$usuario';;</script>";


?>