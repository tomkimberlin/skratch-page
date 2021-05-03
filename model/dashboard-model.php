<?php
require_once('db.php');

class DashboardModel extends db
{

  /**
   * Fetches all pages for a user
   *
   * @return array
   */
  public function fetchPages(): array
  {
    $this->query("SELECT * FROM `pages` WHERE `user_id` = (:id) ORDER BY `saved_at` DESC");
    $this->bind('id', $_SESSION['id']);
    $this->execute();
    $Pages = $this->fetchAll();

    if (count($Pages) > 0) {
      return array(
        'status' => true,
        'data' => $Pages
      );
    }

    return array(
      'status' => false,
      'data' => []
    );
  }

  /**
   * Fetches the five most recently created users
   *
   * @return array
   */
  public function fetchRecentUsers(): array
  {
    $this->query("SELECT * FROM `users` ORDER BY `created_at` DESC LIMIT 5");
    $this->execute();
    $Users = $this->fetchAll();

    if (count($Users) > 0) {
      return array(
        'status' => true,
        'data' => $Users
      );
    }

    return array(
      'status' => false,
      'data' => []
    );
  }
}
