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
      <p><a class="btn btn-primary" href="dashboard.php">Dashboard</a></p>
    <?php else: ?>
      <p class="text-secondary"><a class="link-primary fw-bold" href="login.php">Login</a> or
        <a class="link-primary fw-bold" href="register.php">register</a> to get started.</p>
    <?php endif; ?>
  </div>
  <section>
    <h2 class="mb-0">Features</h2>
    <section class="my-3">
      <h3 class="h4">Save pages to your account</h3>
      <p class="lead">Give your page a title, some content, and hit the save button. It's that simple.</p>
    </section>
    <section class="my-3">
      <h3 class="h4">Access pages anywhere</h3>
      <p class="lead">SkratchPage is web-based meaning it is accessible on any device with an internet connection and a web browser.</p>
    </section>
    <section class="my-3">
      <h3 class="h4">Search saved pages</h3>
      <p class="lead">Never worry about being unable to find an important page.</p>
    </section>
    <section class="my-3">
      <h3 class="h4">Delete pages anytime</h3>
      <p class="lead">No longer need a page saved? Just delete it and it is gone forever.</p>
    </section>
  </section>
</main>
</body>
</html>
