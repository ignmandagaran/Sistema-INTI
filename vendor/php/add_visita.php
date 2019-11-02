<?php

// include = para conectar a la base de datos
// ingresar el nombre del archivo en comillas simples 'conexion.php' 
include ("conexion.php");

//if(isset($_POST['add'])){
    $cuit= mysqli_real_escape_string($enlace,(strip_tags($_POST["cuit"],ENT_QUOTES)));
    $fecha= substr($_POST["fecha"],6,4).substr($_POST["fecha"],3,2).substr($_POST["fecha"],0,2).substr($_POST["fecha"],11,2).substr($_POST["fecha"],14,2).'00';
    $tipo= mysqli_real_escape_string($enlace,(strip_tags($_POST["tipo"],ENT_QUOTES)));
    $proyecto= mysqli_real_escape_string($enlace,(strip_tags($_POST["proyecto"],ENT_QUOTES)));
    $inicio= ($_POST ["inicio"]);
    $fin= ($_POST ["fin"]);
    $asesores= mysqli_real_escape_string($enlace,(strip_tags($_POST["asesor"],ENT_QUOTES)));
    $observaciones= mysqli_real_escape_string($enlace,(strip_tags($_POST["observaciones"],ENT_QUOTES)));
    $visible  = 1;  
    
            $insert = mysqli_query($enlace, "INSERT INTO visitas(id_cliente, fecha, id_tipo_visita, id_proyecto, hora_inicio, hora_fin, observaciones, visible)
                                                VALUES('$cuit', '$fecha', '$tipo','$proyecto', '$inicio', '$fin', '$observaciones', '$visible')") 
                                                or die(mysqli_error($enlace));
            if($insert){
                print "<script>alert(\"Registro exitoso.\");window.location='../../new_visita.php';</script>";
                $id_visita= mysqli_query($enlace, "SELECT id_modulo FROM modulos WHERE titulo_modulo='$titulo'");
                $obj = $id_modulo->fetch_object();
                $modulo_id = $obj->id_modulo;
                $insert2= mysqli_query($enlace, "INSERT INTO modulos_usuarios(id_modulo, id_usuario, visible)
                                                VALUES('$modulo_id', '$docentes' '$visible')") 
                                                or die(mysqli_error($enlace));                                   
            }else
              print "<script>alert(\"No se pudo guardar el registro.\");window.location='../../new_visita.php';</script>";
          
mysqli_close($enlace);

?>