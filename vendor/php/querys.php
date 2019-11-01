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

//Query para cargar tema (visibles) en select
$query_temas = "SELECT * FROM temas WHERE visible=1 ";

//Query para cargar modulos (visibles) en select
$query_titulo_modulos = "SELECT * FROM modulos WHERE visible=1 ";

//Query para cargar tipos de proyectos (visibles) en select
$query_tipo_proyectos = "SELECT * FROM tipo_proyectos WHERE visible=1 ";

//Query para cargar tipos de indes (visibles) en select
$query_tipo_indes = "SELECT * FROM tipo_indes WHERE visible=1";

//Query para cargar modulos (visibles) en select
$query_buscar_modulos= 'SELECT * FROM modulos m 
                    INNER JOIN temas t ON t.id_tema=m.id_tema
                    INNER JOIN localidades l ON l.id_localidad=m.id_localidad
                                       INNER JOIN capacitaciones c ON c.id_capacitacion=m.id_capacitacion WHERE c.visible=1';

//Query para cargar proyectos (visibles) en select
$query_buscar_proyectos= 'SELECT * FROM proyectos p 
                    INNER JOIN tipo_proyectos tp ON tp.id_tipo_proyecto=p.id_tipo_proyecto
                    WHERE p.visible=1';


//Query para cargar clienttes (visibles) en select
$query_buscar_clientes= 'SELECT * FROM clientes c 
                    INNER JOIN localidades l ON l.id_localidad=c.id_localidad
                    WHERE c.visible=1';

//Query para cargar indes (visibles) en select
$query_buscar_indes= 'SELECT * FROM indes i 
                    INNER JOIN tipo_indes ti ON ti.id_tipo_indes=i.id_tipo_indes
                    INNER JOIN temas t ON t.id_tema=i.id_tema
                    WHERE i.visible=1';


/*function selectProvincias (){
    foreach ($enlace->query($query_provincias) as $row){
        return '<option value="'.$row[id_provincia].'">'.$row[provincia].'</option>';
    }
}*/
?>