<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="application-name" content="Skratch.Page">
    <meta name="author" content="Tom Kimberlin">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skratch.Page | <?php echo ucfirst($active); ?></title>
    <!-- Css Styles... -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Skratch.Page</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <?php if (!isset($_SESSION['auth_status'])) : ?>
              <a class="nav-link <?php if (strtolower($active) === 'login') echo 'active'; ?>" href="index.php">Login</a>
              <a class="nav-link <?php if (strtolower($active) === 'register') echo 'active'; ?>" href="register.php">Register</a>
            <?php elseif (isset($_SESSION['auth_status'])) : ?>
              <a class="nav-link <?php if (strtolower($active) === 'dashboard') echo 'active'; ?>" href="index.php">Dashboard</a>
            <?php endif; ?>
            <?php if (isset($_SESSION['auth_status'])) : ?>
              <a class="nav-link" href="logout.php">Logout</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </nav>
