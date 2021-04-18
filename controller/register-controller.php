<?php

// Extends controller.php and loads dependencies from register-model.php

require_once('controller.php');
require_once('./model/register-model.php');

class Register extends Controller
{

  public string $active = 'Register'; // For highlighting the active link
  private RegisterModel $registerModel;

  public function __construct()
  {
    // Check if user is logged in and redirect them to dashboard.php if they are
    if (isset($_SESSION['auth_status'])) header("Location: dashboard.php");
    $this->registerModel = new RegisterModel();
  }

  public function register(array $data)
  {
    $email = stripcslashes(strip_tags($data['email']));
    $password = stripcslashes(strip_tags($data['password']));

    $EmailStatus = $this->registerModel->fetchUser($email)['status'];

    $Error = array(
      'email' => '',
      'password' => '',
      'id' => ''
    );

    if (!empty($EmailStatus)) {
      $Error['email'] = 'Email address already in use.';
      return $Error;
    }

    if (strlen($password) < 7) {
      $Error['password'] = 'Password must be at at least 8 characters.';
      return $Error;
    }

    $Payload = array(
      'email' => $email,
      'password' => password_hash($password, PASSWORD_BCRYPT)
    );

    $Response = $this->registerModel->createUser($Payload);

    $Data = $this->registerModel->fetchUser($email)['data'];

    unset($Data['password']);

    if (!$Response['status']) {
      $Response['status'] = 'Sorry, an unexpected error occurred and your request could not be completed.';
      return $Response;
    }

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

    header("Location: dashboard.php");
    return $Response;
  }
}
