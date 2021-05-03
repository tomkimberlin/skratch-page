<?php require_once('controller/new-page-controller.php'); ?>
<?php
$NewPage = new NewPage();
$Response = [];
$active = $NewPage->active;
if (isset($_POST) && count($_POST) > 0) $Response = $NewPage->createPage($_POST);
?>
<?php require('./nav.php'); ?>
<main class="container py-3">
  <h1>New Page</h1>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="mb-3">
      <label for="inputPageTitle" class="form-label">Page title</label>
      <input type="text" id="inputPageTitle" class="form-control" name="pageTitle" required autofocus>
    </div>
    <div class="mb-3">
      <label for="inputPageContent" class="form-label">Page content</label>
      <textarea name="pageContent" id="inputPageContent" class="form-control" required rows="8"></textarea>
    </div>
    <div class="mb-3">
      <button class="btn btn-secondary" type="submit">Save</button>
    </div>
  </form>
  <a class="link-secondary" href="dashboard.php">Return to Dashboard</a>
</main>
</body>
</html>
