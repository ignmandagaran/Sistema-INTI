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
<?php $title = "Nuevo Proyecto"; 
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
          <li class="breadcrumb-item active">Nuevo Proyecto</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-fw fa-plus-circle"></i>
            Agregar nuevo proyecto</div>
          <div class="card-body">
            <form action="vendor/php/add_proyecto.php" method="POST">
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputIdproyecto">Titulo</label>
                  <input type="text" class="form-control" id="inputCliente" name="titulo" placeholder="Ingresar título.." required>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputIdproyecto">Titulo</label>
                  <select class="form-control" id="selecttipo" name="tipo" required>
                  <option value="" > Seleccionar tipo..</option>
                      <?php 
                         //Ciclo donde se trae todos los tipos de proyecto (visibles) de la base de datos. variable $enlace heredada de conexion.php
                         foreach($enlace->query($query_tipo_proyectos) AS $opciones): ?>
                           <option value="<?php echo $opciones ['id_tipo_proyecto'] ?>"> <?php echo $opciones ['tipo_proyecto'] ?></option>
                      <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group date form_datetime col-md-4">
                  <label class="control-label" for="datetimepicker-default">Fecha de inicio</label>
	              <input type='text' class="form-control" id='datetimepicker1' name="fecha" placeholder="Ingresar fecha.."  required/>
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress2">Observaciones</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="observaciones" rows="3" placeholder="Ingresar observaciones"></textarea>
              </div>
              <div class="form-group">
              </div>
              <a href="buscar_proyecto.html"><p>Puede ver los proyectos AQUI</p></a>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Footer include -->            
        <?php include 'vendor/php/includes/footer.php'?>

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