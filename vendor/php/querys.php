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

//Query para cargar localidades (visibles) en select
$query_localidadesClientes = 
"SELECT c.localidad, c.id_localidad  
FROM localidades c INNER JOIN clientes cl ON c.id_localidad = cl.id_localidad
WHERE cl.visible=1";

//Query para cargar usuarios (visibles) en select
$query_usuarios = "SELECT * FROM usuarios WHERE visible=1 ";

$query_usuarios_perfil = "SELECT * FROM usuarios WHERE visible=1 AND usuariominusculas=";

//Query para cargar tema (visibles) en select
$query_temas = "SELECT * FROM temas WHERE visible=1 ";

//Query para cargar modulos (visibles) en select
$query_titulo_modulos = "SELECT * FROM modulos WHERE visible=1 ";

//Query para cargar tipos de proyectos (visibles) en select
$query_tipo_proyectos = "SELECT * FROM tipo_proyectos WHERE visible=1 ";

//Query para cargar tipos de visitas (visibles) en select
$query_tipo_visitas = "SELECT * FROM tipo_visitas WHERE visible=1";

//Query para cargar tipos de asistencias (visibles) en select
$query_tipo_asistencias = "SELECT * FROM tipo_asistencias WHERE visible=1";

//Query para cargar cuits (visibles) en select
$query_clientes = "SELECT c.id_cliente,c.nombre,c.cuit,c.actividad_principal,l.localidad, c.rubro, c.id_localidad  FROM clientes c INNER JOIN localidades l ON c.id_localidad=l.id_localidad WHERE c.visible=1 ";

//Query para cargar cuits (visibles) en select
$query_cuit = "SELECT cuit, id_cliente FROM clientes WHERE visible=1 ";

$query_dedicacion = "SELECT dedicacion FROM dedicaciones WHERE fecha=(SELECT MAX(fecha) from dedicaciones) AND usuario=";

//Query para cargar modulos (visibles) en select
$query_buscar_modulos= 'SELECT m.id_modulo, c.titulo_capacitacion, m.titulo_modulo, t.tema, l.localidad, m.fecha, m.hora_inicio, m.hora_fin, m.cantidad_asistentes, m.cantidad_empresas, u.nombre, m.observaciones FROM modulos m 
                    INNER JOIN temas t ON t.id_tema=m.id_tema
                    INNER JOIN localidades l ON l.id_localidad=m.id_localidad
                    INNER JOIN capacitaciones c ON c.id_capacitacion=m.id_capacitacion 
                    INNER JOIN modulos_usuarios mu ON mu.id_modulo=m.id_modulo
                    INNER JOIN usuarios u ON mu.id_usuario=u.id_usuario
                    WHERE c.visible=1 ORDER BY m.fecha DESC';

//Query para cargar proyectos (visibles) en select
$query_buscar_proyectos= 'SELECT * FROM proyectos p 
                    INNER JOIN tipo_proyectos tp ON tp.id_tipo_proyecto=p.id_tipo_proyecto
                    WHERE p.visible=1 ORDER BY p.fecha_inicio DESC';


//Query para cargar clienttes (visibles) en select
$query_buscar_clientes= 'SELECT * FROM clientes c 
                    INNER JOIN localidades l ON l.id_localidad=c.id_localidad
                    WHERE c.visible=1';

//Query para cargar indes (visibles) en select
$query_buscar_indes= 'SELECT * FROM indes i 
                    INNER JOIN tipo_indes ti ON ti.id_tipo_indes=i.id_tipo_indes
                    INNER JOIN temas t ON t.id_tema=i.id_tema
                    WHERE i.visible=1 ORDER BY i.fecha DESC';

//Query para cargar visitas (visibles) en select
$query_buscar_visitas= 'SELECT v.id_visita, c.cuit, tv.tipo_visita, ta.tipo_asistencia,
                     p.titulo_proyecto, v.fecha, v.fecha_fin, v.hora_inicio, v.hora_fin, u.nombre, v.observaciones 
                    FROM visitas v INNER JOIN clientes c ON c.id_cliente=v.id_cliente
                    INNER JOIN tipo_visitas tv ON tv.id_tipo_visita=v.id_tipo_visita
                    INNER JOIN tipo_asistencias ta ON tv.id_tipo_visita=ta.id_tipo_visita
                    INNER JOIN proyectos p ON p.id_proyecto=v.id_proyecto
                    INNER JOIN visita_usuario vu ON vu.id_visita=v.id_visita
                    INNER JOIN usuarios u ON vu.id_usuario=u.id_usuario
                    WHERE v.visible=1  ORDER BY v.fecha DESC';

//Query para cargar capacitaciones (visibles)
$query_buscar_capacitaciones= 'SELECT c.id_capacitacion, c.titulo_capacitacion, tc.tipo_capacitacion, p.titulo_proyecto, c.fecha_inicio, c.fecha_fin, c.asistentes, c.empresas, c.observaciones 
                                FROM capacitaciones C 
                                INNER JOIN tipo_capacitaciones tc ON tc.id_tipo_capacitacion=c.id_tipo_capacitacion
                                INNER JOIN proyectos p ON p.id_proyecto=c.id_proyecto WHERE c.visible=1 ORDER BY c.fecha_inicio DESC';

//Query para cargar usuarios (visibles) en select
$query_buscar_usuarios= 'SELECT u.id_usuario,u.usuario,u.usuariominusculas,u.fecha_alta,u.id_rol,u.visible,u.nombre,r.rol 
                         FROM usuarios u INNER JOIN roles r ON u.id_rol = r.id_rol';



/*function selectProvincias (){
    foreach ($enlace->query($query_provincias) as $row){
        return '<option value="'.$row[id_provincia].'">'.$row[provincia].'</option>';
    }
}*/
?>