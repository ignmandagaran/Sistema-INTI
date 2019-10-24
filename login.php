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

  <div id=login class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Ingreso al sistema</div>
      <div class="card-body">
        <form method="post" action="vendor/php/auth.php" enctype="multipart/form-data" name="logueo" id="acceso">
          <div class="form-group">
            <div class="form-label-group">
              <input name="usuario" type="text" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" autocomplete="off">
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
                <input type="checkbox" value="recordar">
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
    <div class="container_logos">
      <img src="imagenes/logo inti.svg" alt="logo inti"/>
      <img src="imagenes/logo iset.svg" alt="logo iset"/>
    </div>
  </div> 

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <script>
//Guardamos el controlador del div con ID mensaje en una variable
var mensaje = $("#mensaje");
//Ocultamos el contenedor
mensaje.hide();

//Cuando el formulario con ID acceso se envíe...
$("#acceso").on("submit", function(e){
	//Evitamos que se envíe por defecto
	e.preventDefault();
	//Creamos un FormData con los datos del mismo formulario
	var formData = new FormData(document.getElementById("acceso"));

	//Llamamos a la función AJAX de jQuery
	$.ajax({
		//Definimos la URL del archivo al cual vamos a enviar los datos
		url: "vendor/php/auth.php",
		//Definimos el tipo de método de envío
		type: "POST",
		//Definimos el tipo de datos que vamos a enviar y recibir
		dataType: "HTML",
		//Definimos la información que vamos a enviar
		data: formData,
		//Deshabilitamos el caché
		cache: false,
		//No especificamos el contentType
		contentType: false,
		//No permitimos que los datos pasen como un objeto
		processData: false
	}).done(function(echo){
		//Una vez que recibimos respuesta
		//comprobamos si la respuesta no es vacía
		if (echo !== "") {
			//Si hay respuesta (error), mostramos el mensaje
			mensaje.html(echo);
			mensaje.slideDown(500);
		} else {
			//Si no hay respuesta, redirecionamos a donde sea necesario
			//Si está vacío, recarga la página
			window.location.replace("");
		}
	});
});

//Cuando el formulario con ID acceso se envíe...
$("#registro").on("submit", function(e){
	//Evitamos que se envíe por defecto
	e.preventDefault();
	//Creamos un FormData con los datos del mismo formulario
	var formData = new FormData(document.getElementById("registro"));

	//Llamamos a la función AJAX de jQuery
	$.ajax({
		//Definimos la URL del archivo al cual vamos a enviar los datos
		url: "recursos/registro.php",
		//Definimos el tipo de método de envío
		type: "POST",
		//Definimos el tipo de datos que vamos a enviar y recibir
		dataType: "HTML",
		//Definimos la información que vamos a enviar
		data: formData,
		//Deshabilitamos el caché
		cache: false,
		//No especificamos el contentType
		contentType: false,
		//No permitimos que los datos pasen como un objeto
		processData: false
	}).done(function(echo){
		//Cuando recibamos respuesta, la mostramos
		mensaje.html(echo);
		mensaje.slideDown(500);
	});
});
</script>

</body>

</html>
