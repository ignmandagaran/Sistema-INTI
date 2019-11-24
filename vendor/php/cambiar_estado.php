<?php

include 'conexion.php';

if(null!==($usuario= $_GET['usuario'])){
    $getVisible=mysqli_query($enlace,"SELECT visible FROM usuarios WHERE id_usuario='$usuario'");
    foreach($getVisible AS $row){
        $visible = $row['visible'];
      }
      
    if($visible==1){    
        $borrado= "UPDATE usuarios SET visible=0 WHERE id_usuario='$usuario'";
        mysqli_query($enlace, $borrado);
        header("Location: ../../matriz_privilegios.php");
    }
    else{
        $borrado= "UPDATE usuarios SET visible=1 WHERE id_usuario='$usuario'";
        mysqli_query($enlace, $borrado);
        header("Location: ../../matriz_privilegios.php");
    }
}

?>