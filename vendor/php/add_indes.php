<?php
// include = para conectar a la base de datos
// ingresar el nombre del archivo en comillas simples 'conexion.php' 
include ("conexion.php");
//if(isset($_POST['add_indes'])){
    $tipo  = mysqli_real_escape_string($enlace,(strip_tags($_POST["tipo"],ENT_QUOTES)));
    $fecha = substr($_POST["fecha"],6,4).substr($_POST["fecha"],3,2).substr($_POST["fecha"],0,2).substr($_POST["fecha"],11,2).substr($_POST["fecha"],14,2).'00';
    $titulo  = mysqli_real_escape_string($enlace,(strip_tags($_POST["titulo"],ENT_QUOTES)));
    $tema  = mysqli_real_escape_string($enlace,(strip_tags($_POST["tema"],ENT_QUOTES)));
    $asesor  = ($_POST["asesor"]);
    $observacion  = mysqli_real_escape_string($enlace,(strip_tags($_POST["observacion"],ENT_QUOTES)));
    $visible  = 1;

    for($i=0; $i<COUNT($asesor); $i++){
        $asesor[$i];
      }
      $usuarios= implode($asesor , ',  ');

    $consultaIgual = mysqli_query($enlace, "SELECT * FROM indes WHERE titulo_indes='$titulo'")  or die(mysqli_error($enlace));
    if(mysqli_num_rows($consultaIgual) == 0){
            $insert = mysqli_query($enlace, "INSERT INTO indes(fecha,titulo_indes,id_tema,observaciones,usuarios ,id_tipo_indes,visible)
                                                VALUES('$fecha','$titulo','$tema','$observacion','$usuarios','$tipo','$visible')") or die(mysqli_error($enlace));
            if($insert){
                print "<script>alert(\"Registro exitoso.\");window.location='../../new_indes.php';</script>";
            }else{
                print "<script>alert(\"No se pudo guardar.\");window.location='../../new_indes.php';</script>";
            }
         
    }else{
        print "<script>alert(\"El título de indes ya existe.\");window.location='../../new_indes.php';</script>";
    } 
//}
mysqli_close($enlace);
?>