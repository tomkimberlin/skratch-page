<?php require_once('controller/index-controller.php'); ?>
<?php
$Index = new Index();
$active = $Index->active;
?>
<?php require('nav.php'); ?>
<main class="container py-3">
  <h1>Skratch.Page</h1>
  <p class="lead">A simple web-based notepad.</p>
  <section>
    <?php if (isset($_SESSION['auth_status'])) : ?>
      <p><a class="link-secondary" href="dashboard.php">Dashboard</a></p>
    <?php else: ?>
      <p class="text-secondary"><a class="link-secondary" href="login.php">Login</a> or <a class="link-secondary" href="register.php">register</a> to get started.</p>
    <?php endif; ?>
  </section>
  <div class="row">
    <section class="col-md">
      <h2>Access from any device</h2>
      <p class="text-secondary">SkratchPage is accessible from any device with access to the internet via a web browser. PC, Mac, Chrome, Firefox, iPhone, Android, etc. No longer must you rely on having an app installed on your phone for sharing simple information between your devices.</p>
    </section>
    <section class="col-md">
      <h2>Fast and easy to use</h2>
      <p class="text-secondary">Carefully designed to include what is necessary to be useful without becoming overly complicated. There are many ways to accomplish the same thing as SkratchPage but simplicity and ease of use is what makes SkratchPage great.</p>
    </section>
  </div>
  <section>
    <h2>How does it work?</h2>
    <ol>
      <li><a class="link-secondary" href="register.php">Register</a> an account.</li>
      <li><a class="link-secondary" href="register.php">Login</a> to your account and you will be redirected to your dashboard where you can create a new page.
        <img class="img-fluid my-2" src="assets/img/new-page.png" width="730" height="567"></li>
      <li>Access your pages from anywhere at any time!</li>
    </ol>
  </section>
</main>
</body>
</html>
