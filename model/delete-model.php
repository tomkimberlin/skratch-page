<?php
require_once('db.php');

class DeleteModel extends db
{
  /**
   * Deletes page from database
   *
   * @return bool[]|false[]
   */
  public function delete(): array
  {
    $this->query("DELETE FROM `pages` WHERE `id` = :id");
    $this->bind('id', $_GET['id']);

    if ($this->execute()) {
      return array(
        'status' => true
      );
    }
    return array(
      'status' => false
    );
  }
}
