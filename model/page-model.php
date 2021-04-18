<?php
require_once('db.php');

class PageModel extends db
{
  public function fetchPage(): array
  {
    $this->query("SELECT * FROM `pages` WHERE `id` = :id");
    $this->bind('id', $_GET['id']);
    $this->execute();
    $ViewPage = $this->fetchAll();

    if (count($ViewPage) > 0) {
      return array(
        'status' => true,
        'data' => $ViewPage
      );
    }
    return array(
      'status' => false,
      'data' => []
    );
  }
}
