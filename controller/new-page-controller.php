<?php

require_once('controller.php');
require_once('./model/new-page-model.php');

class NewPage extends Controller
{

  public string $active = 'new page'; // For highlighting the active link
  private NewPageModel $newPageModel;

  public function __construct()
  {
    if (!isset($_SESSION['auth_status'])) {
      header("Location: login.php");
    } else {
      // User is logged in so create NewPageModel object
      $this->newPageModel = new NewPageModel();
    }
  }

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

    // Return error message if creating user is unsuccessful
    if (!$Response['status']) {
      $Response['status'] = 'Sorry, an unexpected error occurred and your request could not be completed.';
      return $Response;
    }

    // Finally, send user to dashboard.php
    header("Location: dashboard.php");
    return $Response;
  }
}
