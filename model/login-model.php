<?php
require_once('db.php');

class LoginModel extends db
{

  /**
   * Fetches email from database to check if it exists
   *
   * @param string $email
   * @return array
   */
  public function fetchEmail(string $email): array
  {
    $this->query("SELECT * FROM `users` WHERE `email` = :email");
    $this->bind('email', $email);
    $this->execute();

    $Email = $this->fetch();

    if (empty($Email)) {
      return array(
        'status' => true,
        'data' => $Email
      );
    } else {
      return array(
        'status' => false,
        'data' => $Email
      );
    }
  }
}
