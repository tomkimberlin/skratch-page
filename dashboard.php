<?php require_once('controller/dashboard-controller.php'); ?>
<?php
$Dashboard = new Dashboard();
$Response = [];
$active = $Dashboard->active;
$Pages = $Dashboard->getPages();
?>
<?php require('./nav.php'); ?>
<main role="main" class="container">
  <div class="container">
    <div class="row mt-5">
      <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
        <h1>Pages</h1>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="container py-2">
        <a href="page.php">New page</a>
      </div>
    </div>
    <div class="row">
      <?php if ($Pages['status']) : ?>
        <?php foreach ($Pages['data'] as $row) : ?>
          <div class="col-xs-12 col-sm-12 col-md-12 col-xl-4 col-lg-4">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
              <div>
                <p><?php echo $row['content']; ?></p>
                <p>Updated: <?php echo $row['last_updated']; ?></p>
                <p><a href="page.php">View page</a></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    <div class="row">
    <h2>Role</h2>
    <p><?php echo $_SESSION['role'] ?></p>
    <?php if ($_SESSION['role'] === 'vip') : ?>
    <p>You are <b>very important</b>. Thank you for your support.</p>
    <?php endif; ?>
    <?php if ($_SESSION['role'] === 'admin') : ?>
    <h2>Recently created users</h2>
    <?php $Users = $Dashboard->getRecentUsers(); ?>
    <?php foreach ($Users['data'] as $row) : ?>
      <p><?php echo $row['email']; ?></p>
      <?php endforeach; ?>
    <?php endif; ?>
    </div>
  </div>
</main>
</body>
</html>
