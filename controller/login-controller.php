<?php

require_once('controller.php');
require_once('./model/login-model.php');

class Login extends Controller
{

  public string $active = 'login';
  private LoginModel $loginModel;

  /**
   * Login constructor.
   */
  public function __construct()
  {
    // If logged in, set the header to dashboard.php
    if (isset($_SESSION['auth_status'])) header("Location: dashboard.php");
    // And create new LoginModel
    $this->loginModel = new LoginModel();
  }

  /**
   * Takes user inputted data and initiates login attempt
   *
   * @param array $data
   * @return false[]
   */
  public function login(array $data): array
  {
    $email = stripcslashes(strip_tags($data['email']));
    $password = stripcslashes(strip_tags($data['password']));

    $EmailRecords = $this->loginModel->fetchEmail($email);

    if (!$EmailRecords['status']) {
      if (password_verify($password, $EmailRecords['data']['password'])) {

        $_SESSION['data'] = $EmailRecords['data'];
        $_SESSION['auth_status'] = true;
        $_SESSION['id'] = $EmailRecords['data']['id'];
        $_SESSION['email'] = $EmailRecords['data']['email'];
        $_SESSION['role'] = $EmailRecords['data']['role'];

        header("Location: dashboard.php");
      }
    }
    return array(
      'status' => false
    );
  }
}
