<?php require('nav.php'); ?>
<main class="container py-3">
  <h1>Page not found</h1>
  <?php if (isset($_SESSION['auth_status'])) : ?>
    <p><a class="link-secondary" href="dashboard.php">Dashboard</a></p>
  <?php else: ?>
    <p class="text-secondary"><a class="link-secondary" href="login.php">Login</a> or <a class="link-secondary" href="register.php">register</a> to get started.</p>
  <?php endif; ?>
</main>
