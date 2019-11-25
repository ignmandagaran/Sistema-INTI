<?php

include 'conexion.php';

if(null!==($usuario= $_GET['usuario'])){
    $getIdRol=mysqli_query($enlace,"SELECT id_rol FROM usuarios WHERE id_usuario='$usuario'");
    foreach($getIdRol AS $row){
        $id_rol = $row['id_rol'];
      }

    if($id_rol==1){    
        $update= "UPDATE usuarios SET id_rol=2 WHERE id_usuario='$usuario'";
        mysqli_query($enlace, $update);
        header("Location: ../../matriz_privilegios.php");
    }
    else{
        $update= "UPDATE usuarios SET id_rol=1 WHERE id_usuario='$usuario'";
        mysqli_query($enlace, $update);
        header("Location: ../../matriz_privilegios.php");
    }
}

?>