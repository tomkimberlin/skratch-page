<?php require_once('controller/register-controller.php'); ?>
<?php
$Register = new Register();
$Response = [];
$active = $Register->active;
if (isset($_POST) && count($_POST) > 0) $Response = $Register->register($_POST);
?>
<?php require('./nav.php'); ?>
<main class="container py-3">
  <?php if (isset($Response['status']) && !$Response['status']) : ?>
    <div class="alert alert-danger" role="alert">
      <span>Unable to register an account with the credentials you entered. Please try again.</span>
    </div>
  <?php endif; ?>
  <h1>Register</h1>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="mb-3">
      <label for="inputEmail" class="form-label">Email</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" required autofocus value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
      <?php if (isset($Response['email']) && !empty($Response['email'])): ?>
        <small class="text-danger"><?php echo $Response['email']; ?></small>
      <?php endif; ?>
    </div>
    <div class="mb-3">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <?php if (isset($Response['password']) && !empty($Response['password'])): ?>
        <small class="text-danger"><?php echo $Response['password']; ?></small>
      <?php endif; ?>
    </div>
    <div>
      <button class="btn btn-primary" type="submit">Register</button>
    </div>
  </form>
</main>
</body>
</html>
