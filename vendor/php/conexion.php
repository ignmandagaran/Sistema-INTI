<?php

define('_DB_SERVER_', 'localhost'); // Nombre del servidor MySql
define('_DB_NAME_', 'inti_sistema_ale'); // Nombre de la Base de Datos (BD) MySql
define('_DB_USER_', 'root'); // Nombre de Usuario de la BD MySql
define('_DB_PASSWD_', '123'); // Clave del usuario de la BD MySql

$enlace = mysqli_connect(_DB_SERVER_,_DB_USER_,_DB_PASSWD_,_DB_NAME_);
    if (mysqli_connect_errno()) {
        printf("Falló la conexión: %s\n", mysqli_connect_error());
        exit();
    }
mysqli_set_charset($enlace,'utf8');
?>