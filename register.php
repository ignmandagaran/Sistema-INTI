<?php
//Reanudamos la sesión
session_start();

//Cargamos las consultas y la conexion
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
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Header include-->
<?php $title = "Registro de Usuarios"; 
      include 'vendor/php/includes/header.php' ?>

<body id="bg-imagen">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registrar un nuevo usuario</div>
      <div class="card-body">
        <form action="vendor/php/add_usuario.php" method="POST">
          <div class="form-group">
              <label for="inputCuit">Nombre de Usuario</label>
              <input type="text" class="form-control" id="inputUsuario" placeholder="Ingresar usuario" name="usuario" autofocus="autofocus" 
              required pattern="[A-Za-z0-9]{5,45}" title="Letras y números. Tamaño mínimo: 8. Tamaño máximo: 45">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCuit">Nombre/s</label>
              <input type="text" class="form-control" id="inputNombre" placeholder="Ingresar nombre/s" name="nombre" maxlength="25" required>
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Apellido/s</label>
              <input type="text" class="form-control" id="inputApellido" name="apellido" placeholder="Ingresar apellido/s" maxlength="20" required>
            </div>
          </div>
          <div class="form-group">
            <label for="rol">Selección de rol</label>
            <select name="rol" class="form-control" id="rol" required>
              <option>Seleccionar...</option>
              <option value="2">Asesor</option>
              <option value="1">Administrador</option>
            </select>
          </div>
          <div class="form-row">
            <div class="form-group col-md-9  col-sm-9">
              <label for="exampleFormControlSelect1">Selección de región</label>
              <select class="form-control" id="exampleFormControlSelect1" disabled>
                <option>Seleccionar...</option>
                <option>1</option>
                <option>2</option>
              </select>
            </div>
            <div class="form-group col-md-3 col-sm-3">
              <label for="inputPassword4">Nodo</label>
              <input type="text" class="form-control" id="inputNodo" name="nodo" placeholder="" disabled>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCuit">Contraseña</label>
              <input type="password" class="form-control" id="inputPassword" placeholder="Ingresar contraseña" name="password"
              required pattern="[A-Za-z0-9]{8,45}" title="Letras y números. Tamaño mínimo: 8. Tamaño máximo: 45">
              <span id='message'></span>
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Confirmar Contraseña</label>
              <input type="password" class="form-control" id="inputConfirmPassword" name="confirmPassword" placeholder="Confirmar contraseña"  
              required pattern="[A-Za-z0-9]{8,45}" title="Letras y números. Tamaño mínimo: 8. Tamaño máximo: 45">
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-100">Registrar usuario</button>
        </form>
        <div class="text-center">
          <p class="p-2">*Una vez creado el usuario, puede modificarlo o eliminarlo en la tabla de usuarios.</p>
          <a class="d-block" href="matriz_privilegios.php">Ver tabla de usuarios</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts include-->
    <?php include 'vendor/php/includes/scripts.php'?>
    <script>
      $('#inputPassword, #inputConfirmPassword').on('keyup', function () {
        if ($('#inputPassword').val() == $('#inputConfirmPassword').val()) {
          $('#message').html('Las contraseñas coinciden').css('color', 'green');
        } else 
          $('#message').html('Las contraseñas no coinciden').css('color', 'red');
        });
    </script>

</body>

</html>
