<?php require_once('controller/view-page-controller.php'); ?>
<?php
$ViewPage = new ViewPage();
$active = $ViewPage->active;
?>
<?php require('./nav.php'); ?>
<main class="container py-3">
  <h1>View Page</h1>
  <p>Soon your page will appear here.</p>
  <a class="link-secondary" href="dashboard.php">Return to Dashboard</a>
</main>
</body>
</html>
