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
            <form action="add.php" method="POST"> 
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputTitulo">Titulo</label>
                  <input type="text" class="form-control" id="inputTitulo" name="titulo" placeholder="Ingresar titulo de la capacitación">
                </div>
                <div class="form-group col-md-6">
                  <label for="selectTipo">Tipo</label>
                  <select class="form-control" id="selectTipo" name="tipo">
                  <?php 
                //Ciclo donde se trae todos los tipos de capacitacion (visibles) de la base de datos. variable $enlace heredada de conexion.php
               foreach ($enlace->query($query_tipo_capacitacion) as $row){
                return '<option value="'.$row[id_tipo_capacitacion].'">'. ($row[tipo_capacitacion]).'</option>';
                }
                ?>
                  </select>
                </div>
              </div>
              <div class="form-row">
              <div class="form-group col-md-6">
                    <label for="sel1">Selecciona proyecto:</label>
                    <select class="form-control" id="sel1" name="proyecto">
                   
               <?php 
                //Ciclo donde se trae todos los proyectos (visibles) de la base de datos. variable $enlace heredada de conexion.php
               foreach ($enlace->query($query_proyectos) as $row){
                return '<option value="'.$row[id_proyecto].'">'. ($row[titulo_proyecto]).'</option>';
                }
                ?>
                    </select>
                </div> 
                  <div class="form-group date form_datetime col-md-6">
                      <label class="control-label" for="datetimepicker-default">Fecha Inicio</label>
                      <input type='text' class="form-control" id='datetimepicker1' name="fecha" placeholder="Ingresar fecha..." />
                    </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="inputAddress2">Observaciones</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="observaciones" rows="3" placeholder="Ingresar observaciones"></textarea>
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  <!-- Popper JS -->
  <script src="vendor/datatimepicker/popper.min.js"></script>

  <!-- Datepicker moment with locales -->
  <script src="vendor/datatimepicker/moment.min.js" type="text/javascript"></script>

  <script src="vendor/datatimepicker/bootstrap-datetimepicker.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>-->

  <!-- Custom scripts for all pages-->
     <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  
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




