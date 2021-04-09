<?php require_once('controller/login-controller.php'); ?>
<?php
$Login = new Login();
$Response = [];
$active = $Login->active;
if (isset($_POST) && count($_POST) > 0) $Response = $Login->login($_POST);
?>
<?php require('nav.php'); ?>
<main role="main" class="container">
  <div class="container pt-4 text-center">
    <h1>Welcome</h1>
    <p class="lead">SkratchPage is a way to quickly share information between two devices.</p>
  </div>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-xs-12 col-sm-12 col-md-12 col-xl-4 col-lg-4 center-align center-block">
        <?php if (isset($Response['status']) && !$Response['status']) : ?>
          <div class="alert alert-danger" role="alert">
            <span>Invalid credentials. Please try again.</span>
          </div>
        <?php endif; ?>
        <div class="card shadow-lg p-3 mb-5 bg-white rounded">
          <h2 class="text-center">Login</h2>
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
              <div class="form-group">
                <label for="inputEmail" class="sr-only">Email</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" required autofocus>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
              <div class="form-group mt-2">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-2 d-flex justify-content-center">
              <button class="btn btn-md btn-primary btn-block" type="submit">Login</button>
            </div>
          </form>
          <div class="pt-4 text-center">
            <p>Don't have an account? <a href="register.php">Register</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
</body>
</html>
