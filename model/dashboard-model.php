<?php
require_once('db.php');

class DashboardModel extends db
{

  /**
   * @param null
   * @return array
   * @desc Returns an array of news....
   **/
  public function fetchNews(): array
  {
    $this->query("SELECT * FROM `pages` ORDER BY `id` DESC");
    $this->execute();
    $News = $this->fetchAll();

    if (count($News) > 0) {
      $Response = array(
        'status' => true,
        'data' => $News
      );
      return $Response;
    }

    $Response = array(
      'status' => false,
      'data' => []
    );
    return $Response;
  }

  public function fetchPages(): array {
    $id = $_SESSION['id'];
    $this->query("SELECT * FROM `pages` WHERE `user_id` = $id");
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
}

?>
