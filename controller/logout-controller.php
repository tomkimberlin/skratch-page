<?php

require_once('controller.php');

class Logout extends Controller
{
  /**
   * Logout constructor.
   */
  public function __construct()
  {
    // Logout user by destroying session
    session_destroy();
    // Redirect user to homepage
    header("Location: index.php");
  }
}
