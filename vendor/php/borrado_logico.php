<?php

include 'conexion.php';

if(null!==($capacitacion= $_GET['capacitacion'])){
    $borrado= "UPDATE capacitaciones SET visible=0 WHERE id_capacitacion='$capacitacion'";
    mysqli_query($enlace, $borrado);
    header("Location: ../../buscar_capacitacion.php");
}

if(null!==($modulo= $_GET['modulo'])){
    $borrado= "UPDATE modulos SET visible=0 WHERE id_modulo='$modulo'";
    mysqli_query($enlace, $borrado);
    header("Location: ../../buscar_modulo.php");
}

if(null!==($proyecto= $_GET['proyecto'])){
    $borrado= "UPDATE proyectos SET visible=0 WHERE id_proyecto='$proyecto'";
    mysqli_query($enlace, $borrado);
    header("Location: ../../buscar_proyecto.php");
}

if(null!==($cliente= $_GET['cliente'])){
    $borrado= "UPDATE clientes SET visible=0 WHERE id_cliente='$cliente'";
    mysqli_query($enlace, $borrado);
    header("Location: ../../buscar_cliente.php");
}

if(null!==($indes= $_GET['indes'])){
    $borrado= "UPDATE indes SET visible=0 WHERE id_indes='$indes'";
    mysqli_query($enlace, $borrado);
    header("Location: ../../buscar_indes.php");
}

if(null!==($visita= $_GET['visita'])){
    $borrado= "UPDATE visitas SET visible=0 WHERE id_visita='$visita'";
    mysqli_query($enlace, $borrado);
    header("Location: ../../buscar_visita.php");
}
?>