<?php
//Conexion con la base de datos del inti. Dentro de ella se encuentra la variable de conexion $enlace.
//require 'vendor/php/conexion.php';

//Query y funcionar para cargar un select con las provincias
$query_provincias = "SELECT id_provincia, provincia FROM `provincias`";




/*function selectProvincias (){
    foreach ($enlace->query($query_provincias) as $row){
        return '<option value="'.$row[id_provincia].'">'.$row[provincia].'</option>';
    }
}*/
?>