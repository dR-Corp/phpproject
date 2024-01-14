<nav class="main-header navbar navbar-expand navbar-light" style="background-color: #19233e;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- user panel -->
      <li class="nav-item dropdown mr-2">
        <?php if(isset($_SESSION['email']) && !empty($_SESSION['email']) ): ?>
          
          <a class="user-panel d-flex" data-toggle="dropdown">
              <div class="image">
                  <img src="assets/dist/img/avatar.png" class="img-circle elevation-3 bg-white" alt="DA">
              </div>
          </a>
          <div class="dropdown-menu dropdown-menu dropdown-menu-right">
            <span class="dropdown-item dropdown-header">
              <div class="d-block font-weight-bold" style="color: #044687;"><?= $_SESSION['nom'] . "" . $_SESSION['prenom'] ?></div>
            </span>
            <div class="dropdown-divider"></div>
            <a href="logout" class="dropdown-item">
              <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
            </a>
          </div>

        <?php else: ?>
          <a class="btn bg-white text-dark" href="login">Se connecter</a>
        <?php endif; ?>

      </li>
    </ul>
  </nav>