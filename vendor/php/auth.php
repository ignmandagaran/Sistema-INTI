<?php
session_start();
require('config.php');

$clave = $_POST["clave"];
$clave = MD5($clave);
$usuario = $_POST["usuario"];

$mysqli = new mysqli(_DB_SERVER_,_DB_USER_,_DB_PASSWD_,_DB_NAME_);
$sql = mysql_query("SELECT * FROM usuarios WHERE usuario='".$_POST["usuario"]."' AND clave='".$_POST["clave"]."'");

if(mysql_num_rows($sql)==1){
    $row = mysql_fetch_array($sql);
    $usuario = $row["usuario"];
    if(isset($_POST['recordar'])){
        if($_POST['recordar'] == true){
            mt_srand(time());
            $rand = mt_rand(1000000,9999999);
            mysql_query("UPDATE usuarios 
							SET cookie='".$rand."' 
                            WHERE id_usuario=".$row["id_usuario"]) or die(mysql_error());
            setcookie("id_usuario", $row["id_usuario"], time()+(60*60*24*365));
			setcookie("marca", $rand, time()+(60*60*24*365));
        }
    }
    header('Location: /inti/principal.html');

    foreach ($mysqli->query($sql) as $row){
        if (($row["usuario"]==$usuario)&&($row["clave"]==$clave)){
            echo $row["clave"].$row ["usuario"];
            $_SESSION["clave"] = $row["clave"];
            $_SESSION["usuario"] = $row["usuario"];
          
        }
    }
?>