<?php require_once('controller/search-controller.php'); ?>
<?php
$Search = new Search();
$active = $Search->active;
$Results = $Search->getResult();
?>
<?php require('./nav.php'); ?>
<main class="container py-3">
  <h1>Search Results</h1>
  <section>
    <?php if ($Results['status']) : ?>
      <?php foreach ($Results['data'] as $row) : ?>
        <div class="col-md">
          <div class="border mb-3">
            <div class="bg-dark p-1 px-2">
              <p class="fw-bold m-0 text-light"><?php echo $row['title']; ?></p>
            </div>
            <div class="p-1 px-2">
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
    <div>
      <a class="link-secondary" href="dashboard.php">Return to Dashboard</a>
    </div>
  </section>
</main>
</body>
</html>
