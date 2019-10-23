<?php 
session_start();
include 'vendor/php/querys.php';
include 'vendor/php/conexion.php';
    
?>

<!DOCTYPE html>
<html lang="en">

<!-- Header include-->
<?php $title = "Nueva Capacitación"; 
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
          <li class="breadcrumb-item active">Nueva Capacitación</li>
        </ol>
       
        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-fw fa-plus-circle"></i>
            Agregar nueva capacitación</div>
          <div class="card-body">
            <form onsubmit="setTimeout('document.forms[0].reset()', 2000)" action="vendor/php/add_capacitacion.php" method="POST"> 
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputTitulo">Titulo</label>
                  <input type="text" class="form-control" id="inputTitulo" name="titulo" placeholder="Ingresar titulo de la capacitación" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="selectTipo">Tipo</label>
                  <select class="form-control" name="tipo" id="selectTipo" required>
                    <option value="" > Seleccionar tipo </option>
                      <?php 
                         //Ciclo donde se trae todos los tipos de capacitacion (visibles) de la base de datos. variable $enlace heredada de conexion.php
                         foreach($enlace->query($query_tipo_capacitacion) AS $opciones): ?>
                           <option value="<?php echo $opciones ['id_tipo_capacitacion'] ?>"> <?php echo $opciones ['tipo_capacitacion'] ?></option>
                      <?php endforeach ?>
                  </select>
                 </div>
              </div>
              <div class="form-row">
              <div class="form-group col-md-6">
                    <label for="sel1">Selecciona proyecto:</label>
                    <select class="form-control" name="proyecto" id="sel1" required>
                    <option value="" > Seleccionar proyecto </option>
                      <?php 
                        //Ciclo donde se trae todos los proyectos (visibles) de la base de datos. variable $enlace heredada de conexion.php
                       foreach($enlace->query($query_proyectos) AS $opciones): ?>
                       <option value="<?php echo $opciones ['id_proyecto'] ?>"> <?php echo $opciones ['titulo_proyecto'] ?></option>
                       <?php endforeach ?>                
                    </select>
                </div> 
                  <div class="form-group date form_datetime col-md-6">
                      <label class="control-label" for="datetimepicker-default">Fecha Inicio</label>
                      <input type='text' class="form-control" id='datetimepicker1'  name="fecha" placeholder="Ingresar fecha..." required />
                    </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="inputAddress2">Observaciones</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1"  name="observaciones" rows="3" placeholder="Ingresar observaciones" required></textarea>
                </div>
              </div>
              <a href="buscar_capacitacion.php"><p>Puede ver las capacitaciones AQUI</p></a>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

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




