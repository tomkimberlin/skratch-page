<?php

require_once('controller.php');
require_once('./model/register-model.php');

class Register extends Controller
{

  public string $active = 'register';
  private RegisterModel $registerModel;

  /**
   * Register constructor.
   */
  public function __construct()
  {
    // Check if user is logged in and redirect them to dashboard.php if they are
    if (isset($_SESSION['auth_status'])) header("Location: dashboard.php");
    $this->registerModel = new RegisterModel();
  }

  /**
   * Takes user inputted credentials and initiates registration
   *
   * @param array $data
   * @return bool[]|false[]|string[]
   */
  public function register(array $data)
  {
    $email = stripcslashes(strip_tags($data['email']));
    $password = stripcslashes(strip_tags($data['password']));

    // Create array for storing error information
    $Error = array(
      'email' => '',
      'password' => '',
      'id' => ''
    );

    // Query database for user inputted email
    $EmailStatus = $this->registerModel->fetchUser($email)['status'];

    // Return error if email address already exists in database
    if (!empty($EmailStatus)) {
      $Error['email'] = 'Email address already in use.';
      return $Error;
    }

    // Return error if password is shorter than 7 characters
    if (strlen($password) < 7) {
      $Error['password'] = 'Password must be at at least 8 characters.';
      return $Error;
    }

    // Create payload to pass to registerModel
    $Payload = array(
      'email' => $email,
      'password' => password_hash($password, PASSWORD_BCRYPT)
    );

    // Try creating the user and store the response
    $Response = $this->registerModel->createUser($Payload);

    // Fetch the newly created user
    $Data = $this->registerModel->fetchUser($email)['data'];

    // Destroy password now that it is no longer needed
    unset($Data['password']);

    // Return error message if creating user is unsuccessful
    if (!$Response['status']) {
      $Response['status'] = 'Sorry, an unexpected error occurred and your request could not be completed.';
      return $Response;
    }

    // Set session variables
    $_SESSION['data'] = $Data;
    $_SESSION['auth_status'] = true;
    $_SESSION['id'] = $Data['id'];
    $_SESSION['email'] = $Data['email'];

    if ($Data['role'] === '1') {
      $_SESSION['role'] = 'admin';
    }

    if ($Data['role'] === '2') {
      $_SESSION['role'] = 'user';
    }

    if ($Data['role'] === '3') {
      $_SESSION['role'] = 'vip';
    }

    // Finally, send user to dashboard.php
    header("Location: dashboard.php");
    return $Response;
  }
}
