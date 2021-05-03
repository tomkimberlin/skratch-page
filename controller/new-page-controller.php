<?php

require_once('controller.php');
require_once('./model/new-page-model.php');

class NewPage extends Controller
{

  public string $active = 'new page';
  private NewPageModel $newPageModel;

  /**
   * NewPage constructor.
   */
  public function __construct()
  {
    // Check if user is logged in yet
    if (!isset($_SESSION['auth_status'])) {
      // If not logged in, redirect them to login.php
      header("Location: login.php");
    } else {
      // User is logged in so create new model object
      $this->newPageModel = new NewPageModel();
    }
  }

  /**
   * Take user inputted data and initiates creation of page
   *
   * @param array $data
   * @return bool[]|false[]
   */
  public function createPage(array $data)
  {
    $title = stripcslashes(strip_tags($data['pageTitle']));
    $content = stripcslashes(strip_tags($data['pageContent']));

    // Create payload to pass to newPageModel
    $Payload = array(
      'title' => $title,
      'content' => $content
    );

    $Response = $this->newPageModel->createPage($Payload);

    // Return error message if creating page is unsuccessful
    if (!$Response['status']) {
      $Response['status'] = 'Sorry, an unexpected error occurred and your request could not be completed.';
      return $Response;
    }

    // Finally, send user to dashboard.php
    header("Location: dashboard.php");
    return $Response;
  }
}
