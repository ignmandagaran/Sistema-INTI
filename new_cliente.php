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

          <!-- Cabecera-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Panel de control</a>
            </li>
            <li class="breadcrumb-item active">Nuevos Clientes</li>
          </ol>

          <!-- Formulario -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-fw fa-plus-circle"></i>
              Agregar nuevo cliente</div>
            <div class="card-body">
              <form action="vendor/php/add_clientes.php" method="POST">
                <div class="form-row">
                  <div class="form-group col-md-1 col-sm-3">
                    <label for="inputCuit">CUIT</label>
                    <input type="number" class="form-control" id="inputEmail4" placeholder="" name="cuit1" min="1" max="99" minlength="2" maxlength="2" required>
                  </div>
                  <div class="form-group col-md-4 col-sm-6">
                    <label for="inputCuit" >&nbsp;</label>
                    <input type="number" class="form-control" id="inputEmail4" placeholder="" name="cuit2" min="1" max="99999999" minlength="8" maxlength="8" required>
                  </div>
                  <div class="form-group col-md-1 col-sm-3">
                    <label for="inputCuit">&nbsp;</label>
                    <input type="number" class="form-control" id="inputEmail4" placeholder="" name="cuit3" min="1" max="9" minlength="1" maxlength="1" required>
                  </div>
                  <div class="form-group col-md-6 col-sm-12">
                    <label for="inputPassword4">Nombre del cliente</label>
                    <input type="text" class="form-control" id="inputCliente" name="nombre" placeholder="Ingresar nombre del cliente" required>
                  </div>
                </div>
                <div class="form-row">

                  <!-- Aca empieza: AJAX Select combinado provincia->localidad-->

                  <div class="form-group col-sm-4">
                    <label for="inputAddress">Provincia</label>
                    <select class="form-control" id="provincia-select" required>
                      <option disabled selected>Seleccione la provincia...</option>
                      <?php 

                      //Ciclo donde se trae todas las provincias de la base de datos. variable $enlace heredada de conexion.php
                      foreach ($enlace->query($query_provincias) as $row){
                        echo '<option value="'.$row[id_provincia].'">'. utf8_encode($row[provincia]).'</option>';

                      }
                      ?>
                      </select>
                  </div>
                  <div class="form-group col-sm-4">
                    <label for="inputAddress">Localidad</label>
                    <select class="form-control" id="localidad-select" name="localidad" required>
                    </select>
                  </div>

                  <!-- Aca termina: AJAX Select combinado provincia->localidad-->

                  <div class="form-group col-sm-4">
                    <label for="exampleFormControlSelect2">Rubro</label>
                    <select class="form-control" id="" name="rubro">
                      <option>1</option>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="exampleFormControlTextarea1">Describir actividad principal:</label>
                        <textarea class="form-control" id="" rows="3" maxlength="200" name="descripcion"></textarea>
                    </div>
                </div>
                <div class="form-group">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card mb-3 -->
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