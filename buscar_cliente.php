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
            <form method="get">
              <div class="form-row">
              <div class="form-group col-md-4 col-sm-4">
                      <label for="tema">CUIT</label>
                      <select class="form-control" id="select_cuit" name="cuit">
                      <option value=''>Seleccionar cuit...</option>
                        <?php 
                        //Ciclo donde se trae todos los cuit de clientes (visibles) de la base de datos. variable $enlace heredada de conexion.php
                       foreach($enlace->query($query_clientes) AS $row): ?>
                       <option value="<?php echo $row ['id_cliente'] ?>"> <?php echo $row ['cuit'] ?></option>
                       <?php endforeach ?>  
                      </select>
                </div>
                <div class="form-group col-md-4 col-sm-4">
                      <label for="tema">Nombre</label>
                      <select class="form-control" id="select_nombre" name="nombre">
                      <option value=''>Seleccionar nombre...</option>
                        <?php 
                        //Ciclo donde se trae todos los nombres de clientes (visibles) de la base de datos. variable $enlace heredada de conexion.php
                        foreach($enlace->query($query_clientes) AS $row): ?>
                        <option value="<?php echo $row ['id_cliente'] ?>"> <?php echo $row ['nombre'] ?></option>
                        <?php endforeach ?>  
                      </select>
                </div>
                <div class="form-group col-md-4 col-sm-4">
                          <label for="tema">Localidad </label>
                          <select class="form-control" id="select_localidad" name="localidad">
                            <option value="">Seleccionar localidad...</option>
                            <?php 
                            //Ciclo donde se trae todas las localidades (visibles) de la base de datos. variable $enlace heredada de conexion.php
                             foreach($enlace->query($query_localidadesClientes) AS $opciones): ?>
                            <option value="<?php echo $opciones ['id_localidad'] ?>"> <?php echo $opciones ['localidad'] ?></option>
                            <?php endforeach ?>   
                          </select>
                          </div>
              </div>
              <div class="form-row">
              <div class="form-group col-md-6 col-sm-6">
                      <label for="tema">Actividad Principal</label>
                      <select class="form-control" id="select_actividad" name="actividad">
                      <option value=''>Seleccionar actividad principal...</option>
                        <?php 
                        //Ciclo donde se trae todos los cuit de clientes (visibles) de la base de datos. variable $enlace heredada de conexion.php
                       foreach($enlace->query($query_clientes) AS $row): ?>
                       <option value="<?php echo $row ['actividad_principal'] ?>"> <?php echo $row ['actividad_principal'] ?></option>
                       <?php endforeach ?>  
                      </select>
                </div>
                <div class="form-group col-md-6 col-sm-6">
                      <label for="tema">Rubro</label>
                      <select class="form-control" id="select_rubro" name="rubro">
                      <option value=''>Seleccionar rubro...</option>
                        <?php 
                        //Ciclo donde se trae todos los nombres de clientes (visibles) de la base de datos. variable $enlace heredada de conexion.php
                        foreach($enlace->query($query_clientes) AS $row): ?>
                        <option value="<?php echo $row ['rubro'] ?>"> <?php echo $row ['rubro'] ?></option>
                        <?php endforeach ?>  
                      </select>
                </div>
              </div>
              <a href="new_cliente.php"><p>Puede agregar clientes AQUI</p></a>
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
                    <th class="text-center">Modificar</th>
                    <th class="text-center">Borrar</th>
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
                    <th class="text-center">Modificar</th>
                    <th class="text-center">Borrar</th>
                  </tr>
                </tfoot>
                <tbody>
                <tr>
                <?php
                    // FILTROS PARA BUSCAR CLIENTES
                    $query_aConsultar = $query_clientes;

                    $cuit = $_GET["cuit"];
                    if (!empty ($cuit)){
                    $query_aConsultar.=" AND (id_cliente=$cuit)";
                    }

                    $nombre = $_GET["nombre"];
                    if (!empty ($nombre)){
                      $query_aConsultar.=" AND (id_cliente=$nombre)";
                      }
                    
                    $localidad = $_GET["localidad"];
                    if (!empty ($localidad)){
                      $query_aConsultar.=" AND (c.id_localidad=$localidad)";
                      }
                    
                    $actividad = $_GET["actividad"];
                    if (!empty ($_GET["actividad"])){
                      $query_aConsultar.=" AND (actividad_principal='$actividad')";
                      }
                    
                    $rubro = $_GET["rubro"];
                    if (!empty ($_GET["rubro"])){
                      $query_aConsultar.=" AND (rubro='$rubro')";
                      }

                    $result = mysqli_query($enlace,$query_aConsultar) or die($enlace->error);
                    while ($row= $result->fetch_assoc()){ 
                      ?>
                       <tr>
                          <td><?php echo $row['id_cliente'];?></td>
                          <td><?php echo $row['cuit'];?></td>
                          <td><?php echo $row['nombre'];?></td>
                          <td><?php echo $row['localidad'];?></td>
                          <td><?php echo $row['rubro'];?></td>
                          <td><?php echo $row['actividad_principal'];?></td>
                          <td class="text-center"><a href="#" class="settings" title="Modificar" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a></td>
                          <td class="text-center"><a href="vendor/php/borrado_logico.php?cliente= <?php echo $row['id_cliente'];?>" onclick= "return confirmation()" class="delete" title="Borrar" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
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
        if(confirm("Se va a borrar el registro, ¿está seguro?"))
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