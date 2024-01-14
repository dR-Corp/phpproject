<!DOCTYPE html>
<html>

<head>
    <?php include('views/partials/_head.php') ?>
    <?php include('views/partials/_script.php'); ?>
</head>

<body class="login-page" style="min-height: 512.781px;">
    
<div class="login-box">
  <div class="login-logo">
    <a href="home">Connexion</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      
      <?php if(isset($_SESSION['error']) && !empty($_SESSION['error'])): ?>
        <p class="login-box-msg text-danger"><?= $_SESSION['error'] ?></p>
      <?php elseif(isset($_SESSION['info']) && !empty($_SESSION['info'])): ?>
        <p class="login-box-msg text-info"><?= $_SESSION['info'] ?></p>
      <?php else: ?>
        <p class="login-box-msg">Connectez vous pour démarrer une nouvelle session</p>
      <?php endif; ?>

      <form action="log" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Mot de passe">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Connexion</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>

</body>

</html>