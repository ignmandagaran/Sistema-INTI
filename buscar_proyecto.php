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
<?php $title = "Buscar Proyecto"; 
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
          <li class="breadcrumb-item active">Busqueda de proyectos</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-fw fa-plus-circle"></i>
            Buscar proyecto por:</div>
          <div class="card-body">
            <form method="get">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="sel1">Título</label>
                    <select class="form-control" name="proyecto" id="sel1">
                    <option value="" > Seleccionar proyecto..</option>
                      <?php 
                        //Ciclo donde se trae todos los proyectos (visibles) de la base de datos. variable $enlace heredada de conexion.php
                       foreach($enlace->query($query_proyectos) AS $opciones): ?>
                       <option value="<?php echo $opciones ['id_proyecto'] ?>"> <?php echo $opciones ['titulo_proyecto'] ?></option>
                       <?php endforeach ?>                
                    </select>
                </div>
                    <div class="form-group col-md-6">
                  <label for="inputIdproyecto">Tipo</label>
                  <select class="form-control" id="selecttipo" name="tipo">
                  <option value="" > Seleccionar tipo..</option>
                      <?php 
                         //Ciclo donde se trae todos los tipos de proyecto (visibles) de la base de datos. variable $enlace heredada de conexion.php
                         foreach($enlace->query($query_tipo_proyectos) AS $opciones): ?>
                           <option value="<?php echo $opciones ['id_tipo_proyecto'] ?>"> <?php echo $opciones ['tipo_proyecto'] ?></option>
                      <?php endforeach ?>
                  </select>
                </div>
              </div>
              <a href="new_proyecto.php"><p>Puede ver los proyectos AQUI</p></a>
              <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
          </div>
        </div>
        
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Asistencias encontradas:</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Tipo</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th class="text-center">Observaciones</th>
                    <th class="text-center">Finalizar</th>
                    <th class="text-center">Modificar</th>
                    <th class="text-center">Borrar</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>#</th>
                    <th>Titulo</th>
                    <th>Tipo</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th class="text-center">Observaciones</th>
                    <th class="text-center">Finalizar</th>
                    <th class="text-center">Modificar</th>
                    <th class="text-center">Borrar</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                  <?php
                  // FILTROS PARA BUSCAR POR PROYECTO Y TITULO
                  $query_aConsultar = $query_buscar_proyectos;

                  $proyecto = $_GET["proyecto"];
                  if (!empty ($proyecto)){
                  $query_aConsultar.=" AND (id_proyecto=$proyecto)";
                  }

                  $tipo = $_GET["tipo"];
                  if (!empty ($tipo)){
                  $query_aConsultar.=" AND (tp.id_tipo_proyecto=$tipo)";
                  }

                    $result = mysqli_query($enlace,$query_aConsultar) or die($enlace->error);
                    while ($row= $result->fetch_assoc()){ 
                      $observacionesModal=$row['observaciones'];?>
                       <tr>
                          <td><?php echo $row['id_proyecto'];?></td>
                          <td><?php echo $row['titulo_proyecto'];?></td>
                          <td><?php echo $row['tipo_proyecto'];?></td>
                          <td><?php echo $row['fecha_inicio'];?></td>
                          <td><?php if($row['fecha_fin']!= '')
                                      echo $row['fecha_fin'];
                                    else
                                      echo "Sin finalizar"?></td>
                          <td class="text-center"><a href="javascript:void(0);" title="Ver Observaciones" data-toggle="modal" data-target="#modalObservaciones" onclick="carga_ajax('<?php if($observacionesModal!=NULL){ echo $observacionesModal;}else{echo 'No hay observación.';};?>','modalObservaciones','vendor/php/ajax/observacion_ajax.php');"><i class="material-icons">visibility</i></a></td>
                          <td class="text-center"><a href="vendor/php/finalizar.php?proyecto= <?php echo $row['id_proyecto'];?>" onclick= "return confirmation()" class="delete" title="Finalizar" data-toggle="tooltip"><i class="material-icons">check_circle</i></<i></a></td>
                          <td class="text-center"><a href="#" class="settings" title="Modificar" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a></td>
                          <td class="text-center"><a href="vendor/php/borrado_logico.php?proyecto= <?php echo $row['id_proyecto'];?>" onclick= "return confirmation()" class="delete" title="Borrar" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
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

</body>

</html>