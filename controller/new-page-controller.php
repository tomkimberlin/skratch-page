<?php

// Extends controller.php and loads dependencies from login-model.php

require_once('controller.php');

class NewPage extends Controller
{

  public string $active = 'new page'; // For highlighting the active link

  public function __construct()
  {
  }

}
