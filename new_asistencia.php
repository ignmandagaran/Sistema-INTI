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
<?php $title = "Nueva Asistencia"; 
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
          <li class="breadcrumb-item active">Nuevas Asistencias</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-fw fa-plus-circle"></i>
            Agregar nueva asistencia</div>
          <div class="card-body">
            <form>
              <div class="form-row">
                <div class="form-group col-md-1 col-3">
                  <label for="inputCuit">CUIT</label>
                  <input type="number" class="form-control" id="inputEmail4" placeholder="" min="1" max="99" maxlength="2">
                </div>
                <div class="form-group col-md-2 col-6">
                  <label for="inputCuit" >&nbsp;</label>
                  <input type="number" class="form-control" id="inputEmail4" placeholder="" min="1" max="99999999">
                </div>
                <div class="form-group col-md-1 col-3">
                  <label for="inputCuit">&nbsp;</label>
                  <input type="number" class="form-control" id="inputEmail4" placeholder="" min="1" max="9">
                </div>
                <div class="form-group col-md-2 col-sm-12">
                  <label for="inputTipo">Tipo</label>
                  <input type="text" class="form-control" id="inputCliente" placeholder="Ingresar tipo...">
                </div>
                <div class="form-group col-md-3 col-sm-12">
                  <label for="inputIdproyecto">ID_Proyecto</label>
                  <input type="text" class="form-control" id="inputCliente" placeholder="Ingresar si esta vinculado a un proyecto...">
                </div>
                <div class="form-group date form_datetime col-md-3">
                  <label class="control-label" for="datetimepicker-default">Fecha</label>
	              <input type='text' class="form-control" id='datetimepicker1' placeholder="Ingresar fecha..." />
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress2">Observaciones</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ingresar observaciones"></textarea>
              </div>
              <div class="form-group">
              </div>
              <a href="buscar_asistencia.html"><p>Puede ver las asistencias AQUI</p></a>
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
      
      //format: 'DD/MM/YYYY'
        </script>

</body>

</html>