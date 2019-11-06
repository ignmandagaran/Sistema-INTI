<?php

// include = para conectar a la base de datos
// ingresar el nombre del archivo en comillas simples 'conexion.php' 
include_once ("conexion.php");

if(isset($_POST['titulo'])){
    $titulo= mysqli_real_escape_string($enlace,(strip_tags($_POST["titulo"],ENT_QUOTES)));
    $query_buscar_capacitaciones= "SELECT * FROM capacitaciones C 
    INNER JOIN tipo_capacitaciones tc ON tc.id_tipo_capacitacion=c.id_tipo_capacitacion
    INNER JOIN proyectos p ON p.id_proyecto=c.id_proyecto WHERE c.visible=1 AND tiulo_capacitacion=$titulo ";
    
} 
    if(isset($_POST['tipo'])){
        $tipo= mysqli_real_escape_string($enlace,(strip_tags($_POST["tipo"],ENT_QUOTES)));
        $query_buscar_capacitaciones= "SELECT * FROM capacitaciones C 
        INNER JOIN tipo_capacitaciones tc ON tc.id_tipo_capacitacion=c.id_tipo_capacitacion
        INNER JOIN proyectos p ON p.id_proyecto=c.id_proyecto WHERE c.visible=1 AND tipo_capacitacion=$tipo ";
        
    }
if(isset($_POST['proyecto'])){
    $proyecto= mysqli_real_escape_string($enlace,(strip_tags($_POST["proyecto"],ENT_QUOTES)));
    $query_buscar_capacitaciones= "SELECT * FROM capacitaciones C 
    INNER JOIN tipo_capacitaciones tc ON tc.id_tipo_capacitacion=c.id_tipo_capacitacion
    INNER JOIN proyectos p ON p.id_proyecto=c.id_proyecto WHERE c.visible=1 AND titulo_proyecto=$proyecto";
    
}
    $query_buscar_capacitaciones= 'SELECT c.id_capacitacion, c.titulo_capacitacion, tc.id_tipo_capacitacion, c.fecha_inicio, c.fecha_fin, c.observaciones 
    FROM capacitaciones C 
    INNER JOIN tipo_capacitaciones tc ON tc.id_tipo_capacitacion=c.id_tipo_capacitacion
    INNER JOIN proyectos p ON p.id_proyecto=c.id_proyecto WHERE c.visible=1';
  
?>