<?php require_once('controller/register-controller.php'); ?>
<?php
$Register = new Register();
$Response = [];
$active = $Register->active;
if (isset($_POST) && count($_POST) > 0) $Response = $Register->register($_POST);
?>
<?php require('./nav.php'); ?>
<main role="main" class="container">
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-xs-12 col-sm-12 col-md-12 col-xl-4 col-lg-4 center-align center-block">
        <?php if (isset($Response['status']) && !$Response['status']) : ?>
          <br>
          <div class="alert alert-danger" role="alert">
            <span>Unable to register an account with the credentials you entered. Please try again.</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true" class="text-danger">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <div class="card shadow-lg p-3 mb-5 bg-white rounded">
          <h1 class="text-center">Register</h1>
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
              <div class="form-group">
                <label for="inputEmail" class="sr-only">Email</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" required autofocus value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                <?php if (isset($Response['email']) && !empty($Response['email'])): ?>
                  <small class="text-danger"><?php echo $Response['email']; ?></small>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
              <div class="form-group mt-2">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <?php if (isset($Response['password']) && !empty($Response['password'])): ?>
                  <small class="text-danger"><?php echo $Response['password']; ?></small>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-2 d-flex justify-content-center">
              <button class="btn btn-md btn-primary btn-block" type="submit">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
</body>
</html>
