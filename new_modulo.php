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
          <li class="breadcrumb-item active">Nuevo Módulo</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-fw fa-plus-circle"></i>
            Agregar nuevo módulo</div>
          <div class="card-body">
            <form action="vendor/php/add_modulo.php" method="POST">
              <div class="form-row">
                  <div class="form-group col-md-4 col-sm-4">
                      <label for="tema">Capacitación</label>
                      <select class="form-control" id="select_id" name="capacitacion" required>
                        <option value=''>Seleccione título...</option>
                        <?php 
                        //Ciclo donde se trae todos los títulos de capacitación (visibles) de la base de datos. variable $enlace heredada de conexion.php
                       foreach($enlace->query($query_titulo_capacitaciones) AS $opciones): ?>
                       <option value="<?php echo $opciones ['id_capacitacion'] ?>"> <?php echo $opciones ['titulo_capacitacion'] ?></option>
                       <?php endforeach ?>  
                      </select>
                      </div>
                <div class="form-group col-md-8 col-sm-12">
                  <label for="inputTitulo">Titulo del Modulo</label>
                  <input type="text" require class="form-control" id="inputTitulo" name="titulo" placeholder="Ingrese título..." required>
                </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-6 col-sm-4">
                      <label for="tema">Tema</label>
                      <select class="form-control" id="selectTema" name="tema">
                        <option value="">Seleccione tema...</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                      </div>
                      <div class="form-group col-md-6 col-sm-4">
                          <label for="tema">Localidad </label>
                          <select class="form-control" id="select_loc" name="localidad" required>
                            <option value="">Seleccione localidad...</option>
                            <?php 
                            //Ciclo donde se trae todas las localidades (visibles) de la base de datos. variable $enlace heredada de conexion.php
                             foreach($enlace->query($query_localidades) AS $opciones): ?>
                            <option value="<?php echo $opciones ['id_localidad'] ?>"> <?php echo $opciones ['localidad'] ?></option>
                            <?php endforeach ?>   
                          </select>
                          </div>
              </div>
              <div class="form-row">
                  <div class="form-group date form_datetime col-md-4">
                      <label class="control-label" for="datetimepicker-default">Fecha</label>
                    <input type='text' class="form-control" id='datetimepicker1' name="fecha" placeholder="Ingresar fecha..." required />
                    </div>
                <div class="form-group date form_datetime col-md-4">
                  <label class="control-label" for="datetimepicker-default">Hora inicio</label>
	              <input type='text' class="form-control" id='datetimepicker2' name="hora1" placeholder="Ingresar hora de inicio..." required />
                </div>
                <div class="form-group date form_datetime col-md-4">
                  <label class="control-label" for="datetimepicker-default">Hora fin</label>
	              <input type='text' class="form-control" id='datetimepicker3' name="hora2" placeholder="Ingresar hora de fin..." required />
                </div>
              </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="docentes">Docentes</label>
                    <select multiple class="form-control" id="selectdoc" name="docentes">
                      <option value="">Seleccionar docentes...</option>
                      <?php 
                            //Ciclo donde se trae todas las localidades (visibles) de la base de datos. variable $enlace heredada de conexion.php
                             foreach($enlace->query($query_usuarios) AS $opciones): ?>
                            <option value="<?php echo $opciones ['id_usuario'] ?>"> <?php echo $opciones ['nombre'] ?></option>
                            <?php endforeach ?>   
                    </select>
                    <a><p>Para seleccionar multiples docentes debe conbinar (click+ctrl)</p></a>
                </div>
                  <div class="form-group col-md-4">
                    <label for="inputTitulo">Cantidad de asistentes</label>
                    <input type="number" class="form-control" name="asistentes" placeholder="ingrese cantidad..." required>
                  </div> 
                  <div class="form-group col-md-4">
                    <label>Cantidad de empresas</label>
                    <input type="number" class="form-control" name="empresas" placeholder="ingrese cantidad..." required>
                  </div>
              </div>              
              <div class="form-group">
                <label for="inputobser">Observaciones</label>
                <textarea class="form-control" id="observaciones" name="observaciones" rows="3" placeholder="Ingresar observaciones..." required></textarea>
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