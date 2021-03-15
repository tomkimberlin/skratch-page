<?php

// Extends controller.php

require_once('controller.php');

class Logout extends Controller
{

  /**
   * @param null|void
   * @return null|void
   * @desc Destroys the application session and redirects to the login page...
   **/
  public function __construct()
  {
    session_destroy();
    header("Location: index.php");
  }
}

?>
