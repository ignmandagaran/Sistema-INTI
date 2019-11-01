<?php

// include = para conectar a la base de datos
// ingresar el nombre del archivo en comillas simples 'conexion.php' 
include ("conexion.php");

//if(isset($_POST['add'])){
    $titulo= mysqli_real_escape_string($enlace,(strip_tags($_POST["titulo"],ENT_QUOTES)));
    $capacitacion= mysqli_real_escape_string($enlace,(strip_tags($_POST["capacitacion"],ENT_QUOTES)));
    $tema= mysqli_real_escape_string($enlace,(strip_tags($_POST["tema"],ENT_QUOTES)));
    $localidad= mysqli_real_escape_string($enlace,(strip_tags($_POST["localidad"],ENT_QUOTES)));
    $fecha= substr($_POST["fecha"],6,4).substr($_POST["fecha"],3,2).substr($_POST["fecha"],0,2).substr($_POST["fecha"],11,2).substr($_POST["fecha"],14,2).'00';
    $hora1= ($_POST ["hora1"]);
    $hora2= ($_POST ["hora2"]);
    $docentes= mysqli_real_escape_string($enlace,(strip_tags($_POST["docente"],ENT_QUOTES)));
    $asistentes= mysqli_real_escape_string($enlace,(strip_tags($_POST["asistentes"],ENT_QUOTES)));
    $empresas= mysqli_real_escape_string($enlace,(strip_tags($_POST["asistentes"],ENT_QUOTES)));
    $observaciones= mysqli_real_escape_string($enlace,(strip_tags($_POST["observaciones"],ENT_QUOTES)));
    $visible  = 1;  
    
    $consultaIgual = mysqli_query($enlace, "SELECT * FROM modulos WHERE titulo_modulo='$titulo'");
    if(mysqli_num_rows($consultaIgual) == 0){
            $insert = mysqli_query($enlace, "INSERT INTO modulos(titulo_modulo, id_capacitacion, id_tema, id_localidad, fecha, hora_inicio, hora_fin, cantidad_asistentes, cantidad_empresas, observaciones, visible)
                                                VALUES('$titulo', '$capacitacion', '$tema', '$localidad','$fecha', '$hora1', '$hora2', '$asistentes', '$empresas', '$observaciones', '$visible')") 
                                                or die(mysqli_error($enlace));
            if($insert){
                print "<script>alert(\"Registro exitoso.\");window.location='../../new_modulo.php';</script>";
                $id_modulo= mysqli_query($enlace, "SELECT id_modulo FROM modulos WHERE titulo_modulo='$titulo'");
                $obj = $id_modulo->fetch_object();
                $modulo_id = $obj->id_modulo;
                $insert2= mysqli_query($enlace, "INSERT INTO modulos_usuarios(id_modulo, id_usuario, visible)
                                                VALUES('$modulo_id', '$docentes' '$visible')") 
                                                or die(mysqli_error($enlace));                                    
                $update= mysqli_query($enlace, "UPDATE capacitaciones SET asistentes='$asistentes', empresas='$empresas' WHERE id_capacitacion='$capacitacion'");
            }else
              print "<script>alert(\"No se pudo guardar el registro.\");window.location='../../new_modulo.php';</script>";
            
    }      
    else
      print "<script>alert(\"El titulo del modulo ya existe.\");window.location='../../new_modulo.php';</script>";
    
mysqli_close($enlace);

?>