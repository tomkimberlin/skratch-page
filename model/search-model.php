<?php
require_once('db.php');

class SearchModel extends db
{

  public function fetchResult(): array
  {
    if(empty($_POST['search'])) {
      return array(
        'status' => false,
        'data' => []
      );
    }
    if(isset($_POST['search'])) {
      $this->query("SELECT * FROM `pages` WHERE `user_id` = (:user_id) AND `content` LIKE (:search) OR `title` LIKE (:search) ORDER BY `saved_at` DESC");
      $this->bind('user_id', $_SESSION['id']);
      $this->bind('search', "%".$_POST['search']."%");
      $this->execute();
      $Results = $this->fetchAll();
    }

    if (count($Results) > 0) {
      return array(
        'status' => true,
        'data' => $Results
      );
    } else {
      return array(
        'status' => false,
        'data' => []
      );
    }
  }
}
