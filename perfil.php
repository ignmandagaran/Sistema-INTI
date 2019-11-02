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
<?php $title = "Perfil";
      echo '<link href="css/perfil.css" rel="stylesheet">';
      include 'vendor/php/includes/header.php'; ?>

<body id="page-top">

  <!-- Navbar include -->
  <?php include 'vendor/php/includes/navbar.php'; ?>

  <div id="wrapper">

    <!-- Sidebar include-->
    <?php include 'vendor/php/includes/sidebar.php'; ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Usuarios</a>
          </li>
          <li class="breadcrumb-item active">Perfil</li>
        </ol>

        <!-- Page Content -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-fw fa-plus-circle"></i>
            Tu perfil de usuario</div>
          <div class="card-body">
                    <div class="container emp-profile">
                        <form method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile-img">
                                        <img src="imagenes/perfil_img.png" alt="Foto del perfil"/>
                                        <div class="file btn btn-lg btn-primary">
                                            Cambiar foto
                                            <input type="file" name="file"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="profile-head">
                                                <h5>
                                                    Administrador
                                                </h5>
                                                <h6>
                                                    Nodo Pampa - Mar del plata
                                                </h6>
                                                <p class="proile-rating">DEDICACION : <span>100%</span></p>
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Datos personales</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Datos laborales</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Editar Perfil"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile-work">
                                        <p>Registros relacionados</p>
                                        <a href="">Proyectos</a><br/>
                                        <a href="">Asistencias</a><br/>
                                        <a href="">Capacitaciones</a><br/>
                                        <a href="">Modulos</a><br/>
                                        <a href="">I+D publicados</a><br/>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="tab-content profile-tab" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Usuario</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>Admin</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Nombre completo</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>Gonzalo Chaves</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Legajo</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>587426</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Email</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>gonzalochaves@gmail.com</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Telefono</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>123 456 7890</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Profesión</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>Ingeniero Industrial</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Horas en modulos</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>25 horas</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Horas en visitas</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>42 horas</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Cantidad de visitas</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>16</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>           
                    </div>
                </div>  
              </div>
            </div>
          </div>
        </div>
      </div>

      </div>
      <!-- /.container-fluid -->

     <!-- Footer include -->            
     <?php include 'vendor/php/includes/footer.php'; ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal include-->
  <?php include 'vendor/php/includes/logout.php';?>

  <!-- Scripts include-->
  <?php include 'vendor/php/includes/scripts.php';?>

</body>

</html>