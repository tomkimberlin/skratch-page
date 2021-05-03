<?php

require_once('controller.php');
require_once('./model/page-model.php');

class Page extends Controller
{

  public string $active = 'view page';
  private PageModel $pageModel;

  /**
   * Page constructor.
   */
  public function __construct()
  {
    if (!isset($_SESSION['auth_status'])) {
      // If not logged in, redirect them to login.php
      header("Location: login.php");
    } else {
      // User is logged in so create new model object
      $this->pageModel = new PageModel();
    }
  }

  /**
   * Gets requested page
   *
   * @return array
   */
  public function getPage(): array
  {
    return $this->pageModel->fetchPage();
  }
}
