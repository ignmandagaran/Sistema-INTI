<?php
session_start();
include 'vendor/php/querys.php';
include 'vendor/php/conexion.php';

//Comprobamos si el usario está logueado
//Si no lo está, se le redirecciona al index
//Si lo está, definimos el botón de cerrar sesión y la duración de la sesión
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
	header('Location: index.php');
} else {
	$estado = $_SESSION['usuario'];
	require('vendor/php/sesiones.php');
};
?>

<!DOCTYPE html>
<html lang="en">

<!-- Header include-->
<?php $title = "Buscar Módulo"; 
      include 'vendor/php/includes/header.php' ?>

<body id="page-top">

<!--Fuente Iconos-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- Navbar include -->
  <?php include 'vendor/php/includes/navbar.php' ?>

  <div id="wrapper">

    <!-- Sidebar include-->
    <?php include 'vendor/php/includes/sidebar.php' ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Panel de control</a>
          </li>
          <li class="breadcrumb-item active">Busqueda de módulos</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-fw fa-plus-circle"></i>
            Buscar módulos por:</div>
          <div class="card-body">
          <form method="get">
              <div class="form-row">
                <div class="form-group col-md-4 col-sm-4">
                      <label for="tema">Título</label>
                      <select class="form-control" id="select_id" name="titulo">
                      <option value=''>Seleccionar título..</option>
                        <?php 
                        //Ciclo donde se trae todos los títulos de modulos (visibles) de la base de datos. variable $enlace heredada de conexion.php
                       foreach($enlace->query($query_titulo_modulos) AS $opciones): ?>
                       <option value="<?php echo $opciones ['id_modulo'] ?>"> <?php echo $opciones ['titulo_modulo'] ?></option>
                       <?php endforeach ?>  
                      </select>
                </div>
                <div class="form-group col-md-4 col-sm-4">
                      <label for="tema">Capacitación</label>
                      <select class="form-control" id="select_id" name="capacitacion">
                      <option value=''>Seleccionar título..</option>
                        <?php 
                        //Ciclo donde se trae todos los títulos de capacitación (visibles) de la base de datos. variable $enlace heredada de conexion.php
                       foreach($enlace->query($query_titulo_capacitaciones) AS $opciones): ?>
                       <option value="<?php echo $opciones ['id_capacitacion'] ?>"> <?php echo $opciones ['titulo_capacitacion'] ?></option>
                       <?php endforeach ?>  
                      </select>
                </div>
                <div class="form-group col-md-4 col-sm-4">
                      <label for="tema">Tema</label>
                      <select class="form-control" id="select_id" name="tema">
                      <option value=''>Seleccionar tema..</option>
                        <?php 
                        //Ciclo donde se trae todos los temas (visibles) de la base de datos. variable $enlace heredada de conexion.php
                       foreach($enlace->query($query_temas) AS $opciones): ?>
                       <option value="<?php echo $opciones ['id_tema'] ?>"> <?php echo $opciones ['tema'] ?></option>
                       <?php endforeach ?>  
                      </select>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Modulos encontrados:</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                      <th>#</th>
                      <th>Capacitación</th>
                      <th>Título</th>
                      <th>Tema</th>
                      <th>Localidad</th>
                      <th>Fecha</th>
                      <th>Inicio</th>
                      <th>Fin</th>
                      <th class="text-center">Asistentes</th>
                      <th class="text-center">Empresas</th>
                      <th class="text-center">Docentes</th>
                      <th class="text-center">Observaciones</th>
                      <th class="text-center">Modifiicar</th>
                      <th class="text-center">Borrar</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                      <th>#</th>
                      <th>Capacitación</th>
                      <th>Título</th>
                      <th>Tema</th>
                      <th>Localidad</th>
                      <th>Fecha</th>
                      <th>Inicio</th>
                      <th>Fin</th>
                      <th class="text-center">Asistentes</th>
                      <th class="text-center">Empresas</th>
                      <th class="text-center">Docentes</th>
                      <th class="text-center">Observaciones</th>
                      <th class="text-center">Modificar</th>
                      <th class="text-center">Borrar</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                  <?php
                  // FILTROS PARA BUSCAR POR MODULO
                  $query_aConsultar = $query_buscar_modulos;

                  $titulo = $_GET["titulo"];
                  if (!empty ($titulo)){
                  $query_aConsultar.=" AND (m.id_modulo=$titulo)";
                  }

                  $capacitacion = $_GET["capacitacion"];
                  if (!empty ($capacitacion)){
                  $query_aConsultar.=" AND (m.id_capacitacion=$capacitacion)";
                  }
                  
                  $tema = $_GET["tema"];
                  if (!empty ($tema)){
                  $query_aConsultar.=" AND (m.id_tema=$tema)";
                  }

                    $result = mysqli_query($enlace,$query_aConsultar) or die($enlace->error);
                    while ($row = $result->fetch_assoc()){ 
                      $observacionesModal=$row['observaciones'];
                      $usuariosModal=$row['usuarios'];
                      ?>
                       <tr>
                          <td><?php echo $row['id_modulo'];?></td>
                          <td><?php echo $row['titulo_capacitacion'];?></td>
                          <td><?php echo $row['titulo_modulo'];?></td>
                          <td><?php echo $row['tema'];?></td>
                          <td><?php echo $row['localidad'];?></td>
                          <td><?php echo $row['fecha'];?></td>
                          <td><?php echo $row['hora_inicio'];?></td>
                          <td><?php echo $row['hora_inicio'];?></td>
                          <td class="text-center"><?php echo $row['cantidad_asistentes'];?></td>
                          <td class="text-center"><?php echo $row['cantidad_empresas'];?></td>
                          <td class="text-center"><a href="javascript:void(0);" title="Ver Docentes" data-toggle="modal" data-target="#modalUsuarios" onclick="carga_ajax('<?php echo $usuariosModal;?>','modalUsuarios','vendor/php/ajax/usuario_ajax.php');"><i class="material-icons">visibility</i></a></td>
                          <td class="text-center"><a href="javascript:void(0);" title="Ver Observaciones" data-toggle="modal" data-target="#modalObservaciones" onclick="carga_ajax('<?php if($observacionesModal!=NULL){ echo $observacionesModal;}else{echo 'No hay observación.';}?>','modalObservaciones','vendor/php/ajax/observacion_ajax.php');"><i class="material-icons">visibility</i></a></td>
                          <td class="text-center"><a href="#" class="settings" title="Modificar" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a></td>
                          <td class="text-center"><a href="vendor/php/borrado_logico.php?modulo= <?php echo $row['id_modulo'];?>" onclick= "return confirmation()" class="delete" title="Borrar" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
                       </tr>
                    <?php }?>  
                     </tr>
                  </tbody>
              </table>
            </div>
          </div>
        </div>
      
      </div>
      <!-- /.container-fluid -->

      <!-- Footer include -->            
        <?php include 'vendor/php/includes/footer.php' ?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

     <!--Include modal Observacion-->
   
   <?php include 'vendor/php/includes/modal_observacion.php'?>

   <!-- Logout Modal include-->
   <?php include 'vendor/php/includes/logout.php'?>

   <!--Include Modal Asesores-->
   <?php include 'vendor/php/includes/modal_asesores.php'?>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal include-->
    <?php include 'vendor/php/includes/logout.php'?>

    <!-- Scripts include-->
    <?php include 'vendor/php/includes/scripts.php'?>

    <!--Script Confirmacion-->
    <script type="text/javascript">
     function confirmation() 
     {
        if(confirm("Se va a borrar el registro, ¿está seguro?"))
        {
            return true;
        }
            else
        {
            return false;
        }
    }
    </script>

     <!--Script Modal Ajax-->
     <script>
      function carga_ajax (x,div,url)
      {
        //alert(ruta);
        $.post
        (
          url,
          {x:x},
          function (resp)
          {
            $("#"+div+"").html (resp);
          }
        );
      }
    </script>

    <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
                    timeZone:'UTC -3',
                    format:'DD/MM/YYYY HH:mm',
                    icons: {time:'far fa-clock'}
                    
                  });
            });
            $(function () {
                $('#datetimepicker2').datetimepicker({
                    timeZone:'UTC -3',
                    format:'DD/MM/YYYY HH:mm',
                    icons: {time:'far fa-clock'}
                    
                });
            });
      
      //format: 'DD/MM/YYYY'
  </script>

</body>

</html>