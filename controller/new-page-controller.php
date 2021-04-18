<?php

// Extends controller.php and loads dependencies from login-model.php

require_once('controller.php');

class NewPage extends Controller
{

  public string $active = 'new page'; // For highlighting the active link

  public function __construct()
  {
    if (!isset($_SESSION['auth_status'])) {
      header("Location: login.php");
    } else {
      // User is logged in so create NewPageModel object
      //$this->newPageModel = new NewPageModel();
    }
  }

}
