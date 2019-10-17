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
              <form>
                <div class="form-row">
                  <div class="form-group col-md-1 col-sm-3">
                    <label for="inputCuit">CUIT</label>
                    <input type="number" class="form-control" id="inputEmail4" placeholder="" min="1" max="99" maxlength="2">
                  </div>
                  <div class="form-group col-md-4 col-sm-6">
                    <label for="inputCuit" >&nbsp;</label>
                    <input type="number" class="form-control" id="inputEmail4" placeholder="" min="1" max="99999999">
                  </div>
                  <div class="form-group col-md-1 col-sm-3">
                    <label for="inputCuit">&nbsp;</label>
                    <input type="number" class="form-control" id="inputEmail4" placeholder="" min="1" max="9">
                  </div>
                  <div class="form-group col-md-6 col-sm-12">
                    <label for="inputPassword4">Nombre del cliente</label>
                    <input type="text" class="form-control" id="inputCliente" placeholder="Ingresar nombre del cliente">
                  </div>
                </div>
                <div class="form-row">

                  <!-- Aca empieza: AJAX Select combinado provincia->localidad-->

                  <div class="form-group col-sm-4">
                    <label for="inputAddress">Provincia</label>
                    <select class="form-control" id="provincia-select">
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
                    <select class="form-control" id="localidad-select">
                    </select>
                  </div>

                  <!-- Aca termina: AJAX Select combinado provincia->localidad-->

                  <div class="form-group col-sm-4">
                    <label for="exampleFormControlSelect2">Rubro</label>
                    <select class="form-control" id="">
                      <option>1</option>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="exampleFormControlTextarea1">Describir actividad principal:</label>
                        <textarea class="form-control" id="" rows="3" maxlength="200"></textarea>
                    </div>
                </div>
                <a href="buscar_cliente.html"><p>Puede ver los clientes AQUI</p></a>
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