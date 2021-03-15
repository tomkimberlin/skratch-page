<?php require_once('controller/login-controller.php'); ?>
<?php
$Login = new Login();
$Response = [];
$active = $Login->active;
if (isset($_POST) && count($_POST) > 0) $Response = $Login->login($_POST);
?>
<?php require('nav.php'); ?>
<main role="main" class="container">
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-xs-12 col-sm-12 col-md-12 col-xl-4 col-lg-4 center-align center-block">
        <?php if (isset($Response['status']) && !$Response['status']) : ?>
          <div class="alert alert-danger" role="alert">
            <span><B>Oops!</B> Invalid Credentials Used.</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true" class="text-danger">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <div class="card shadow-lg p-3 mb-5 bg-white rounded">
          <h1 class="text-center">Login</h1>
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
        </div>
      </div>
    </div>
  </div>
</main>
</body>
</html>
