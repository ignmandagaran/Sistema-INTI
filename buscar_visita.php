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
<?php $title = "Buscar Visitas"; 
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
          <li class="breadcrumb-item active">Busqueda de Visitas</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-fw fa-plus-circle"></i>
            Buscar Visita por:</div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="form-row">
              <div class="form-group col-md-4 col-sm-4">
                      <label for="tema">Cuit</label>
                      <select class="form-control" id="select_id" name="cuit" required>
                      <option value=''>Seleccionar cuit..</option>
                        <?php 
                        //Ciclo donde se trae todos los cuit de clientes (visibles) de la base de datos. variable $enlace heredada de conexion.php
                       foreach($enlace->query($query_cuit) AS $opciones): ?>
                       <option value="<?php echo $opciones ['id_cliente'] ?>"> <?php echo $opciones ['cuit'] ?></option>
                       <?php endforeach ?>  
                      </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="selectTipo">Tipo</label>
                  <select class="form-control" name="tipo" id="selectTipo">
                    <option value="">Seleccionar tipo..</option>
                      <?php 
                         //Ciclo donde se trae todos los tipos de capacitacion (visibles) de la base de datos. variable $enlace heredada de conexion.php
                         foreach($enlace->query($query_tipo_visitas) AS $opciones): ?>
                           <option value="<?php echo $opciones ['id_tipo_visita'] ?>"> <?php echo $opciones ['tipo_'] ?></option>
                      <?php endforeach ?>
                  </select>
                 </div>
                 <div class="form-group col-md-4">
                    <label for="sel1">Proyecto</label>
                    <select class="form-control" name="proyecto" id="sel1">
                    <option value="" > Seleccionar proyecto</option>
                      <?php 
                        //Ciclo donde se trae todos los proyectos (visibles) de la base de datos. variable $enlace heredada de conexion.php
                       foreach($enlace->query($query_proyectos) AS $opciones): ?>
                       <option value="<?php echo $opciones ['id_proyecto'] ?>"> <?php echo $opciones ['titulo_proyecto'] ?></option>
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
            Visitas encontradas:</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                      <th>#</th>
                      <th>CUIT</th>
                      <th>Tipo</th>
                      <th>Asistencia</th>
                      <th>Proyecto</th>
                      <th>  Fecha  </th>
                      <th>Fin Asistencia</th>
                      <th>Inicio</th>
                      <th>Fin</th>
                      <th>Asesores</th>
                      <th>Observacion</th>
                      <th>Finalizar</th>
                      <th>Modificar</th>
                      <th>Borrar</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>#</th>
                      <th>CUIT</th>
                      <th>Tipo</th>
                      <th>Asistencia</th>
                      <th>Proyecto</th>
                      <th>Fecha</th>
                      <th>Fin Asistencia</th>
                      <th>Inicio</th>
                      <th>Fin</th>
                      <th>Asesores</th>
                      <th>Observacion</th>
                      <th>Finalizar</th>
                      <th>Modificar</th>
                      <th>Borrar</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <?php
                    $result = mysqli_query($enlace,$query_buscar_visitas) or die($enlace->error);
                    while ($row= $result->fetch_assoc()){
                      $observacionesModal=$row['observaciones'];
                      $usuariosModal=$row['nombre'];
                      ?>
                       <tr>
                          <td><?php echo $row['id_visita'];?></td>
                          <td><?php echo $row['cuit'];?></td>
                          <td><?php echo $row['tipo_visita'];?></td>
                          <td><?php echo $row['tipo_asistencia'];?></td>
                          <td><?php echo $row['titulo_proyecto'];?></td>
                          <td><?php echo $row['fecha'];?></td>
                          <td><?php if($row['fecha_fin']!= '')
                           echo $row['fecha_fin'];
                           else
                           echo "Sin finalizar"?></td>
                          <td><?php echo $row['hora_inicio'];?></td>
                          <td><?php echo $row['hora_fin'];?></td>
                          <td><a href="javascript:void(0);" title="Ver asesores" data-toggle="modal" data-target="#modalUsuarios" onclick="carga_ajax('<?php echo $usuariosModal;?>','modalUsuarios','vendor/php/ajax/usuario_ajax.php');"><i class="material-icons">visibility</i></a></td>
                          <td><a href="javascript:void(0);" title="Ver observaciones" data-toggle="modal" data-target="#modalObservaciones" onclick="carga_ajax('<?php echo $observacionesModal;?>','modalObservaciones','vendor/php/ajax/observacion_ajax.php');"><i class="material-icons">visibility</i></a></td>
                          <td><a href="vendor/php/finalizar.php?visita= <?php echo $row['id_visita'];?>" onclick= "return confirmation()" class="delete" title="Finalizar" data-toggle="tooltip"><i class="material-icons">check_circle</i></a></td>
                          <td><a href="#" class="settings" title="Modificar" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a></td>
                          <td><a href="vendor/php/borrado_logico.php?visita= <?php echo $row['id_visita'];?>" onclick= "return confirmation()" class="delete" title="Borrar" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
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

   <!--Include modal Asesores-->
   <?php include 'vendor/php/includes/modal_asesores.php'?>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal include-->
    <?php include 'vendor/php/includes/logout.php'?>

    <!-- Scripts include-->
    <?php include 'vendor/php/includes/scripts.php'?>

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

    <!--Script Confirmacion-->
    <script type="text/javascript">
     function confirmation() 
     {
        if(confirm("Desea seguir?"))
	{
	   return true;
	}
	else
	{
	   return false;
	}
     }
    </script>

    <!--Script datetimepicker-->
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