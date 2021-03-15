<?php
require_once('db.php');

class DashboardModel extends db
{

  public function fetchPages(): array {

    $this->query("SELECT * FROM `pages` WHERE `user_id` = " . $_SESSION['id']);
    $this->execute();
    $Pages = $this->fetchAll();

    if (count($Pages) > 0) {
      $Response = array(
        'status' => true,
        'data' => $Pages
      );
      return $Response;
    }

    $Response = array(
      'status' => false,
      'data' => []
    );
    return $Response;
  }

  public function fetchRecentUsers(): array {
    $this->query("SELECT * FROM `users` ORDER BY `created_at` DESC LIMIT 5");
    $this->execute();
    $Users = $this->fetchAll();

    if (count($Users) > 0) {
      $Response = array(
        'status' => true,
        'data' => $Users
      );
      return $Response;
    }

    $Response = array(
      'status' => false,
      'data' => []
    );
    return $Response;
  }
}

?>
