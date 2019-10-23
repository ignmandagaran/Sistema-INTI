<?php 
session_start();
include 'vendor/php/querys.php';
include_once 'vendor/php/conexion.php';
include 'vendor/php/filtros_capacitaciones.php';
?>

<!DOCTYPE html>
<html lang="en">

<!-- Header include-->
<?php $title = "Buscar Capacitación"; 
      include 'vendor/php/includes/header.php' ?>

<body id="page-top">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>

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
          <li class="breadcrumb-item active">Busqueda de Capacitaciones</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-fw fa-plus-circle"></i>
            Buscar capacitación por:</div>
          <div class="card-body">
            <form action="vendor/php/filtros_capacitaciones.php" method="POST">
              <div class="form-row">
                <div class="form-group col-md-4 col-sm-4">
                      <label for="tema">Capacitación</label>
                      <select class="form-control" id="select_id" name="titulo">
                      <option value=''>Seleccionar título</option>
                        <?php 
                        //Ciclo donde se trae todos los títulos de capacitación (visibles) de la base de datos. variable $enlace heredada de conexion.php
                       foreach($enlace->query($query_titulo_capacitaciones) AS $opciones): ?>
                       <option value="<?php echo $opciones ['id_capacitacion'] ?>"> <?php echo $opciones ['titulo_capacitacion'] ?></option>
                       <?php endforeach ?>  
                      </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="selectTipo">Tipo</label>
                  <select class="form-control" name="tipo" id="selectTipo">
                    <option value="">Seleccionar tipo</option>
                      <?php 
                         //Ciclo donde se trae todos los tipos de capacitacion (visibles) de la base de datos. variable $enlace heredada de conexion.php
                         foreach($enlace->query($query_tipo_capacitacion) AS $opciones): ?>
                           <option value="<?php echo $opciones ['id_tipo_capacitacion'] ?>"> <?php echo $opciones ['tipo_capacitacion'] ?></option>
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
            Capacitaciones encontradas:</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                      <th>Titulo</th>
                      <th>Tipo</th>
                      <th>Proyecto</th>
                      <th>Fecha de inicio</th>
                      <th>Fecha de fin</th>
                      <th>Empresas</th>
                      <th>Asistentes</th>
                      <th>Observacion</th>
                      <th>Finalizar</th>
                      <th>Borrar</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                      <th>Titulo</th>
                      <th>Tipo</th>
                      <th>Proyecto</th>
                      <th>Fecha de inicio</th>
                      <th>Fecha de fin</th>
                      <th>Empresas</th>
                      <th>Asistentes</th>
                      <th>Observacion</th>
                      <th>Finalizar</th>
                      <th>Borrar</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <?php 
                    echo "$query_buscar_capacitaciones<BR>";
                    $result = mysqli_query($enlace,$query_buscar_capacitaciones) or die($enlace->error);
                    while ($row= $result->fetch_assoc()){ 
                      var_dump($row);
                      ?>
                       <tr>
                          <td><?php echo $row['titulo_capacitacion'];?></td>
                          <td><?php echo $row['tipo_capacitacion'];?></td>
                          <td><?php echo $row['titulo_proyecto'];?></td>
                          <td><?php echo $row['fecha_inicio'];?></td>
                          <td><?php echo $row['fecha_fin'];?></td>
                          <td><?php // echo $row[''];?></td>
                          <td><?php //echo $row[''];?></td>
                          <td><?php echo $row["observaciones"]; ?></td>
                          <td><a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a></td>
                          <td><a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
                       </tr>
                    <?php }?>  
                     </tr>
                  </tbody>
              </table>
              <div class="clearfix">
                <div class="hint-text">Mostrado <b>5</b> de <b>25</b> entradas</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previo</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Siguiente</a></li>
                </ul>
              </div>
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

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal include-->
    <?php include 'vendor/php/includes/logout.php'?>

    <!-- Scripts include-->
    <?php include 'vendor/php/includes/scripts.php'?>

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