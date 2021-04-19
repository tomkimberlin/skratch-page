<?php
require_once('db.php');

class NewPageModel extends db
{

  public function createPage(array $page): array
  {
    $this->query("INSERT INTO `pages` (user_id, title, content) VALUES (:user_id, :title, :content)");
    $this->bind('user_id', $_SESSION['id']);
    $this->bind('title', $page['title']);
    $this->bind('content', $page['content']);

    if ($this->execute()) {
      $Response = array(
        'status' => true,
      );
    } else {
      $Response = array(
        'status' => false
      );
    }
    return $Response;
  }
}
