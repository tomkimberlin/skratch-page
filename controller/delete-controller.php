<?php

require_once('controller.php');
require_once('./model/delete-model.php');

class Delete extends Controller
{

  public string $active = 'delete';
  private DeleteModel $deleteModel;

  /**
   * Delete constructor.
   */
  public function __construct()
  {
    // Check if user is logged in
    if (!isset($_SESSION['auth_status'])) {
      // If not logged in, redirect them to login.php
      header("Location: login.php");
    } else {
      // User is logged in so create new model object
      $this->deleteModel = new DeleteModel();
    }
  }

  /**
   * Deletes page ID from database
   */
  public function deletePage()
  {
    return $this->deleteModel->delete();
  }
}
