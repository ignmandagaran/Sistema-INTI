<?php
session_start();
include 'vendor/php/querys.php';
include 'vendor/php/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
  
  <style>
      #container_logos{
        width: 400px;
        margin: auto;
        margin-top: 30px;
        padding-right: 15px;
        margin-right: auto;
        padding-left: 15px;
        margin-left: auto;
      }
  </style>

<!-- Header include-->
<?php $title = "Nuevo Cliente"; 
      include 'vendor/php/includes/header.php' ?>

<body id="bg-imagen">

  <div id=login class="container">

    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Ingreso al sistema</div>
      <div class="card-body">
        <form method="post" action="vendor/php/login.php" enctype="multipart/form-data" name="logueo" onsubmit="return validateForm()">
          <div class="form-group">
            <div class="form-label-group">
              <input name="usuario" type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Usuario</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input name="clave" type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Contraseña</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Recordar contraseña
              </label>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit" >Ingresar</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Registrarse</a>
          <a class="d-block small" href="forgot-password.html">Recuperar contraseña</a>
        </div>
        </div>
    </div>
    </div>
          
            <div id="container_logos">
              <img src="imagenes/logo inti.svg" alt="logo inti"/>
              <img src="imagenes/logo iset.svg" alt="logo iset"/>
            </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
