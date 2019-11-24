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
<?php $title = "Nueva Visita"; 
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
          <li class="breadcrumb-item active">Nuevas Visitas</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-fw fa-plus-circle"></i>
            Agregar nueva visita</div>
          <div class="card-body">
            <form action="vendor/php/add_visita.php" method="POST">
              <div class="form-row">
                <div class="form-group col-md-3 col-sm-3">
                    <label for="tema">Cuit</label>
                    <select class="form-control" id="select_id" name="cuit" required>
                    <option value=''>Seleccionar cuit..</option>
                      <?php 
                      //Ciclo donde se trae todos los cuit de clientes (visibles) de la base de datos. variable $enlace heredada de conexion.php
                      foreach($enlace->query($query_cuit) AS $opciones): ?>
                      <option value="<?php echo $opciones ['id_cliente'] ?>"> <?php echo $opciones ['cuit'] ?></option>
                      <?php endforeach ?>  
                    </select>
                  </div>
                  <div class="form-group col-md-3 col-sm-3">
                    <label for="tema">Tipo Visita</label>
                    <select class="form-control" id="select_id" name="tipo" required>
                    <option value=''>Seleccionar tipo..</option>
                      <?php 
                      //Ciclo donde se trae todos los tipos de visita (visibles) de la base de datos. variable $enlace heredada de conexion.php
                      foreach($enlace->query($query_tipo_visitas) AS $opciones): ?>
                      <option value="<?php echo $opciones ['id_tipo_visita'] ?>"> <?php echo $opciones ['tipo_visita'] ?></option>
                      <?php endforeach ?>  
                    </select>   
                </div>
                <div class="form-group col-md-3 col-sm-3">
                    <label for="tema">Tipo Asistencia</label>
                    <select class="form-control" id="select_id" name="tipo2" required>
                    <option value=''>Seleccionar tipo..</option>
                      <?php 
                      //Ciclo donde se trae todos los tipos de visita (visibles) de la base de datos. variable $enlace heredada de conexion.php
                      foreach($enlace->query($query_tipo_asistencias) AS $opciones): ?>
                      <option value="<?php echo $opciones ['id_tipo_asistencia'] ?>"> <?php echo $opciones ['tipo_asistencia'] ?></option>
                      <?php endforeach ?>  
                    </select>   
                </div>
                <div class="form-group col-md-3 col-sm-3">
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
                <div class="form-group date form_datetime col-md-4">
                  <label class="control-label" for="datetimepicker-default">Fecha</label>
	              <input type='text' class="form-control" id='datetimepicker1' name="fecha" placeholder="Ingresar fecha" required/>
                </div>
                <div class="form-group date form_datetime col-md-4">
                  <label class="control-label" for="datetimepicker-default">Hora inicio</label>
	              <input type='text' class="form-control" id='datetimepicker2' name="inicio" placeholder="Ingresar hora de inicio" required/>
                </div>
                <div class="form-group date form_datetime col-md-4">
                  <label class="control-label" for="datetimepicker-default">Hora fin</label>
	              <input type='text' class="form-control" id='datetimepicker3' name="fin" placeholder="Ingresar hora de fin" required/>
                </div>
                </div>
                <div class="form-group col-md-12">
                  <label for="selectAseso">Asesores</label>
                    <select multiple class="form-control" id="selectdoc" name="asesor[]" required>
                      <option value="">Seleccionar asesores...</option>
                      <?php 
                            //Ciclo donde se trae todas los usuarios (visibles) de la base de datos. variable $enlace heredada de conexion.php
                             foreach($enlace->query($query_usuarios) AS $opciones): ?>
                            <option value="<?php echo $opciones ['usuario'] ?>"> <?php echo $opciones ['usuario'] ?></option>
                            <?php endforeach ?>   
                    </select>
                    <a><p>Para seleccionar multiples asesores debe conbinar (click+ctrl)</p></a>
                </div>
                <div class="form-group">
                  <label for="inputAddress2">Observaciones</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="observaciones" rows="3" placeholder="Ingresar observaciones"></textarea>
                </div>
                <div class="form-group">
                <a href="buscar_visitas.php"><p>Puede ver visitas AQUI</p></a>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
              </div>
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