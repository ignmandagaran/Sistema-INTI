<?php
//Conectamos a la base de datos
require('conexion.php');

//Obtenemos los datos del formulario de acceso
$userPOST = $_POST["usuario"]; 
$passPOST = $_POST["clave"];

//Filtro anti-XSS
$userPOST = htmlspecialchars(mysqli_real_escape_string($enlace, $userPOST));
$passPOST = htmlspecialchars(mysqli_real_escape_string($enlace, $passPOST));

//Definimos la cantidad máxima de caracteres
//Esta comprobación se tiene en cuenta por si se llegase a modificar el "maxlength" del formulario
//Los valores deben coincidir con el tamaño máximo de la fila de la base de datos
$maxCaracteresUsername = "45";
$maxCaracteresPassword = "45";

//Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente
if(strlen($userPOST) > $maxCaracteresUsername) {
	die('El nombre de usuario no puede superar los '.$maxCaracteresUsername.' caracteres');
};

if(strlen($passPOST) > $maxCaracteresPassword) {
	die('La contraseña no puede superar los '.$maxCaracteresPassword.' caracteres');
};

//Pasamos el input del usuario a minúsculas para compararlo después con
//el campo "usernamelowercase" de la base de datos
$userPOSTMinusculas = strtolower($userPOST);

//Escribimos la consulta necesaria
$consulta = "SELECT * FROM `usuarios` WHERE usuariominusculas='".$userPOSTMinusculas."'";

//Obtenemos los resultados
$resultado = mysqli_query($enlace, $consulta);
$datos = mysqli_fetch_array($resultado);

//Guardamos los resultados del nombre de usuario en minúsculas
//y de la contraseña de la base de datos
$userBD = $datos['usuariominusculas'];
$passwordBD = $datos['clave'];
$visible= $datos['visible'];
//Encriptamos en MD5
$passPOST = md5($passPOST);

//Comprobamos si los datos son correctos
if($userBD == $userPOSTMinusculas and $passPOST == $passwordBD and $visible==1){
    session_start();
	$_SESSION['usuario'] = $datos['usuario'];
    $_SESSION['estado'] = 'Autenticado';
    
    header('Location: ../../principal.php');

	/* Sesión iniciada, si se desea, se puede redireccionar desde el servidor */

//Si los datos no son correctos, o están vacíos, muestra un error
//Además, hay un script que vacía los campos con la clase "acceso" (formulario)
}else if ($visible==0){
    die ("<script>alert(\"Esta suspendida su cuenta. Por favor comuniquese con el administrador\");window.location='../../login.php';</script>");
} else if ( $userBD != $userPOSTMinusculas || $userPOST == "" || $passPOST == "" || !password_verify($passPOST, $passwordBD) ) {
	die ("<script>alert(\"El usuario o la contraseña son incorrectos.\");window.location='../../login.php';</script>");
} else {
	die('Error');
};
?>