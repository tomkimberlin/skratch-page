<?php
require_once('db.php');

class RegisterModel extends db
{

  /**
   * Creates user in database
   *
   * @param array $user
   * @return bool[]|false[]
   */
  public function createUser(array $user): array
  {
    $this->query("INSERT INTO `users` (email, password) VALUES (:email, :password)");
    $this->bind('email', $user['email']);
    $this->bind('password', $user['password']);

    if ($this->execute()) {
      $Response = array(
        'status' => true,
      );
    } else {
      $Response = array(
        'status' => false
      );
    }
    return $Response;
  }

  /**
   * Fetches email from database to ensure it doesn't already exist
   *
   * @param string $email
   * @return array
   */
  public function fetchUser(string $email): array
  {
    $this->query("SELECT * FROM `users` WHERE `email` = :email");
    $this->bind('email', $email);
    $this->execute();

    $User = $this->fetch();

    if (!empty($User)) {
      return array(
        'status' => true,
        'data' => $User
      );
    }
    return array(
      'status' => false,
      'data' => []
    );
  }
}
