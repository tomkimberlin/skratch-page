<?php

require_once('controller.php');
require_once('./model/search-model.php');

class Search extends Controller
{

  public string $active = 'search';
  private SearchModel $searchModel;

  /**
   * Search constructor.
   */
  public function __construct()
  {
    // Check if user is logged in
    if (!isset($_SESSION['auth_status'])) {
      // If not logged in, redirect them to login.php
      header("Location: login.php");
    } else {
      // User is logged in so create new model object
      $this->searchModel = new SearchModel();
    }
  }

  /**
   * Fetches search result(s)
   *
   * @return array
   */
  public function getResult(): array
  {
    return $this->searchModel->fetchResult();
  }

}
