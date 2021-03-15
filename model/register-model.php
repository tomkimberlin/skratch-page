<?php
require_once('db.php');

class RegisterModel extends db
{

  /**
   * @param array
   * @return array
   * @desc Creates and returns a user record....
   **/
  public function createUser(array $user): array
  {
    $this->query("INSERT INTO `users` (email, password) VALUES (:email, :password)");
    $this->bind('email', $user['email']);
    $this->bind('password', $user['password']);

    if ($this->execute()) {
      $Response = array(
        'status' => true,
      );
      return $Response;
    } else {
      $Response = array(
        'status' => false
      );
      return $Response;
    }
  }

  /**
   * @param string
   * @return array
   * @desc Returns a user record based on the method parameter....
   **/
  public function fetchUser(string $email): array
  {
    $this->query("SELECT * FROM `users` WHERE `email` = :email");
    $this->bind('email', $email);
    $this->execute();

    $User = $this->fetch();
    if (!empty($User)) {
      $Response = array(
        'status' => true,
        'data' => $User
      );
      return $Response;
    }
    return array(
      'status' => false,
      'data' => []
    );
  }
}

?>
