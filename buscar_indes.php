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
              
              <!-- Tabla de resultados -->
        <div class="card mb-12">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Producciones I+D:</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Fecha</th>
                        <th>Produccion</th>
                        <th>Tema</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Tipo</th>
                      <th>Fecha</th>
                      <th>Produccion</th>
                      <th>Tema</th>
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
              <div class="form-group">
              </div>
              <button type="submit" class="btn btn-primary">Buscar</button>
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