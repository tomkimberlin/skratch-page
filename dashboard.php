<?php require_once('controller/dashboard-controller.php'); ?>
<?php
$Dashboard = new Dashboard();
$Response = [];
$active = $Dashboard->active;
$News = $Dashboard->getNews();
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
        <a href="new.php">New page</a>
      </div>
    </div>
    <div class="row">
      <?php if ($Pages['status']) : ?>
        <?php foreach ($Pages['data'] as $new) : ?>
          <div class="col-xs-12 col-sm-12 col-md-12 col-xl-4 col-lg-4">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
              <div>
                <p><?php echo $new['content']; ?></p>
              </div>
              <div>
                <p><a href="pages/<?php echo $new['id']; ?>">View page</a></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</main>
</body>
</html>
