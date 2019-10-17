<?php
session_start();
require('config.php');


    if (!isset($_POST["usuario"])){
       echo "El campo usuario esta vacio o es invalido.";
    }elseif (!isset($_POST["clave"])){
        echo "El campo contraseña esta vacio o es invalido.";
    }else{
        $clave = $_POST["clave"];
        $clave = MD5($clave);
        $usuario = $_POST["usuario"];
    }

    $mysqli = new mysqli(_DB_SERVER_,_DB_USER_,_DB_PASSWD_,_DB_NAME_);
    $sql = "SELECT * FROM usuarios";
        
    foreach ($mysqli->query($sql) as $row){
        if (($row["usuario"]==$usuario)&&($row["clave"]==$clave)){
            echo $row["clave"].$row ["usuario"];
            $_SESSION["clave"] = $row["clave"];
            $_SESSION["usuario"] = $row["usuario"];
          header('Location: /inti/principal.html');
        }
    }
?>