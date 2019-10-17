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
          <li class="breadcrumb-item active">Busqueda de proyectos</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-fw fa-plus-circle"></i>
            Buscar proyecto por:</div>
          <div class="card-body">
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputIdproyecto">Titulo</label>
                  <input type="text" class="form-control" id="inputCliente" placeholder="Ingresar titulo del proyecto">
                </div>
                <div class="form-group date form_datetime col-md-6">
                  <label class="control-label" for="datetimepicker-default">Fecha de inicio</label>
	              <input type='text' class="form-control" id='datetimepicker_nuevoProyecto' placeholder="Ingresar fecha de inicio del proyecto" />
                </div>
              </div>
              <a href="finalizar_proyecto.html"><p>Puede finalizar proyectos AQUI</p></a>
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
                    <th>CUIT</th>
                    <th>Nombre</th>
                    <th>Localidad</th>
                    <th>Actividad</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>CUIT</th>
                    <th>Nombre</th>
                    <th>Localidad</th>
                    <th>Actividad</th>
                  </tr>
                </tfoot>
                <tbody>
                <!--
                 <?php
                 /*   
                  include 'vendor/php/conexion.php';

                  $sql="SELECT * FROM usuarios";
                  $result = mysqli_query($conn,$sql); 
                  
                  while ($row = $result->fetch_assoc()){
                  ?>
                 
                  <tr>
                    <td><?php echo $row['id_usuarios']?></td>
                    <td><?php echo $row['usuario']?></td>
                    <td><?php echo $row['clave']?></td>
                    <td><?php echo $row['roles_id_roles']?></td>
                  </tr>
                  <?php
                    }*/
                    ?>
                  -->
                  <tr>
                    <td>30-71031609-7</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                  </tr>
                  <tr>
                    <td>30-71031609-7</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                  </tr>
                  <tr>
                    <td>30-71031609-7</td>
                    <td>Senior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                  </tr>
                  <tr>
                    <td>30-71031609-7</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>33</td>
                  </tr>
                  <tr>
                    <td>30-71031609-7</td>
                    <td>Integration Specialist</td>
                    <td>New York</td>
                    <td>61</td>
                  </tr>
                  <tr>
                    <td>30-71031609-7</td>
                    <td>Sales Assistant</td>
                    <td>San Francisco</td>
                    <td>59</td>
                  </tr>
                  <tr>
                    <td>30-71031609-7</td>
                    <td>Integration Specialist</td>
                    <td>Tokyo</td>
                    <td>55</td>
                  </tr>
                  <tr>
                    <td>30-71031609-7</td>
                    <td>Javascript Developer</td>
                    <td>San Francisco</td>
                    <td>39</td>
                  </tr>
                  <tr>
                    <td>30-71031609-7</td>
                    <td>Software Engineer</td>
                    <td>Edinburgh</td>
                    <td>23</td>
                  </tr>
                  <tr>
                    <td>30-71031609-7</td>
                    <td>Office Manager</td>
                    <td>London</td>
                    <td>30</td>
                  </tr>
                  <tr>
                    <td>30-71031609-7</td>
                    <td>Support Lead</td>
                    <td>Edinburgh</td>
                    <td>22</td>
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

</body>

</html>