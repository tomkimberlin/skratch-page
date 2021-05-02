<?php require_once('controller/search-controller.php'); ?>
<?php
$Search = new Search();
$Response = [];
$active = $Search->active;
$Results = $Search->getResult();
?>
<?php require('./nav.php'); ?>
<main class="container py-3">
  <h1>Dashboard</h1>
  <p class="lead text-secondary">Logged in as: <?php echo $_SESSION['email']; ?></p>
  <p><a class="link-secondary" href="new-page.php">New page</a></p>
  <section class="row">
    <h2 class="mb-3">Pages</h2>
    <?php if ($Results['status']) : ?>
      <form action="search.php" class="pb-3" method="POST">
        <label for="search">Search Pages</label>
        <input type="text" name="search" id="search">
      </form>
      <?php foreach ($Results['data'] as $row) : ?>
        <div class="col-md">
          <div class="border rounded mb-3">
            <div class="bg-dark p-1">
              <p class="fw-bold m-0 text-light"><?php echo $row['title']; ?></p>
            </div>
            <div class="p-1">
              <p class="mb-0"><?php echo $row['content']; ?></p>
              <p class="text-secondary mb-0"><?php echo $row['saved_at']; ?></p>
              <p class="mb-0"><a class="link-secondary" href="page.php?id=<?php echo $row['id']; ?>">View page</a></p>
              <p class="mb-0"><a class="link-secondary" href="delete.php?id=<?php echo $row['id']; ?>">Delete page</a></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div>
        <p>No pages founds.</p>
      </div>
    <?php endif; ?>
    <div>
      <a class="link-secondary" href="dashboard.php">Return to Dashboard</a>
    </div>
  </section>
</main>
</body>
</html>
