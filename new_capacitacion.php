<?php
session_start();
include 'vendor/php/querys.php';
include 'vendor/php/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<!-- Header include-->
<?php $title = "Nueva Capacitacion"; 
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
          <li class="breadcrumb-item active">Nuevo Modulo de Capacitación</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-fw fa-plus-circle"></i>
            Agregar nueva capacitación</div>
          <div class="card-body">
            <form>
              <div class="form-row">
                  <div class="form-group col-md-4 col-sm-4">
                      <label for="tema">Id Capacitación</label>
                      <select class="form-control" id="select_id">
                        <option>Seleccione un id...</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                      </div>
                <!--<div class="form-group col-md-2 col-6">
                  <label for="inputCuit" >&nbsp;</label>
                  <input type="number" class="form-control" id="inputEmail4" placeholder="" min="1" max="99999999">
                </div>-->
                <!--<div class="form-group col-md-1 col-3">
                  <label for="inputCuit">&nbsp;</label>
                  <input type="number" class="form-control" id="inputEmail4" placeholder="" min="1" max="9">
                </div>-->
                
                <div class="form-group col-md-8 col-sm-12">
                  <label for="inputTitulo">Titulo del Modulo</label>
                  <input type="text" class="form-control" id="inputTitulo" placeholder="Ingrese un titulo al modulo de capacitaci�n...">
                </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-6 col-sm-4">
                      <label for="tema">Tema</label>
                      <select class="form-control" id="selectTema">
                        <option>Seleccione un tema...</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                      </div>
                      <div class="form-group col-md-6 col-sm-4">
                          <label for="tema">Localidad </label>
                          <select class="form-control" id="select_loc">
                            <option>Seleccione una localidad...</option>
                            <option>25 de Mayo</option>
                            <option>Balcarce</option>
                            <option>4</option>
                            <option>5</option>
                          </select>
                          </div>
              </div>
              <div class="form-row">
                  <div class="form-group date form_datetime col-md-4">
                      <label class="control-label" for="datetimepicker-default">Fecha</label>
                    <input type='text' class="form-control" id='datetimepicker1' placeholder="Ingresar fecha" />
                    </div>
                <div class="form-group date form_datetime col-md-4">
                  <label class="control-label" for="datetimepicker-default">Hora inicio</label>
	              <input type='text' class="form-control" id='datetimepicker2' placeholder="Ingresar hora de inicio" />
                </div>
                <div class="form-group date form_datetime col-md-4">
                  <label class="control-label" for="datetimepicker-default">Hora fin</label>
	              <input type='text' class="form-control" id='datetimepicker3' placeholder="Ingresar hora de fin" />
                </div>
              </div>
                <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="docentes">Seleccionar Docentes</label>
                    <select multiple class="form-control" id="selectdoc">
                      <option>Docente 1</option>
                      <option>Docente 2</option>
                      <option>Docente 3</option>
                      <option>Docente 4</option>
                      <option>Docente 5</option>
                    </select>
                    <a><p>Para seleccionar multiples docentes debe conbinar (click+ctrl)</p></a>
                </div>
              </div>
              <div class="form-group">
                <label for="inputobser">Observaciones</label>
                <textarea class="form-control" id="observaciones" rows="3" placeholder="Ingresar observaciones"></textarea>
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