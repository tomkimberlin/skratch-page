<?php require_once('controller/login-controller.php'); ?>
<?php
$Login = new Login();
$Response = [];
$active = $Login->active;
if (isset($_POST) && count($_POST) > 0) $Response = $Login->login($_POST);
?>
<?php require('nav.php'); ?>
<main class="container py-3">
  <h1>Login</h1>
  <div class="d-flex flex-column">
    <?php if (isset($Response['status']) && !$Response['status']) : ?>
      <div class="alert alert-danger" role="alert">
        <span>Invalid credentials. Please try again.</span>
      </div>
    <?php endif; ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="mb-3">
        <label for="inputEmail" class="form-label">Email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" required autofocus>
      </div>
      <div class="mb-3">
        <label for="inputPassword" class="form-label">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      </div>
      <div>
        <button class="btn btn-secondary" type="submit">Login</button>
      </div>
    </form>
</main>
</body>
</html>
