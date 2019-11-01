<?php

include 'conexion.php';

if(null!==($capacitacion= $_GET['capacitacion'])){
    $finalizar= "UPDATE capacitaciones SET fecha_fin=now() WHERE id_capacitacion='$capacitacion' AND fecha_fin IS NULL";
    mysqli_query($enlace, $finalizar);
    header("Location: ../../buscar_capacitacion.php");
}

if(null!==($proyecto= $_GET['proyecto'])){
    $finalizar= "UPDATE proyectos  SET fecha_fin=now() WHERE id_proyecto='$proyecto'  AND fecha_fin IS NULL";
    mysqli_query($enlace, $finalizar);
    header("Location: ../../buscar_proyecto.php");
}
if(null!==($indes= $_GET['indes'])){
    $finalizar= "UPDATE indes SET fecha_fin=now() WHERE id_indes='$indes' AND fecha_fin IS NULL";
    mysqli_query($enlace, $finalizar);
    header("Location: ../../buscar_indes.php");
}


?>