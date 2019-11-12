<?php
session_start();
include 'vendor/php/querys.php';
require 'vendor/php/conexion.php';
require 'vendor/php/sesiones.php';
?>

<!DOCTYPE html>
<html lang="es">
<!-- Header include-->
<?php $title = "Acceso al sistema"; 
      include 'vendor/php/includes/header.php' ?>

<body id="bg-imagen">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Ingreso al sistema</div>
      <div class="card-body">
        <form name="acceso" method="post" action="vendor/php/acceder.php" enctype="multipart/form-data" name="logueo" id="acceso" accept-charset="utf-8">
          <div class="form-group">
            <div class="form-label-group">
              <input name="usuario" id="usuario" type="text" id="inputUsuario" class="form-control" required="required" autofocus="autofocus">
              <label for="inputEmail">Usuario</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input name="clave" id="clave" type="password" id="inputPassword" class="form-control" required="required" >
              <label for="inputPassword">Contraseña</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="recordar">
                Recordar contraseña
              </label>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit" id="" >Ingresar</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Registrarse</a>
          <a class="d-block small" href="forgot-password.html">Recuperar contraseña</a>
        </div>
      </div>
    </div>
    <div class="container_logos">
      <img src="imagenes/logo_inti.svg" alt="logo inti"/>
      <img src="imagenes/logo_iset.svg" alt="logo iset"/>
	  </div>
  </div> 

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
