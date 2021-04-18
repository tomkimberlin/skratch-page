<?php require_once('controller/new-page-controller.php'); ?>
<?php
$NewPage = new NewPage();
$active = $NewPage->active;
?>
<?php require('./nav.php'); ?>
<main role="main" class="container p-5">
  <h1>New Page</h1>
  <p>Soon this will be a textarea to enter text to save.</p>
  <a class="btn btn-secondary" href="dashboard.php">Return to Dashboard</a>
</main>
</body>
</html>
