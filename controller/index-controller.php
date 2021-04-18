<?php

// Extends controller.php and loads dependencies from login-model.php

require_once('controller.php');

class Index extends Controller
{

  public string $active = 'index'; // For highlighting the active link

  public function __construct()
  {
  }

}
