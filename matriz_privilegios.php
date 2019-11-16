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
<?php $title = "Control de Usuarios"; 
      echo '<link href="css/matriz-privi.css" rel="stylesheet">';
      include 'vendor/php/includes/header.php'; ?>

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
            <a href="#">Usuarios</a>
          </li>
          <li class="breadcrumb-item active">Matriz de Usuarios</li>
        </ol>

        <!-- Page Content -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-fw fa-plus-circle"></i>
            Elegir usuario y definir privilegios</div>
          <div class="card-body">
              <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                      <div class="col-sm-5">
                        <h2>Control de Usuarios</h2>
                      </div>
                      <div class="col-sm-7">
                        <a href="register.php" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Agregar usuario</span></a>						
                      </div>
                    </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>						
                            <th>Alta del usuario</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <?php
                    $result = mysqli_query($enlace,$query_buscar_usuarios) or die($enlace->error);
                    while ($row= $result->fetch_assoc()){ ;?>
                       <tr>
                          <td><?php echo $row['id_usuario'];?></td>
                          <td><img src="imagenes/user.png" class="avatar" alt="Avatar"><?php echo ucfirst($row['usuario']);?></td>
                          <td><?php echo $row['fecha_alta'];?></td>
                          <td><?php echo ucfirst($row['rol']);?></td>
                          <?php    
                          if ($row['visible']){ ?> 
                             <td><span class="status text-success">&bull;</span> Activo </td>
                             <?php } else {?>
                             <td><span class="status text-danger">&bull;</span> Suspendido</td> 
                             <?php }?>
                             <td><a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a></td>
                             <td><a href="vendor/php/borrado_logico.php?usuario= <?php echo $row['id_usuario'];?>" onclick= "return confirmation()" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
                       </tr>
                         <?php }?> 
                  </tbody>
                </table>
                <!-- NO BORRAR - PAGINACION A IMPLEMENTAR - NO BORRAR -->
                <div class="clearfix">
                  <div class="hint-text">Mostrado <b>X</b> de <b>XX</b> entradas</div>
                  <ul class="pagination">
                      <li class="page-item disabled"><a href="#">Previo</a></li>
                      <li class="page-item active"><a href="#" class="page-link">1</a></li>
                      <li class="page-item"><a href="#" class="page-link">2</a></li>
                      <li class="page-item"><a href="#" class="page-link">3</a></li>
                      <li class="page-item"><a href="#" class="page-link">4</a></li>
                      <li class="page-item"><a href="#" class="page-link">5</a></li>
                      <li class="page-item"><a href="#" class="page-link">Siguiente</a></li>
                  </ul>
                </div>
              </div>
            </div>
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
