<?php
/*session_start();
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

<?php
	*/
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

//Encriptamos en MD5
$passPOST = md5($passPOST);

//Comprobamos si los datos son correctos
if($userBD == $userPOSTMinusculas and $passPOST == $passwordBD){

	session_start();
	$_SESSION['usuario'] = $datos['usuario'];
    $_SESSION['estado'] = 'Autenticado';
    
    header('Location: ../../principal.php');

	/* Sesión iniciada, si se desea, se puede redireccionar desde el servidor */

//Si los datos no son correctos, o están vacíos, muestra un error
//Además, hay un script que vacía los campos con la clase "acceso" (formulario)
} else if ( $userBD != $userPOSTMinusculas || $userPOST == "" || $passPOST == "" || !password_verify($passPOST, $passwordBD) ) {
	die ('<script>$(".acceso").val("");</script>
Los datos de acceso son incorrectos');
} else {
	die('Error');
};
?>