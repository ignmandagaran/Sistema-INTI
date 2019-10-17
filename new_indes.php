<?php
session_start();
include 'vendor/php/querys.php';
include 'vendor/php/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<!-- Header include-->
<?php $title = "Nuevo Cliente"; 
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
          <li class="breadcrumb-item active">Nueva Produccion I+D</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-fw fa-plus-circle"></i>
            Agregar nueva Producción de I+D</div>
          <div class="card-body">
            <form>
              <div class="form-row">
                <div class="form-group col-md-7 col-3">
                        <label for="tema">Seleccionar tipo</label>
                        <select class="form-control" id="selectema">
                          <option>Selecione un tipo...</option>
                          <option>Programación y control de Producción</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                </div>
                <div class="form-group date form_datetime col-md-5">
                    <label class="control-label" for="datetimepicker-default">Fecha</label>
                    <input type='text' class="form-control" id='datetimepicker1' placeholder="Ingresar fecha" />
                </div>
            </div>
                <div class="form-row">
                <div class="form-group col-md-7 col-sm-12">
                  <label for="inputTipo">Titulo de Produccion</label>
                  <input type="text" class="form-control" id="inputCliente" placeholder="Ingresar titulo para la produccion...">
                </div>
                <div class="form-group col-md-5 col-sm-12">
                  <label for="tema">Seleccionar tema</label>
                  <select class="form-control" id="selectema">
                    <option>Selecione un tema...</option>
                    <option>Programación y control de Producción</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                  </div>
              </div>
              <div class="form-row">
                <!--<<div class="form-group date form_datetime col-md-3">
                  <label class="control-label" for="datetimepicker-default">Hora inicio</label>
	              <input type='text' class="form-control" id='datetimepicker2' placeholder="Ingresar hora de inicio" />
                </div>-->
                <!--<div class="form-group date form_datetime col-md-3">
                  <label class="control-label" for="datetimepicker-default">Hora fin</label>
	              <input type='text' class="form-control" id='datetimepicker3' placeholder="Ingresar hora de fin" />
                </div>-->
                <div class="form-group col-md-12">
                  <label for="selectAseso">Seleccionar asesores</label>
                    <select multiple class="form-control" id="selectAseso">
                      <option>Asesor 1</option>
                      <option>Asesor 2</option>
                      <option>Asesor 3</option>
                      <option>Asesor 4</option>
                      <option>Asesor 5</option>
                    </select>
                    <a><p>Para seleccionar multiples asesores debe conbinar (click+ctrl)</p></a>
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress2">Observaciones</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ingresar observaciones"></textarea>
              </div>
              <div class="form-group">
              </div>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
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
                    format:'HH:mm',
                    icons: {time:'far fa-clock'}
                    
                });
            });
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    timeZone:'UTC -3',
                    format:'HH:mm',
                    icons: {time:'far fa-clock'}
                    
                });
            });
      
      //format: 'DD/MM/YYYY'
        </script>

</body>

</html>