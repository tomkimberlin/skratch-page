<?php require_once('controller/delete-controller.php'); ?>
<?php require_once('controller/page-controller.php'); ?>
<?php
$Page = new Page();
$active = $Page->active;
if (isset($_GET['id'])) {
  $ViewPage = $Page->getPage();
  foreach ($ViewPage['data'] as $row) {
    $user_id = $row['user_id'];
  }
}
if($user_id == $_SESSION['id']) {
  $Delete = new Delete();
  $Response = [];
  $active = $Delete->active;
  $Response = $Delete->deletePage();
}
header("Location: dashboard.php");

?>
