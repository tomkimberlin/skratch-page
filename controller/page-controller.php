<?php

require_once('controller.php');
require_once('./model/page-model.php');

class Page extends Controller
{

  public string $active = 'view page'; // For highlighting the active link
  private PageModel $pageModel;

  public function __construct()
  {
    if (!isset($_SESSION['auth_status'])) {
      header("Location: login.php");
    } else {
      // User is logged in so create ViewPageModel object
      $this->pageModel = new PageModel();
    }
  }

  public function getPage()
  {
    return $this->pageModel->fetchPage();
  }
}
