<?php

// Extends controller.php and loads dependencies from login-model.php

require_once('controller.php');
require_once('./model/login-model.php');

class Login extends Controller
{

  public $active = 'login'; // For highlighting the active link
  private $loginModel;

  /**
   * @param null|void
   * @return null|void
   * @desc Checks if the user session is set and creates a new instance of the LoginModel...
   **/
  public function __construct()
  {
    // If logged in, set the header to dashboard.php
    if (isset($_SESSION['auth_status'])) header("Location: dashboard.php");
    // And create new LoginModel
    $this->loginModel = new LoginModel();
  }

  /**
   * @param array
   * @return array|boolean
   * @desc Verifies and redirects a user by calling the login method on the LoginModel...
   **/
  public function login(array $data)
  {
    $email = stripcslashes(strip_tags($data['email']));
    $password = stripcslashes(strip_tags($data['password']));

    $EmailRecords = $this->loginModel->fetchEmail($email);

    if (!$EmailRecords['status']) {
      if (password_verify($password, $EmailRecords['data']['password'])) {

        $Response = array(
          'status' => true
        );

        $_SESSION['data'] = $EmailRecords['data'];
        $_SESSION['auth_status'] = true;
        $_SESSION['id'] = $EmailRecords['data']['id'];
        header("Location: dashboard.php");
      }

      $Response = array(
        'status' => false,
      );
      return $Response;
    }

    $Response = array(
      'status' => false,
    );

    return $Response;
  }
}

?>
