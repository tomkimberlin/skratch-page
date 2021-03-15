<?php

// Extends controller.php and loads dependencies from register-model.php

require_once('controller.php');
require_once('./model/register-model.php');

class Register extends Controller
{

  public $active = 'Register'; // For highlighting the active link
  private $registerModel;

  /**
   * @param null|void
   * @return null|void
   * @desc Checks if the user session is set and creates a new instance of the RegisterModel...
   **/
  public function __construct()
  {
    if (isset($_SESSION['auth_status'])) header("Location: dashboard.php");
    $this->registerModel = new RegisterModel();
  }

  /**
   * @param array
   * @return array|boolean
   * @desc Verifies, Creates, and returns a user by calling the register method on the RegisterModel...
   **/
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
    unset($Data['password']); // Stop storing sensitive information after it is no longer needed

    if (!$Response['status']) {
      $Response['status'] = 'Sorry, an unexpected error occurred and your request could not be completed.';
      return $Response;
    }

    $_SESSION['data'] = $Data;
    $_SESSION['auth_status'] = true;
    header("Location: dashboard.php");
    return true;
  }
}

?>
