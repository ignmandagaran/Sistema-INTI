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
            <form method="get">
              <div class="form-row">
              <div class="form-group col-md-3">
                      <label for="tema">Cuit</label>
                      <select class="form-control" id="select_id" name="cuit">
                      <option value=''>Seleccionar cuit..</option>
                        <?php 
                        //Ciclo donde se trae todos los cuit de clientes (visibles) de la base de datos. variable $enlace heredada de conexion.php
                       foreach($enlace->query($query_cuit) AS $opciones): ?>
                       <option value="<?php echo $opciones ['id_cliente'] ?>"> <?php echo $opciones ['cuit'] ?></option>
                       <?php endforeach ?>  
                      </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="selectTipo">Tipo Visita</label>
                  <select class="form-control" name="tipo" id="selectTipo">
                    <option value="">Seleccionar tipo..</option>
                      <?php 
                         //Ciclo donde se trae todos los tipos de capacitacion (visibles) de la base de datos. variable $enlace heredada de conexion.php
                         foreach($enlace->query($query_tipo_visitas) AS $opciones): ?>
                           <option value="<?php echo $opciones ['id_tipo_visita'] ?>"> <?php echo $opciones ['tipo_visita'] ?></option>
                      <?php endforeach ?>
                  </select>
                 </div>
                 <div class="form-group col-md-3">
                  <label for="selectTipo">Tipo Asistencia</label>
                  <select class="form-control" name="tipo2" id="selectTipo">
                    <option value="">Seleccionar tipo..</option>
                      <?php 
                         //Ciclo donde se trae todos los tipos de capacitacion (visibles) de la base de datos. variable $enlace heredada de conexion.php
                         foreach($enlace->query($query_tipo_asistencias) AS $opciones): ?>
                           <option value="<?php echo $opciones ['id_tipo_asistencia'] ?>"> <?php echo $opciones ['tipo_asistencia'] ?></option>
                      <?php endforeach ?>
                  </select>
                 </div>
                 <div class="form-group col-md-3">
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
              <a href="new_visitas.php"><p>Puede ingresar visitas AQUI</p></a>
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
                      <th class="text-center">Asesores</th>
                      <th class="text-center">Observacion</th>
                      <th class="text-center">Finalizar</th>
                      <th class="text-center">Modificar</th>
                      <th class="text-center">Borrar</th>
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
                      <th class="text-center">Asesores</th>
                      <th class="text-center">Observacion</th>
                      <th class="text-center">Finalizar</th>
                      <th class="text-center">Modificar</th>
                      <th class="text-center">Borrar</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <?php
                     // FILTROS PARA BUSCAR VISITA
                     $query_aConsultar = $query_buscar_visitas;
                    
                     $cuit = $_GET["cuit"];
                     if (!empty ($cuit)){
                     $query_aConsultar.=" AND (v.id_cliente=$cuit)";
                     }
 
                     $tipo = $_GET["tipo"];
                     if (!empty ($tipov)){
                     $query_aConsultar.=" AND (v.id_tipo_visita=$tipo)";
                     }

                     $tipo2 = $_GET["tipo2"];
                     if (!empty ($tipo2)){
                     $query_aConsultar.=" AND (v.id_tipo_asistencia=$tipo2)";
                     }
 
                     $proyecto = $_GET["proyecto"];
                     if (!empty ($proyecto)){
                     $query_aConsultar.=" AND (v.id_proyecto=$proyecto)";
                     }

                    $result = mysqli_query($enlace,$query_aConsultar) or die($enlace->error);
                    while ($row= $result->fetch_assoc()){
                      $observacionesModal=$row['observaciones'];
                      $usuariosModal=$row['usuarios'];
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
                          <td class="text-center"><a href="javascript:void(0);" title="Ver asesores" data-toggle="modal" data-target="#modalUsuarios" onclick="carga_ajax('<?php echo $usuariosModal;?>','modalUsuarios','vendor/php/ajax/usuario_ajax.php');"><i class="material-icons">visibility</i></a></td>
                          <td class="text-center"><a href="javascript:void(0);" title="Ver observaciones" data-toggle="modal" data-target="#modalObservaciones" onclick="carga_ajax('<?php if($observacionesModal!=NULL){ echo $observacionesModal;}else{echo 'No hay observación.';}?>','modalObservaciones','vendor/php/ajax/observacion_ajax.php');"><i class="material-icons">visibility</i></a></td>
                          <td class="text-center"><a href="vendor/php/finalizar.php?visita= <?php echo $row['id_visita'];?>" onclick= "return confirmation()" class="delete" title="Finalizar" data-toggle="tooltip"><i class="material-icons">check_circle</i></a></td>
                          <td class="text-center"><a href="#" class="settings" title="Modificar" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a></td>
                          <td class="text-center"><a href="vendor/php/borrado_logico.php?visita= <?php echo $row['id_visita'];?>" onclick= "return confirmation()" class="delete" title="Borrar" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
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