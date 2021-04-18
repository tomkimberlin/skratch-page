<?php

require_once('controller.php');

class Logout extends Controller
{

  public function __construct()
  {
    session_destroy();
    header("Location: index.php");
  }
}
