<?php require_once('controller/index-controller.php'); ?>
<?php
$Index = new Index();
$active = $Index->active;
?>
<?php require('nav.php'); ?>
<main class="container py-3">
  <h1>SkratchPage</h1>
  <p class="lead">Your personal web-based notepad. SkratchPage streamlines the process of saving and sharing text-based information between devices.</p>
  <div>
    <?php if (isset($_SESSION['auth_status'])) : ?>
      <p><a class="link-secondary" href="dashboard.php">Dashboard</a></p>
    <?php else: ?>
      <p class="text-secondary"><a class="link-secondary" href="login.php">Login</a> or <a class="link-secondary" href="register.php">register</a> to get started.</p>
    <?php endif; ?>
  </div>
  <section>
    <h2>Features</h2>
    <section class="my-4">
      <h3 class="h4">Simple and secure login and registration system</h3>
      <p class="lead">No third-party logins or annoying email verification. Just an email address and password are needed to create an account.</p>
    </section>
    <section class="my-4">
      <h3 class="h4">Create and save pages to your account</h3>
      <p class="lead">Give your page a title, some content, and hit the save button. It's that simple.</p>
    </section>
    <section class="my-4">
      <h3 class="h4">Search saved pages</h3>
      <p class="lead">Never worry about being unable to find an important page.</p>
    </section>
  </section>
</main>
</body>
</html>
