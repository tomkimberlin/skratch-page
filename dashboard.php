<?php require_once('controller/dashboard-controller.php'); ?>
<?php
$Dashboard = new Dashboard();
$Response = [];
$active = $Dashboard->active;
$Pages = $Dashboard->getPages();
?>
<?php require('./nav.php'); ?>
<main class="container py-3">
  <h1>Dashboard</h1>
  <section class="row">
    <div class="d-flex align-items-center">
      <div>
        <p><a class="btn btn-primary" href="new-page.php">New Page</a></p>
      </div>
      <?php if ($Pages['status']) : ?>
      <div style="padding-left: 1rem;">
        <form action="search.php" class="pb-3" method="POST">
          <label for="search">Search</label>
          <input type="text" name="search" id="search">
        </form>
      </div>
      <?php endif; ?>
    </div>
    <?php if ($Pages['status']) : ?>
      <?php foreach ($Pages['data'] as $row) : ?>
        <div class="col-md">
          <div class="border mb-3">
            <div class="bg-dark p-1 px-2">
              <p class="fw-bold m-0 text-light"><?php echo $row['title']; ?></p>
            </div>
            <div class="p-2 px-2">
              <p class="mb-0"><?php echo $row['content']; ?></p>
              <p class="text-secondary mb-0"><?php
                $time = $row['saved_at'];
                $formattedTime = date('m/d/y g:ia', strtotime($time));
                echo $formattedTime;
                ?></p>
              <div class="d-flex justify-content-between">
                <p class="mb-0"><a class="link-primary" href="page.php?id=<?php echo $row['id']; ?>">View Page</a></p>
                <p class="mb-0"><a class="link-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete Page</a></p>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div>
        <p>No pages founds.</p>
      </div>
    <?php endif; ?>
  </section>
  <section>
    <?php if ($_SESSION['role'] === '1') : ?>
      <h2>Recently Created Users</h2>
      <?php $Users = $Dashboard->getRecentUsers(); ?>
      <?php foreach ($Users['data'] as $row) : ?>
        <p><?php echo $row['email']; ?></p>
      <?php endforeach; ?>
    <?php endif; ?>
  </section>
</main>
</body>
</html>
