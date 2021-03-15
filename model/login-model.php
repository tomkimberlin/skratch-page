<?php
require_once('db.php');

class LoginModel extends db
{

  /**
   * @param string
   * @return array
   * @desc Returns a user record based on the method parameter....
   **/
  public function fetchEmail(string $email): array
  {
    $this->query("SELECT * FROM `users` WHERE `email` = :email");
    $this->bind('email', $email);
    $this->execute();

    $Email = $this->fetch();
    if (empty($Email)) {
      $Response = array(
        'status' => true,
        'data' => $Email
      );

      return $Response;
    }

    if (!empty($Email)) {
      $Response = array(
        'status' => false,
        'data' => $Email
      );

      return $Response;
    }
  }
}

?>
