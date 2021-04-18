<?php

require_once('controller.php');

class ViewPage extends Controller
{

  public string $active = 'view page'; // For highlighting the active link

  public function __construct()
  {
    if (!isset($_SESSION['auth_status'])) {
      header("Location: login.php");
    } else {
      // User is logged in so create ViewPageModel object
      //$this->viewPageModel = new ViewPageModel();
    }
  }
}
