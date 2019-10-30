<?php
session_start();
include 'vendor/php/querys.php';
include 'vendor/php/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<!-- Header include-->
<?php $title = "Nuevo Cliente"; 
      $mainCss = '<link href="css/matriz-privi.css" rel="stylesheet">';
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
          <li class="breadcrumb-item active">Matriz de control</li>
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
                        <h2>Control de usuarios</h2>
                      </div>
                      <div class="col-sm-7">
                        <a href="#" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Agregar usuario</span></a>						
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
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td><a href="#"><img src="imagenes/user.png" class="avatar" alt="Avatar"> Michael Holz</a></td>
                        <td>04/10/2013</td>                        
                        <td>Admin</td>
                        <td><span class="status text-success">&bull;</span> Activo</td>
                        <td>
                          <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                          <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                        </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td><a href="#"><img src="imagenes/user.png" class="avatar" alt="Avatar"> Paula Wilson</a></td>
                      <td>05/08/2014</td>                       
                      <td>Asesor</td>
                      <td><span class="status text-success">&bull;</span> Activo</td>
                      <td>
                        <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                        <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td><a href="#"><img src="imagenes/user.png" class="avatar" alt="Avatar"> Antonio Moreno</a></td>
                      <td>11/05/2015</td>
                      <td>Asesor</td>
                      <td><span class="status text-danger">&bull;</span> Suspendido</td>                        
                      <td>
                        <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                        <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                      </td>                        
                    </tr>
                    <tr>
                      <td>4</td>
                      <td><a href="#"><img src="imagenes/user.png" class="avatar" alt="Avatar"> Mary Saveley</a></td>
                      <td>06/09/2016</td>
                      <td>Docente</td>
                      <td><span class="status text-success">&bull;</span> Activo</td>
                      <td>
                        <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                        <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td><a href="#"><img src="imagenes/user.png" class="avatar" alt="Avatar"> Martin Sommer</a></td>
                      <td>12/08/2017</td>                        
                      <td>Asistente</td>
                      <td><span class="status text-warning">&bull;</span> Inactivo</td>
                      <td>
                        <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                        <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="clearfix">
                  <div class="hint-text">Mostrado <b>5</b> de <b>25</b> entradas</div>
                  <ul class="pagination">
                      <li class="page-item disabled"><a href="#">Previo</a></li>
                      <li class="page-item"><a href="#" class="page-link">1</a></li>
                      <li class="page-item"><a href="#" class="page-link">2</a></li>
                      <li class="page-item active"><a href="#" class="page-link">3</a></li>
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

</body>

</html>
