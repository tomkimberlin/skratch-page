<?php require_once('controller/page-controller.php'); ?>
<?php
$Page = new Page();
$active = $Page->active;
if (isset($_GET['id'])) {
  $ViewPage = $Page->getPage();
  foreach ($ViewPage['data'] as $row) {
    $id = $row['user_id'];
  }
}
?>
<?php require('./nav.php'); ?>
<main class="container py-3">
  <h1>View Page</h1>
  <?php if (!empty($id)) : ?>
    <?php if ($id == $_SESSION['id']) : ?>
      <?php if (isset($ViewPage)) {
        if ($ViewPage['status']) : ?>
          <?php foreach ($ViewPage['data'] as $row) : ?>
            <div class="border rounded mb-3 p-3">
              <p><?php echo $row['content']; ?></p>
              <p class="text-secondary mb-0">Created: <?php echo $row['last_updated']; ?></p>
            </div>
          <?php endforeach; ?>
        <?php endif;
      } ?>
    <?php else: ?>
      <div class="alert alert-danger" role="alert">
        <span>You do not have permission to view this page.</span>
      </div>
    <?php endif; ?>
  <?php else: ?>
    <div class="alert alert-danger" role="alert">
      <span>Page does not exist.</span>
    </div>
  <?php endif; ?>
  <a class="link-secondary" href="dashboard.php">Return to Dashboard</a>
</main>
</body>
</html>