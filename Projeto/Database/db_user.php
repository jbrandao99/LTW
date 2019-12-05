<?php
  include_once('../includes/database.php');

  /**
   * Verifies if a certain username, password combination
   * exists in the database. Use the sha1 hashing function.
   */
  function checkUserPassword($username, $password) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM Users WHERE username = ?');
    $stmt->execute(array($username));

    $user = $stmt->fetch();
    return $user !== false && password_verify($password, $user['password']);
  }

  function insertUser($username, $email, $password, $name) {
    $db = Database::instance()->db();

    $options = ['cost' => 12];

    $stmt = $db->prepare('INSERT INTO Users VALUES(NULL, ?, ?, ?, ?,NULL)');
    $stmt->execute(array($username,$email, password_hash($password, PASSWORD_DEFAULT, $options),$name));
  }

  function editUser($username,$newusername,$password,$newpassword) {
    $db = Database::instance()->db();
    $options = ['cost' => 12];
    if(checkUserPassword($username, $password))
    {

    $stmt = $db->prepare('UPDATE Users SET password = ? , username = ? WHERE  username = ?');
    $stmt->execute(array(password_hash($newpassword, PASSWORD_DEFAULT, $options),$newusername,$username));
    return 1;
   }
   return 0;
    

  }
?>