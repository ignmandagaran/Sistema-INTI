<?php
session_start();
include 'vendor/php/querys.php';
include 'vendor/php/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<!-- Header include-->
<?php $title = "Buscar módulo"; 
      include 'vendor/php/includes/header.php' ?>

<body id="page-top">

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
            <form>
              <div class="form-row">
                <div class="form-group col-md-4 col-sm-4">
                      <label for="tema">Título</label>
                      <select class="form-control" id="select_id">
                        <option value="">Seleccione título...</option>
                        
                      </select>
                </div>
                      <div class="form-group col-md-5 col-sm-4">
                          <label for="tema">Localidad </label>
                          <select class="form-control" id="select_loc">
                            <option value="">Seleccione localidad...</option>
                            <?php 
                            //Ciclo donde se trae todas las localidades (visibles) de la base de datos. variable $enlace heredada de conexion.php
                             foreach($enlace->query($query_localidades) AS $opciones): ?>
                            <option value="<?php echo $opciones ['id_localidad'] ?>"> <?php echo $opciones ['localidad'] ?></option>
                            <?php endforeach ?>   
                          </select>
                      </div>
                          <div class="form-group date form_datetime col-md-3">
                            <label class="control-label" for="datetimepicker-default">Fecha</label>
                          <input type='text' class="form-control" id='datetimepicker1' placeholder="Ingresar fecha" />
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
                      <th>Capacitación</th>
                      <th>Título</th>
                      <th>Tema</th>
                      <th>Localidad</th>
                      <th>Fecha</th>
                      <th>Hora de Inicio</th>
                      <th>Hora de fin</th>
                      <th>Docentes</th>
                      <th>Cantidad de asistentes</th>
                      <th>Cantidad de empresas</th>
                      <th>Observaciones</th>
                      <th>Finalizar</th>
                      <th>Borrar</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>Capacitación</th>
                      <th>Título</th>
                      <th>Tema</th>
                      <th>Localidad</th>
                      <th>Fecha</th>
                      <th>Hora de Inicio</th>
                      <th>Hora de fin</th>
                      <th>Docentes</th>
                      <th>Cantidad de asistentes</th>
                      <th>Cantidad de empresas</th>
                      <th>Observaciones</th>
                      <th>Finalizar</th>
                      <th>Borrar</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                  <!--
                    //<?php 
                    //while ($row = $query_buscar_modulos): ?>
                       <tr>
                          <td><?php //echo $row['titulo_capacitacion'];?></td>
                          <td><?php //echo $row['tipo_capacitacion'];?></td>
                          <td><?php //echo $row['titulo_proyecto'];?></td>
                          <td><?php //echo $row['fecha_inicio'];?></td>
                          <td><?php //echo $row['fecha_fin'];?></td>
                          <td><?php //echo observaciones; ?></td>
                          <td>ok</td>
                          <td><i class="material-icons">&#xE5C9;</i></td>
                       </tr>
                   <?php //endwhile ?>  -->
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