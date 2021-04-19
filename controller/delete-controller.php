<?php

require_once('controller.php');
require_once('./model/delete-model.php');

class Delete extends Controller
{

  public string $active = 'delete page'; // For highlighting the active link
  private DeleteModel $deleteModel;

  public function __construct()
  {
    if (!isset($_SESSION['auth_status'])) {
      header("Location: login.php");
    } else {
      // User is logged in so create ViewPageModel object
      $this->deleteModel = new DeleteModel();
    }
  }

  public function deletePage()
  {
    return $this->deleteModel->delete();
  }
}
