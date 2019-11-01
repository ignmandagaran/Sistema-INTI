<?php
session_start();
include 'vendor/php/querys.php';
include 'vendor/php/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<!-- Header include-->
<?php $title = "Buscar Cliente"; 
      include 'vendor/php/includes/header.php' ?>

<body id="page-top">

<!--Fuente Iconos-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    

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
          <li class="breadcrumb-item active">Busqueda de Clientes</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-fw fa-plus-circle"></i>
            Buscar clientes por:</div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="form-row">
              <div class="form-group col-md-4 col-sm-4">
                      <label for="tema">Cuit</label>
                      <select class="form-control" id="select_id" name="cuit">
                      <option value=''>Seleccionar cuit..</option>
                        <?php 
                        //Ciclo donde se trae todos los cuit de clientes (visibles) de la base de datos. variable $enlace heredada de conexion.php
                       foreach($enlace->query($query_cuit) AS $opciones): ?>
                       <option value="<?php echo $opciones ['id_cliente'] ?>"> <?php echo $opciones ['cuit'] ?></option>
                       <?php endforeach ?>  
                      </select>
                </div>
                <div class="form-group col-md-4 col-sm-4">
                      <label for="tema">Nombre</label>
                      <select class="form-control" id="select_id" name="nombre">
                      <option value=''>Seleccionar nombre..</option>
                        <?php 
                        //Ciclo donde se trae todos los nombres de clientes (visibles) de la base de datos. variable $enlace heredada de conexion.php
                       foreach($enlace->query($query_nombres) AS $opciones): ?>
                       <option value="<?php echo $opciones ['id_cliente'] ?>"> <?php echo $opciones ['nombre'] ?></option>
                       <?php endforeach ?>  
                      </select>
                </div>
                <div class="form-group col-md-4 col-sm-4">
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
              <a href="new_cliente.html"><p>Puede agregar un cliente AQUI</p></a>
              <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
          </div>
        </div>
        
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Clientes encontrados:</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>CUIT</th>
                    <th>Nombre</th>
                    <th>Localidad</th>
                    <th>Rubro</th>
                    <th>Actividad</th>
                    <th>Modificar</th>
                    <th>Borrar</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>CUIT</th>
                    <th>Nombre</th>
                    <th>Localidad</th>
                    <th>Rubro</th>
                    <th>Actividad</th>
                    <th>Modificar</th>
                    <th>Borrar</th>
                  </tr>
                </tfoot>
                <tbody>
                <tr>
                <?php
                    $result = mysqli_query($enlace,$query_buscar_clientes) or die($enlace->error);
                    while ($row= $result->fetch_assoc()){ 
                      ?>
                       <tr>
                          <td><?php echo $row['id_cliente'];?></td>
                          <td><?php echo $row['cuit'];?></td>
                          <td><?php echo $row['nombre'];?></td>
                          <td><?php echo $row['localidad'];?></td>
                          <td><?php echo $row['rubro'];?></td>
                          <td><?php echo $row['actividad_principal'];?></td>
                          <td><a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a></td>
                          <td><a href="vendor/php/borrado_logico.php?cliente= <?php echo $row['id_cliente'];?>" onclick= "return confirmation()" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
                       </tr>
                    <?php }?>  
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

    <!--Script Confirmacion-->
    <script type="text/javascript">
     function confirmation() 
     {
        if(confirm("Desea seguir?"))
	{
	   return true;
	}
	else
	{
	   return false;
	}
     }
    </script>

</body>

</html>