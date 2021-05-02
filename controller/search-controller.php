<?php

require_once('controller.php');
require_once('./model/search-model.php');

class Search extends Controller
{

  public string $active = 'search';
  private SearchModel $searchModel;

  public function __construct()
  {
    if (!isset($_SESSION['auth_status'])) {
      header("Location: login.php");
    } else {
      $this->searchModel = new SearchModel();
    }
  }

  // Fetches
  public function getResult(): array
  {
    return $this->searchModel->fetchResult();
  }

}
