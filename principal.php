<?php
//Reanudamos la sesión
session_start();

//Cargamos las consultas y la conexion
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
}
?>

<!DOCTYPE html>
<html lang="es">

<!-- Header include-->
<?php $title = "Pantalla Principal"; 
      include 'vendor/php/includes/header.php' ?>

<body id="page-top">

  <!-- Navbar include -->
  <?php include 'vendor/php/includes/navbar.php' ?>

  <div id="wrapper">

    <!-- Sidebar include -->
    <?php include 'vendor/php/includes/sidebar.php' ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Tablero</a>
          </li>
          <li class="breadcrumb-item active">Inicio</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-4 col-sm-8 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-eye"></i>
                </div>
                <div class="mr-5">CLIENTES</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="new_cliente.php">
                <span class="float-left">Nuevos</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                <a class="card-footer text-white clearfix small z-1" href="buscar_cliente.php">
                <span class="float-left">Buscar</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-8 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-lightbulb"></i>
                </div>
                <div class="mr-5">VISITAS</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="new_visita.php">
                <span class="float-left">Nuevos</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                <a class="card-footer text-white clearfix small z-1" href="buscar_visita.php">
                <span class="float-left">Buscar</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-8 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-hands-helping"></i>
                </div>
                <div class="mr-5">PROYECTOS</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="new_proyecto.php">
                <span class="float-left">Nuevo</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                <a class="card-footer text-white clearfix small z-1" href="buscar_proyecto.php">
                <span class="float-left">Buscar</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        

        <div class="col-xl-4 col-sm-8 mb-3">
            <div class="card text-white badge-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-project-diagram"></i>
                </div>
                <div class="mr-5">CAPACITACIONES</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="new_capacitacion.php">
                <span class="float-left">Nuevo</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                <a class="card-footer text-white clearfix small z-1" href="buscar_capacitacion.php">
                <span class="float-left">Buscar</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-8 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-chalkboard-teacher"></i>
                </div>
                <div class="mr-5">MODULOS</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="new_modulo.php">
                <span class="float-left">Nuevo</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                <a class="card-footer text-white clearfix small z-1" href="buscar_modulo.php">
                <span class="float-left">Buscar</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-8 mb-3">
            <div class="card text-white bg-dark o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-user-circle"></i>
                </div>
                <div class="mr-5">INVESTIGACION Y DESARROLLO</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="new_indes.php">
                <span class="float-left">Nuevo</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                <a class="card-footer text-white clearfix small z-1" href="buscar_indes.php">
                <span class="float-left">Buscar</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
          

        <!-- Area Chart Example
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Area Chart Example</div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

         DataTables Example 
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                  </tr>
                  <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td>$170,750</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>-->
      
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
    
  </body>
</html>
