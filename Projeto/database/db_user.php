<?php
  include_once('../includes/database.php');

  /**
   * Verifies if a certain username, password combination
   * exists in the database. Use the sha1 hashing function.
   */
  function checkUserPassword($username, $password)
  {
      $db = Database::instance()->db();

      $stmt = $db->prepare('SELECT * FROM Users WHERE username = ?');
      $stmt->execute(array($username));

      $user = $stmt->fetch();
      return $user !== false && password_verify($password, $user['password']);
  }

  function insertUser($username, $email, $password, $name, $profilePicture)
  {
      $db = Database::instance()->db();

      $options = ['cost' => 12];

      $stmt = $db->prepare('INSERT INTO Users VALUES(NULL, ?, ?, ?, ?, ?)');
      $stmt->execute(array($username,$email, password_hash($password, PASSWORD_DEFAULT, $options),$name, $profilePicture));
  }

  function editUser($newusername, $password, $newpassword, $profilePicture)
  {
      $db = Database::instance()->db();
      $options = ['cost' => 12];

      $user = getUser($_SESSION['username']);

      unlink('../images/users/'.$user['profilePicture']);

      if (checkUserPassword($user['username'], $password)) {
          $stmt = "UPDATE Users SET password = ? , username = ? , profilePicture = ? WHERE id = ?";
          $db->prepare($stmt)->execute([password_hash($newpassword, PASSWORD_DEFAULT, $options),$newusername,$profilePicture,$user['id']]);
          return 1;
      }
      return 0;
  }

  function getUser($username)
  {
      $db = Database::instance()->db();
      $stmt = $db->prepare('SELECT * FROM Users WHERE username = ?');
      $stmt->execute(array($username));
      return $stmt->fetch();
  }

 function getSentMessages($username)
 {
     $db = Database::instance()->db();
     $stmt = $db->prepare('SELECT * FROM Messages WHERE senderUsername = ? ');
     $stmt->execute(array($username));
     return $stmt->fetchAll();
 }
 function getReceivedMessages($username)
 {
     $db = Database::instance()->db();
     $stmt = $db->prepare('SELECT * FROM Messages WHERE recipientUsername = ? ');
     $stmt->execute(array($username));
     return $stmt->fetchAll();
 }
