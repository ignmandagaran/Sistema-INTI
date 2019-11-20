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

$getUsuario= $_GET["usuario"];
$query_usuario= mysqli_query($enlace, "SELECT u.usuariominusculas, u.nombre, u.id_rol, rol, d.dedicacion, d.fecha as fecha_dedicacion FROM usuarios u
                                        INNER JOIN roles r ON r.id_rol=u.id_rol
                                        INNER JOIN dedicaciones d ON d.usuario=u.usuariominusculas
                                        WHERE d.fecha=(SELECT MAX(fecha) from dedicaciones) AND usuariominusculas='$getUsuario'");                                  
foreach($query_usuario AS $row){
    $usuario = $row['usuariominusculas'];
    $nombre = $row['nombre'];
    $rol = $row['rol'];
    $id_rol = $row['id_rol'];
    $dedicacion = $row['dedicacion'];
    $fecha_dedicacion = $row['fecha_dedicacion'];
}?>

<!DOCTYPE html>
<html lang="en">

<!-- Header include-->
<?php $title = "Modificar Usuarios"; 
      include 'vendor/php/includes/header.php'
      ?>

<body id="bg-imagen">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Modificar datos del usuario</div>
      <div class="card-body">
        <form action="vendor/php/modificar.php" method="POST">
          <div class="form-group">
            <label for="exampleFormControlSelect1">Nombre de usuario</label>
            <input type="text" class="form-control" id="inputNombreUsuario" name="usuario" placeholder="<?php echo ucfirst($usuario);?>" readonly>
          </div>
          <div class="form-group">
              <label for="inputCuit">Nombre Completo Actual</label>   
              <input type="text" class="form-control" id="inputNombre" placeholder="<?php echo "$nombre";?>" maxlength="25" disabled>
            </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCuit"> Cambiar nombre</label> 
              <input type="text" class="form-control" id="inputNombre" placeholder="Nuevo nombre/s" name="nombre" maxlength="25">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Cambiar apellido/s</label>
              <input type="text" class="form-control" id="inputApellido" name="apellido" placeholder="Nuevo apellido/s" maxlength="20">
            </div>
          </div>
          <div class="form-group">
            <label for="rol">Selección de rol</label>
            <select name="rol" class="form-control" id="rol" required>
              <option value="<?php echo "$id_rol";?>"><?php echo "$rol";?> </option>
              <option value="2">Usuario</option>
              <option value="1">Administrador</option>
            </select>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputDedicacion">Dedicacion</label>
                <input type="number" min="1" max="100" class="form-control" name="dedicacion" id="inputEmail4" placeholder="0 al 100" requerid>
              </div>
              <div class="form-group date form_datetime col-md-9 col-sm-9">
                  <label class="control-label" for="datetimepicker-default">Fecha</label>
                  <input type='text' class="form-control" id='datetimepicker1' name="fecha_dedicacion" placeholder="Ingresar fecha.."required />
              </div>
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
              <label for="inputCuit">Nueva Contraseña</label>
              <input type="password" class="form-control" id="inputPassword" placeholder="Nueva contraseña" name="password"
              pattern="[A-Za-z0-9]{8,45}" title="Letras y números. Tamaño mínimo: 8. Tamaño máximo: 45">
              <span id='message'></span>
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Confirmar nueva Contraseña</label>
              <input type="password" class="form-control" id="inputConfirmPassword" name="confirmPassword" placeholder="Confirmar nueva contraseña"  
              pattern="[A-Za-z0-9]{8,45}" title="Letras y números. Tamaño mínimo: 8. Tamaño máximo: 45">
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-100">Guardar cambios</button>
        </form>
        <div class="text-center">
          <a class="d-block" href="matriz_privilegios.php">Volver a tabla de usuarios</a>
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
        $(function () {
                $('#datetimepicker1').datetimepicker({
                    timeZone:'UTC -3',
                    format:'DD/MM/YYYY HH:mm',
                    icons: {time:'far fa-clock'}
                    
                });
            });
    </script>


</body>

</html>
