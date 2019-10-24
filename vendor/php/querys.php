<?php
//Conexion con la base de datos del inti. Dentro de ella se encuentra la variable de conexion $enlace.
//require 'vendor/php/conexion.php';

//Query y funcionar para cargar un select con las provincias
$query_provincias = "SELECT * FROM provincias WHERE visible=1";

//Query para cargar proyectos (visibles) en select
$query_proyectos = "SELECT * FROM proyectos WHERE visible=1 ";

//Query para cargar tipos de capacitacion (visibles) en select
$query_tipo_capacitacion = "SELECT * FROM tipo_capacitaciones WHERE visible=1 ";

//Query para cargar capacitaciones (visibles) en select
$query_titulo_capacitaciones = "SELECT * FROM capacitaciones WHERE visible=1 ";

//Query para cargar localidades (visibles) en select
$query_localidades = "SELECT * FROM localidades WHERE visible=1 ";

//Query para cargar usuarios (visibles) en select
$query_usuarios = "SELECT * FROM usuarios WHERE visible=1 ";



/*function selectProvincias (){
    foreach ($enlace->query($query_provincias) as $row){
        return '<option value="'.$row[id_provincia].'">'.$row[provincia].'</option>';
    }
}*/
?>