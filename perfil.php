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
                                            <?php
                                            $usuario_logueado = $_SESSION['usuario'];
                                            $query_dedicacion = "SELECT dedicacion FROM dedicaciones WHERE fecha=(SELECT MAX(fecha) from dedicaciones where usuario='$usuario_logueado') AND usuario='$usuario_logueado'";
                                            $result_dedicacion = mysqli_query($enlace,$query_dedicacion) or die($enlace->error);
                                            if ($row = $result_dedicacion->fetch_assoc()){
                                                $dedicacion_perfil = $row['dedicacion'];
                                            }

                                            $result = mysqli_query($enlace,$query_usuarios_perfil."'".$usuario_logueado."';") or die($enlace->error);
                                            if ($row= $result->fetch_assoc()){ ;?>
                                            <div class="profile-head">
                                                <h5>
                                                <!-- Muestra el rol del usuario según su perfil -->
                                                <?php if ($row['id_rol']==1){ echo 'Administrador';} else { echo 'Asesor';}?>
                                                </h5>
    
                                                <?php
                                                ?>
                                                <p class="proile-rating">DEDICACION : <span><?php echo $dedicacion_perfil."%";?></span>        
                                                <a href="#" class="settings" title="Modificar" data-toggle="modal" data-target="#modalDedicacion"><i class="material-icons">&#xE8B8;</i></a></p>
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Datos personales</a>
                                                    </li>
                                                    <!--<li class="nav-item">
                                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Datos laborales</a>
                                                    </li>-->
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                        <button onclick="window.location.href='modificar_usuario.php?usuario=<?php echo $row['usuariominusculas'];?>';" type="submit" class="profile-edit-btn" name="btnAddMore">Editar Perfil</button>         
                                        </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <!--<div class="profile-work">
                                        <p>Registros relacionados</p>
                                        <a href="">Proyectos</a><br/>
                                        <a href="">Asistencias</a><br/>
                                        <a href="">Capacitaciones</a><br/>
                                        <a href="">Modulos</a><br/>
                                        <a href="">I+D publicados</a><br/>
                                    </div>-->
                                </div>
                                <div class="col-md-8">
                                    <div class="tab-content profile-tab" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Usuario</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $row['usuario'];?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nombre completo</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php if($row['nombre']==NULL)
                                                    echo "No informado";
                                                    else echo $row['nombre'];?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Legajo</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php if($row['legajo']==NULL)
                                                    echo "No informado";
                                                    else echo $row['legajo'];?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php if($row['email']==NULL)
                                                    echo "No informado";
                                                    else echo $row['email'];?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Telefono</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php if($row['telefono']==NULL)
                                                    echo "No informado";
                                                    else echo $row['telefono'];?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?> 
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
                <!-- /.container-fluid -->           
                </div>
            <!-- /.content-wrapper -->
            </div> 
        <!-- /#wrapper --> 
        </div>

        <?php include 'vendor/php/includes/modal_dedicacion.php'; ?>

            <!-- Footer include -->            
            <?php include 'vendor/php/includes/footer.php'; ?>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal include-->
        <?php include 'vendor/php/includes/logout.php';?>

        <!-- Scripts include-->
        <?php include 'vendor/php/includes/scripts.php';?>

        <script>
            function carga_ajax (x,div,url)
            {
                //alert(ruta);
                $.post
                (
                url,
                {x:x},
                function (resp)
                {
                    $("#"+div+"").html (resp);
                }
                );
            }

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