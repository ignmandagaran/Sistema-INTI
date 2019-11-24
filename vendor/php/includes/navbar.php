<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="principal.php"><img src="imagenes/logointi2.svg" alt="logointi"></a>

    <!--<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>-->

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <!--<input type="text" class="form-control" placeholder="Buscar por..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>-->
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <!--<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger"></span>
        </a>-->
        <!-- Navbar -->
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <!--<a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a> -->
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <!--<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger"></span>
        </a> 
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>-->
        <?php
                  $sql="SELECT * FROM usuarios WHERE usuario='".$_SESSION['usuario']."'";
                  $result=mysqli_query($enlace,$sql);
                  
                  while($mostrar=mysqli_fetch_array($result))
                  {
              ?>
      </li>
      
      <li class="nav-item dropdown no-arrow" >
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $mostrar['usuario'];?>
        <i class="fas fa-user-circle fa-fw" ></i>
        </a>
        <?php
        }
        ?>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="perfil.php">Perfil</a>
          <?php 
            if ($_SESSION['usuario']=="Admin"){
            echo '<a class="dropdown-item" href="matriz_privilegios.php">Control de usuarios</a>';
            }
            ?>
          <!--<a class="dropdown-item" href="#">Activity Log</a>-->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">Salir</a>
        </div>
      </li>
    </ul>

  </nav>