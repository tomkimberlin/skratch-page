<?php require_once('controller/index-controller.php'); ?>
<?php
$Index = new Index();
$active = $Index->active;
?>
<?php require('nav.php'); ?>
<main class="container p-5">
  <h1>Skratch.Page</h1>
  <p class="lead text-secondary">A simple web-based notepad.</p>
  <section>
    <?php if (isset($_SESSION['auth_status'])) : ?>
      <p><a class="link-secondary" href="dashboard.php">Dashboard</a></p>
    <?php else: ?>
      <p class="text-secondary"><a class="link-secondary" href="login.php">Login</a> or <a class="link-secondary" href="register.php">register</a> to get started.</p>
    <?php endif; ?>
  </section>
</main>
</body>
</html>
