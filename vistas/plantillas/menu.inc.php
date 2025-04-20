<div class="row">
  <div class="col-sm-3">
    <div class="sidebar-nav">
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="visible-xs navbar-brand">Menu</span>
        </div>
        <div class="navbar-collapse collapse sidebar-navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?php if($titulo == 'Panel') echo 'class="active"'?>><a href="<?php echo RUTA_IR;?>panel">Inicio</a></li>
            <?php  
            if($_SESSION['admin'] == 1){
              $active = "";
              if($titulo == 'Subir imagen'){
                $active = 'class="active"';
              }
              echo '<li ' .$active. '><a href="' .RUTA_IR. 'subir">Subir Imagen</a></li>';
            }
            ?>
            <li <?php if($titulo == 'Galeria') echo 'class="active"'?>><a href="<?php echo RUTA_IR;?>galeria">Galeria</a></li>
            <li <?php if($titulo == 'Mis Invitaciones') echo 'class="active"'?>><a href="<?php echo RUTA_IR;?>misinvitaciones">Mis Invitaciones</a></li>
            <li <?php if($titulo == 'Mis Imagenes') echo 'class="active"'?>><a href="<?php echo RUTA_IR;?>misimagenes">Mis Imagenes</a></li>
            <li <?php if($titulo == 'Salón ' .$_SESSION['usuario']) echo 'class="active"'?>><a target="_blank" href="<?php echo RUTA_IR;?>salon&id=<?php echo $_SESSION['id_usuario']?>">Ver salón</a></li>
             <?php  
            if($_SESSION['admin'] == 1){
              $active = "";
              if($titulo == 'Borrar Imagenes'){
                $active = 'class="active"';
              }
              echo '<li ' .$active. '><a href="' .RUTA_IR. 'borrarimagenes">Borrar Imagenes</a></li>';
            }
            ?>
            <?php  
            if($_SESSION['admin'] == 1){
              $active = "";
              if($titulo == 'Registrar Usuario'){
                $active = 'class="active"';
              }
              echo '<li ' .$active. '><a href="' .RUTA_IR. 'registrar">Registrar Usuarios</a></li>';
            }
            ?>
            <?php  
            if($_SESSION['admin'] == 1){
               $active = "";
              if($titulo == 'Usuarios'){
                $active = 'class="active"';
              }
              echo '<li ' .$active. '><a href="' .RUTA_IR. 'usuarios">Ver Usuarios</a></li>';
            }
            ?>
            <li <?php if($titulo == 'Nombre Salón') echo 'class="active"'?>><a href="<?php echo RUTA_IR;?>nombresalon&id=<?php echo $_SESSION['id_usuario'] ?>">Nombre Salón</a></li>
            <li <?php if($titulo == 'Cambiar Clave') echo 'class="active"'?>><a href="<?php echo RUTA_IR;?>cambiarc">Cambiar Clave</a></li>
            <li><a href="<?php echo RUTA_IR;?>logout"><span>Logout</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
  <div class="col-sm-9">
